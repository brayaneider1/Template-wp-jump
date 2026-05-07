<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register Admin Menu
 */
add_action( 'admin_menu', function() {
    add_menu_page(
        'JumpSeat Leads',
        'JS Leads',
        'manage_options',
        'js-leads',
        'js_leads_render_admin_page',
        'dashicons-email-alt',
        25
    );
});

/**
 * Handle Actions (Delete/Status Change)
 */
add_action( 'admin_init', function() {
    if ( ! isset($_GET['page']) || $_GET['page'] !== 'js-leads' ) return;
    if ( ! isset($_GET['action']) || ! isset($_GET['id']) ) return;

    check_admin_referer( 'js_lead_action' );

    global $wpdb;
    $table_name = $wpdb->prefix . 'js_leads';
    $id = intval($_GET['id']);

    if ( $_GET['action'] === 'delete' ) {
        $wpdb->delete( $table_name, ['id' => $id] );
        wp_redirect( admin_url('admin.php?page=js-leads&msg=deleted') );
        exit;
    }

    if ( in_array($_GET['action'], ['pendiente', 'contactado', 'descartado']) ) {
        $wpdb->update( $table_name, ['estado' => $_GET['action']], ['id' => $id] );
        wp_redirect( admin_url('admin.php?page=js-leads&msg=updated') );
        exit;
    }
});

/**
 * Render Admin Page
 */
function js_leads_render_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'js_leads';
    $leads = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY time DESC" );
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">JumpSeat Leads Management</h1>
        <hr class="wp-header-end">

        <?php if ( isset($_GET['msg']) ) : ?>
            <div class="updated notice is-dismissible">
                <p><?php echo $_GET['msg'] === 'deleted' ? 'Lead deleted.' : 'Lead status updated.'; ?></p>
            </div>
        <?php endif; ?>

        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th width="150">Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company / Role</th>
                    <th>Message</th>
                    <th width="120">Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ( $leads ) : foreach ( $leads as $lead ) : ?>
                    <tr>
                        <td><?php echo esc_html($lead->time); ?></td>
                        <td><strong><?php echo esc_html($lead->nombre . ' ' . $lead->apellido); ?></strong></td>
                        <td><?php echo esc_html($lead->email); ?></td>
                        <td><?php echo esc_html($lead->empresa . ' / ' . $lead->cargo); ?></td>
                        <td><small><?php echo esc_html($lead->mensaje); ?></small></td>
                        <td>
                            <span class="status-pill status-<?php echo esc_attr($lead->estado); ?>">
                                <?php echo ucfirst(esc_html($lead->estado)); ?>
                            </span>
                        </td>
                        <td>
                            <div class="js-actions">
                                <a href="<?php echo wp_nonce_url( admin_url("admin.php?page=js-leads&action=pendiente&id=$lead->id"), 'js_lead_action' ); ?>" class="button">Pend</a>
                                <a href="<?php echo wp_nonce_url( admin_url("admin.php?page=js-leads&action=contactado&id=$lead->id"), 'js_lead_action' ); ?>" class="button">Cont</a>
                                <a href="<?php echo wp_nonce_url( admin_url("admin.php?page=js-leads&action=descartado&id=$lead->id"), 'js_lead_action' ); ?>" class="button">Desc</a>
                                <a href="<?php echo wp_nonce_url( admin_url("admin.php?page=js-leads&action=delete&id=$lead->id"), 'js_lead_action' ); ?>" 
                                   class="button button-link-delete" 
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; else : ?>
                    <tr><td colspan="7">No leads found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <style>
            .status-pill { padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: bold; text-transform: uppercase; }
            .status-pendiente { background: #fff8e1; color: #f57f17; border: 1px solid #ffe082; }
            .status-contactado { background: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7; }
            .status-descartado { background: #fafafa; color: #757575; border: 1px solid #bdbdbd; }
            .js-actions { display: flex; gap: 4px; }
            .button-link-delete { color: #d32f2f !important; }
        </style>
    </div>
    <?php
}
