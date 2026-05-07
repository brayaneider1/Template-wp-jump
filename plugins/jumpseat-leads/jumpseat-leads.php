<?php
/**
 * Plugin Name: JumpSeat Leads Manager
 * Description: Gestión de leads con MySQL para la prueba técnica JumpSeat.
 * Version: 1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_init', 'js_verificar_bd_leads');
function js_verificar_bd_leads() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'js_leads';
    
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $tabla (
        id int NOT NULL AUTO_INCREMENT,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        nombre varchar(100),
        email varchar(100),
        empresa varchar(100),
        cargo varchar(100),
        mensaje text,
        estado varchar(20) DEFAULT 'pendiente',
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

add_action('wp_ajax_js_submit_contact', 'js_guardar_lead');
add_action('wp_ajax_nopriv_js_submit_contact', 'js_guardar_lead');

function js_guardar_lead() {
    if ( !wp_verify_nonce($_POST['nonce'], 'js_lead_nonce') ) {
        wp_send_json_error('Error de seguridad');
    }

    global $wpdb;
    $resultado = $wpdb->insert($wpdb->prefix . 'js_leads', [
        'nombre'  => sanitize_text_field($_POST['name']),
        'email'   => sanitize_email($_POST['email']),
        'empresa' => sanitize_text_field($_POST['company']),
        'cargo'   => sanitize_text_field($_POST['title']),
        'mensaje' => sanitize_textarea_field($_POST['message']),
        'estado'  => 'pendiente'
    ]);

    if ( $resultado ) {
        wp_send_json_success('¡Mensaje enviado!');
    } else {
        wp_send_json_error('Error de BD: ' . $wpdb->last_error);
    }
}

add_action('admin_menu', function() {
    add_menu_page('Leads JumpSeat', 'Leads JS', 'manage_options', 'leads-js', 'js_pagina_admin_leads', 'dashicons-airplane', 25);
});

function js_pagina_admin_leads() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'js_leads';

    if ( isset($_GET['id']) && isset($_GET['do']) ) {
        $id = intval($_GET['id']);
        $accion = $_GET['do'];
        if ( $accion === 'borrar' ) {
            $wpdb->delete($tabla, ['id' => $id]);
        } elseif ( in_array($accion, ['pendiente', 'contactado', 'descartado']) ) {
            $wpdb->update($tabla, ['estado' => $accion], ['id' => $id]);
        }
        echo "<div class='updated'><p>Acción realizada con éxito.</p></div>";
    }

    $leads = $wpdb->get_results("SELECT * FROM $tabla ORDER BY id DESC");
    ?>
    <div class="wrap">
        <h1>Gestión de Leads - JumpSeat</h1>
        <table class="wp-list-table widefat fixed striped" style="margin-top:20px;">
            <thead>
                <tr>
                    <th width="120">Fecha</th>
                    <th>Contacto</th>
                    <th>Empresa</th>
                    <th>Mensaje</th>
                    <th width="120">Estado</th>
                    <th width="180">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($leads): foreach ($leads as $l) : 
                    $fecha_valor = isset($l->created_at) ? $l->created_at : (isset($l->fecha) ? $l->fecha : 'N/A');
                ?>
                <tr>
                    <td><?php echo $fecha_valor; ?></td>
                    <td><strong><?php echo esc_html($l->nombre); ?></strong><br><?php echo esc_html($l->email); ?></td>
                    <td><?php echo esc_html($l->empresa); ?></td>
                    <td><div style="font-size:11px;"><?php echo esc_html($l->mensaje); ?></div></td>
                    <td><strong style="text-transform:uppercase; color:<?php echo $l->estado=='pendiente'?'#d4af37':'#2271b1'; ?>"><?php echo $l->estado; ?></strong></td>
                    <td>
                        <a href="?page=leads-js&do=contactado&id=<?php echo $l->id; ?>">Contactado</a> |
                        <a href="?page=leads-js&do=descartado&id=<?php echo $l->id; ?>">Descartar</a> |
                        <a href="?page=leads-js&do=borrar&id=<?php echo $l->id; ?>" style="color:red;">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="6">No hay leads registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
