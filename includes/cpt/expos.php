<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 22/11/2016
 * Time: 20:53
 */
function create_expos_post_type() {
register_post_type( 'expos',
    array(
        'labels' => array(
            'name' => 'expos',
            'singular_name' => 'expos',
            'add_new' => 'Agregar Nuevo',
            'add_new_item' => 'Agregar Nuevo expos',
            'edit_item' => 'Edit expos',
            'new_item' => 'New expos',
            'view_item' => 'View expos',
            'search_items' => 'Search expos',
            'not_found' =>  'Nothing Found',
            'not_found_in_trash' => 'Nothing found in the Trash',
            'parent_item_colon' => ''
        ),

        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/yourimage.png',
        'rewrite' => array('slug'=>'expos','with_front'=>FALSE),
        'capability_type' => 'post',
        'hierarchical' => true,
        'has_archive'=>true,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt','post‐formats','author'),
        'taxonomies'          => array( 'tipos' ),

    )
);
}
add_action( 'init', 'create_expos_post_type' );
register_taxonomy("tipos","trabajadores", array(
    "hierarchical" => true,
    "label" => "Tipos",
    "singular_label" => "Tipo",
    "rewrite" => true,

));
function add_expos_meta_boxes()
{
    add_meta_box("expos_galeria_meta", "Campos", "add_galeria_expos_meta_box", "expos", "normal", "low");
}
function add_galeria_expos_meta_box()
{
    global $post;
    $custom = get_post_custom( $post->ID );
    ?>
    <p><label>Shortcode de Galeria</label></br>
        <textarea name="gallery" rows="4" cols="50" value="<?php echo $value = get_post_meta( $post->ID, 'gallery', true ); ?>"><?= @$custom["gallery"][0] ?></textarea></p>


<?php }
function save_expos_custom_fields(){
    global $post;

    if ( $post )
    {
        update_post_meta($post->ID, "gallery", @$_POST["gallery"]);

    }
}
add_action( 'admin_init', 'add_expos_meta_boxes' );
add_action( 'save_post_expos', 'save_expos_custom_fields' );
flush_rewrite_rules();

/*
 * adding fields to user profile
 * */

    function add_fields_user_profile($user){
        $value=get_the_author_meta('tipo_artista',$user->ID);
    ?>
        <div class="col-xs-12">
            <label><strong>Tipo de artista</strong></label>
            <select name="tipo_art">
                <option value="pintor"<?php if ( 'pintor' == $value ) echo 'selected="selected"'?>>pintor</option>
                <option  value="fotógrafo"<?php if ( 'fotógrafo' == $value ) echo 'selected="selected"'?>>fotógrafo</option>
                <option value="escultor"<?php if ( 'escultor' == $value ) echo 'selected="selected"'?>>escultor</option>

            </select>
        </div>
        <?php

    }
add_action( 'show_user_profile', 'add_fields_user_profile' );
add_action( 'edit_user_profile', 'add_fields_user_profile' );
 function save_field_user($user_id){
     $value=filter_input( INPUT_POST, 'tipo_art', FILTER_SANITIZE_STRING );
     update_user_meta( $user_id, 'tipo_artista', $value );
 }
add_action( 'personal_options_update', 'save_field_user' );
add_action( 'edit_user_profile_update', 'save_field_user' );


define('woocommerce_use_css',false);