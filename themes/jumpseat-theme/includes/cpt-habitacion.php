<?php
/**
 * CPT: Habitacion + Custom Fields
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', function() {
    $labels = array(
        'name'               => 'Habitaciones',
        'singular_name'      => 'Habitación',
        'add_new'            => 'Nueva Habitación',
        'add_new_item'       => 'Añadir Nueva Habitación',
        'edit_item'          => 'Editar Habitación',
        'menu_name'          => 'Habitaciones'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ), // 'thumbnail' es la imagen
        'menu_icon'           => 'dashicons-bed',
        'rewrite'             => array('slug' => 'habitaciones'),
    );

    register_post_type( 'habitacion', $args );
});

// 1. Añadir Meta Box para el Precio
add_action( 'add_meta_boxes', function() {
    add_meta_box(
        'habitacion_precio_box',
        'Detalles de la Habitación',
        'hotel_render_price_box',
        'habitacion',
        'side',
        'default'
    );
});

function hotel_render_price_box( $post ) {
    $precio = get_post_meta( $post->ID, 'precio_noche', true );
    ?>
    <label for="hotel_precio">Precio por noche ($):</label>
    <input type="number" id="hotel_precio" name="hotel_precio" value="<?php echo esc_attr( $precio ); ?>" style="width:100%; margin-top:10px;" placeholder="Ej: 350000">
    <p class="description">Ingresa solo números, sin puntos ni comas.</p>
    <?php
}

// 2. Guardar el Precio
add_action( 'save_post', function( $post_id ) {
    if ( array_key_exists( 'hotel_precio', $_POST ) ) {
        update_post_meta(
            $post_id,
            'precio_noche',
            sanitize_text_field( $_POST['hotel_precio'] )
        );
    }
});
