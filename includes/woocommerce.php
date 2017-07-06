<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 29/11/2016
 * Time: 0:15
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//Product Gallery Size
function store_gallery_four_columns(  ){
    return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'store_gallery_four_columns');

// Change number or products per row to 4
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 3 products per row
    }
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'store_header_add_to_cart_fragment' );

function store_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="mira tu carro de compras">
        <div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'store'), WC()->cart->cart_contents_count);?></div>
        <div class="total"> <?php echo WC()->cart->get_cart_total(); ?>
        </div>
    </a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

/*
 * adding fields to  woocomerce prduct
 */
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

function woo_add_custom_general_fields() {

    global $woocommerce, $post;

    echo '<div class="options_group">';

    // Custom fields will be created here...

    $args=array('role'=>'author');
    $authors=get_users($args);
    ?>
    <p class="form-field product_field_type">
        <label for="product_field_type"><?php _e( 'Autor select', 'woocommerce' ); ?></label>
        <select id="author_select" name="product_field_type"  data-placeholder="<?php _e( 'Search for a product&hellip;', 'woocommerce' ); ?>">
        <?php
    if ( is_array( $authors ) ){
        foreach($authors as $author){
            ?><option value='<?php the_author_meta("first_name",$author->ID)?>'><?php the_author_meta("first_name",$author->ID)?></option>

        <?php }
    }
        ?>
        </select>
    </p>
    <?php

    echo '</div>';

}
//saving data
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields_save($post_id ) {
    $woocommerce_select = $_POST['product_field_type'];
    //var_dump($woocommerce_select);exit;

    if( !empty( $woocommerce_select ) )
            update_post_meta($post_id, 'author_select', $woocommerce_select);

}
function wc_ninja_remove_password_strengh(){
    if(wp_script_is('wc-password-strength-meter','enqueued')){
        wp_dequeue_script('wc-password-strength-meter');
    }
}
add_action('wp_print_scripts','wc_ninja_remove_password_strengh');


	// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
// Add a second password field to the checkout page.

	// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
    ?>
    <p class="form-row form-row-wide">
        <label for="reg_password2"><?php _e( 'Password Repeat', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
    </p>
    <?php
}


add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
	function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
        global $woocommerce;
        extract( $_POST );

        if ( strcmp( $password, $password2 ) !== 0 ) {

            return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
        }
        return $reg_errors;
    }
/*function my_script_footer(){
    ?><script>
        jQuery(document).ready(function() {
            jQuery('form.register').submit(function(event){

                event.preventDefault();
                event.stopPropagation();





                //var ajaxurl = '/wp-admin/admin-ajax.php';
                form=jQuery('#bookingform').serializeArray();
                jQuery.ajax({
                    url: ajaxurl,
                    type:'POST',
                    timeout:5000,
                    dataType: 'html',
                    data:{action: "book", form:form },
                    error: function(xml){
                        //timeout, but no need to scare the user
                    },
                    success: function(response)
                    {
                        console.log(response);
                        if(response == '10')
                        {
                            jQuery('#captchaform').after(


                                '<div  class="col-xs-12 "><span  class="alert alert-success">enviado</span></div>');
                            //jQuery('#bookingform').submit();
                            jQuery('#buttonsubmit').prop('disabled',true);
                            setTimeout(function(){jQuery('#myModalbook').modal('hide')
                            },3000);
                        }
                        else{
                            jQuery('#captchaform').after(
                                '<div id="spansucces" class="col-xs-12"><span  class="alert alert-danger">bad code</span></div>' );
                            setTimeout(function(){jQuery('#spansucces').remove()},3000);
                        }
                    }
                });
            })
        })
    </script>
    <?php
}
add_action( 'wp_footer', 'my_script_footer' );*/




