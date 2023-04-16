<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package CiyaShop
 */

/**
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */
function ciyashop_child_enqueue_styles()
{ // phpcs:ignore WordPress.WhiteSpace.ControlStructureSpacing.NoSpaceAfterOpenParenthesis

    wp_enqueue_style('ciyashop-style', get_parent_theme_file_uri('/css/style.css'), array(), '3.5.2');

    if (is_rtl()) {
        wp_enqueue_style('rtl-style', get_parent_theme_file_uri('/rtl.css'), array(), '3.5.2');
    }

    wp_enqueue_style(
        'ciyashop-child-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('ciyashop-style'),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'ciyashop_child_enqueue_styles', 11);

/**
 * Update Google Feed Item IDs
 *
 * @param object $feed_item The feed item object
 * @param object $product The product item object
 * @return    object
 *
 */
function cc_woocommerce_gpf_feed_item_google($feed_item, $product)
{
    // get custom label value
    $custom_label = $feed_item->additional_elements{'custom_label_0'}[0];
    // reassign feed ID value
    $feed_item->guid = $custom_label;
    return $feed_item;
}

add_filter('woocommerce_gpf_feed_item_google', 'cc_woocommerce_gpf_feed_item_google', 11, 2);

/**
 * Google Ads Dynamic Remarketing - Single Product Pages
 *
 * @return    object
 *
 */
function cc_google_ads_dynamic_remarketing_single_product()
{

    if (is_product()) :

        global $product;

        ?>

        <script type="text/javascript">
            function setTagParameters(value, sku) {
                return {
                    ecomm_totalvalue: value,
                    ecomm_prodid: sku,
                    ecomm_pagetype: 'product',
                }
            }

            function pushToDataLayer(tagParams) {
                dataLayer.push({
                    'event': 'remarketingTriggered',
                    'google_tag_params': tagParams
                });
            }

            function updateDataLayer(value, sku) {
                var google_tag_params = setTagParameters(value, sku);
                pushToDataLayer(google_tag_params);
            }
        </script>

        <?php

        if ($product->is_type('variable')) : ?>

            <script type="text/javascript">

                // <?php
                //     $variations = $product->get_available_variations();
                //     foreach ( $variations as $key => $value ) {
                //       echo '<pre style="display: none;">';
                //         var_dump(woocommerce_gpf_get_element_values( 'custom_label_0', get_post($value['variation_id']) ));
                //       echo '</pre>';
                //     }
                // ?>

                // On load
                jQuery(window).load(function () {
                    var defaultVariation = window.variationsData[0],
                        defaultVariation_id = defaultVariation['variation_id'],
                        defaultVariation_price = defaultVariation['display_price'],
                        defaultVariation_sku = defaultVariation['sku'];

                    updateDataLayer(defaultVariation_price, defaultVariation_sku);
                });

                // On Change
                jQuery(function ($) {
                    // Fired when all the required dropdowns / attributes are selected
                    $('form.variations_form').on('show_variation', function (event, data) {
                        updateDataLayer(data.display_price, data.sku);
                    });
                });
            </script>

        <?php else :

            $productID = $product->get_id();
            $productSKU = $product->get_sku();
            $productPrice = $product->get_price();

            ?>
            <script type="text/javascript">
                updateDataLayer(<?php echo $productPrice; ?>, <?php echo $productSKU; ?>);
            </script>
        <?php endif;
    endif;
}

add_action('wp_footer', 'cc_google_ads_dynamic_remarketing_single_product');

/** filtering featured items **/
add_action('restrict_manage_posts', 'featured_products_sorting');
function featured_products_sorting()
{
    global $typenow;
    $post_type = 'product'; // change to your post type
    $taxonomy = 'product_visibility'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show all {$info_taxonomy->label}"),
            'taxonomy' => $taxonomy,
            'name' => $taxonomy,
            'orderby' => 'name',
            'selected' => $selected,
            'show_count' => true,
            'hide_empty' => true,
        ));
    }
}

add_filter('parse_query', 'featured_products_sorting_query');
function featured_products_sorting_query($query)
{
    global $pagenow;
    $post_type = 'product'; // change to your post type
    $taxonomy = 'product_visibility'; // change to your taxonomy
    $q_vars = &$query->query_vars;
    if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

//add_filter( 'woocommerce_email_recipient_customer_completed_order', 'quadlayers_add_email_recipient_to', 9999, 3 );
function quadlayers_add_email_recipient_to($email_recipient, $email_object, $email)
{
    $email_recipient .= ', clement@cellucity.co.za';
    return $email_recipient;
}

function wooc_extra_register_fields()
{ ?>
    <?php do_action('pgs_social_login'); ?>
    <?php
}

add_action('woocommerce_register_form_end', 'wooc_extra_register_fields', 5);

/* WooCommerce: The Code Below Removes Checkout Fields */

/*add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_suburb']);


return $fields;
}
*/
// Add a custom field IMEI Number
add_action('woocommerce_before_order_itemmeta', 'add_order_item_custom_field', 10, 2);
function add_order_item_custom_field($item_id, $item)
{
    // Targeting line items type only
    if ($item->get_type() !== 'line_item') return;

    woocommerce_wp_text_input(array(
        'id' => 'imei_numberID' . $item_id,
        'label' => __('Serial Number', 'cfwc'),
        'description' => __('Enter the Serial Number of the Device/s separated by comma for better tracking.', 'ctwc'),
        'desc_tip' => true,
        'class' => 'woocommerce',
        'value' => wc_get_order_item_meta($item_id, '_serial_number'),
    ));
}

// Save the custom field value
add_action('save_post', 'save_order_item_custom_field_value', 10000, 2);
function save_order_item_custom_field_value($post_id, $post)
{
    if ('shop_order' !== $post->post_type)
        return $post_id;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    if (!current_user_can('edit_shop_order', $post_id))
        return $post_id;

    $order = wc_get_order($post_id);

    // Loop through order items
    foreach ($order->get_items() as $item_id => $item) {
        if (isset($_POST['imei_numberID' . $item_id])) {
            $item->update_meta_data('_serial_number', sanitize_text_field($_POST['imei_numberID' . $item_id]));
            $item->save();
        }
    }
    $order->save();
}


add_filter('woocommerce_order_item_display_meta_key', 'filter_wc_order_item_display_meta_key', 20, 3);
function filter_wc_order_item_display_meta_key($display_key, $meta, $item)
{
    // Change displayed label for specific order item meta key
    if (is_admin() && $item->get_type() === 'line_item' && $meta->key === '_serial_number') {
        $display_key = __("Serial Number", "woocommerce");
    }
    return $display_key;
}

add_action('woocommerce_order_item_meta_end', 'email_confirmation_display_order_items', 10, 4);

function email_confirmation_display_order_items($item_id, $item, $order, $plain_text)
{

    echo '<div style="font-size:10px;">Serial Number/s: <span style="color:red;"> ' . wc_get_order_item_meta($item_id, '_serial_number') . ' </span></p></div>';

}


function filter_woocommerce_shop_order_search_fields($search_fields)
{
    // Metakey
    $search_fields[] = '_serial_number';
    $search_fields[] = 'imei_numberID';

    return $search_fields;
}

add_filter('woocommerce_shop_order_search_fields', 'filter_woocommerce_shop_order_search_fields', 10, 1);


/**
 * @snippet       File Attachment @ WooCommerce Emails
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

//add_filter( 'woocommerce_email_attachments', 'bbloomer_attach_pdf_to_emails', 10, 4 );

function bbloomer_attach_pdf_to_emails($attachments, $email_id, $order, $email)
{
    $email_ids = array('customer_completed_order', 'customer_invoice');
    if (in_array($email_id, $email_ids)) {
        $upload_dir = wp_upload_dir();
        $attachments[] = $upload_dir['basedir'] . "/2021/12/cellucity-co-za-refunds-and-returns.pdf";
    }
    return $attachments;
}


//Add VAT Fields - Checkout

add_action('woocommerce_after_order_notes', 'checkout_my_custom_checkbox', 20);
function checkout_my_custom_checkbox($checkout)
{

    echo '<div id="my-new-field">';

    woocommerce_form_field('my_checkbox', array(
        'type' => 'checkbox',
        'class' => array('input-checkbox'),
        'label' => __('Add Business Details for VAT invoice'),
    ), $checkout->get_value('my_checkbox'));

    echo '</div>';
}

//Add VAT invoice details - Checkout

add_action('woocommerce_after_order_notes', 'checkout_vat_fields', 21);
function checkout_vat_fields($checkout)
{

    echo '<div id="checkout_vat_fields">';

    woocommerce_form_field('company_name', array(
        'type' => 'text',
        'class' => array('company-name-field form-row-wide'),
        'label' => __('Company name'),
        'placeholder' => __('Full name of the company'),
        'required' => false,
    ), $checkout->get_value('company_name'));

    woocommerce_form_field('vat_number', array(
        'type' => 'text',
        'class' => array('vat-number-field form-row-wide'),
        'label' => __('VAT Number'),
        'placeholder' => __('Enter VAT number'),
        'required' => false,
    ), $checkout->get_value('vat_number'));

    echo '</div>';
}

//Save checkbox value in the order meta

add_action('woocommerce_checkout_update_order_meta', 'checkout_my_custom_checkbox_update_order_meta');

function checkout_my_custom_checkbox_update_order_meta($order_id)
{
    if ($_POST['my_checkbox']) update_post_meta($order_id, '_my_checkbox', esc_attr($_POST['my_checkbox']));
}

//Save VAT details in the order meta

add_action('woocommerce_checkout_update_order_meta', 'vat_details_update_order_meta');
function vat_details_update_order_meta($order_id)
{

    if (!empty($_POST['company_name'])) {
        update_post_meta($order_id, '_company_name', sanitize_text_field($_POST['company_name']));
    }
    if (!empty($_POST['vat_number'])) {
        update_post_meta($order_id, '_vat_number', sanitize_text_field($_POST['vat_number']));
    }
}

// Display VAT invoice info - admin order

add_action('woocommerce_admin_order_data_after_billing_address', 'vat_checkbox_display_admin_order_meta', 10, 1);
function vat_checkbox_display_admin_order_meta($order)
{
    echo '<strong>' . __('VAT Invoice', 'woocommerce') . ':</strong> ';
    if (get_post_meta($order->id, '_my_checkbox', true) == '1') {
        echo 'Yes';
    } else {
        echo 'No';
    }
}

// Display VAT invoice details - admin order
/*
add_action( 'woocommerce_admin_order_data_after_billing_address', 'vat_number_display_admin_order_meta', 10, 1 );
function vat_number_display_admin_order_meta( $order ) {
    echo '<p><strong>' . __( 'Company Name', 'woocommerce' ) . ':</strong> ' . get_post_meta( $order->id, '_company_name', true ) . '</p>';
    echo '<p><strong>' . __( 'VAT Number', 'woocommerce' ) . ':</strong> ' . get_post_meta( $order->id, '_vat_number', true ) . '</p>';
}*/

// Display VAT invoice details - admin order

add_action('woocommerce_admin_order_data_after_billing_address', 'vat_number_display_admin_order_meta', 10, 1);
function vat_number_display_admin_order_meta($order)
{


    $item_value_name = get_post_meta($order->id, '_company_name', true);
    $item_value_vat = get_post_meta($order->id, '_vat_number', true);

    echo '<p><strong>' . __('Company Name', 'woocommerce') . ':</strong> ' . get_post_meta($order->id, '_company_name', true) . '</p>';
    echo '<p><strong>' . __('VAT Number', 'woocommerce') . ':</strong> ' . get_post_meta($order->id, '_vat_number', true) . '</p>';

    // Get "customer reference" from meta data (not item meta data)
    $updated_value_name = $order->get_meta('_company_name');
    $updated_value_vat = $order->get_meta('_vat_number');

    // Replace "customer reference" value by the meta data if it exist
    $valuename = $updated_value_name ? $updated_value_name : (isset($item_value_name) ? $item_value_name : '');

    // Display the custom editable field
    woocommerce_wp_text_input(array(
        'id' => 'company_name',
        'label' => __("Company Name:", "woocommerce"),
        'value' => $valuename,
        'wrapper_class' => 'form-field-wide',
    ));

    // Replace "customer reference" value by the meta data if it exist
    $valuevat = $updated_value_vat ? $updated_value_vat : (isset($item_value_vat) ? $item_value_vat : '');

    // Display the custom editable field
    woocommerce_wp_text_input(array(
        'id' => 'vat_number',
        'label' => __("VAT Number:", "woocommerce"),
        'value' => $valuevat,
        'wrapper_class' => 'form-field-wide',
    ));

}

// Save the custom editable field value as order meta data and update order item meta data
add_action('woocommerce_process_shop_order_meta', 'save_order_custom_field_meta_data', 12, 2);
function save_order_custom_field_meta_data($post_id, $post)
{
    if (isset($_POST['company_name'])) {
        // Save "comapny name" as order meta data
        update_post_meta($post_id, '_company_name', sanitize_text_field($_POST['company_name']));
    }
    if (isset($_POST['vat_number'])) {
        // Save "VAT Number" as order meta data
        update_post_meta($post_id, '_vat_number', sanitize_text_field($_POST['vat_number']));
    }

    /*if( isset( $_POST[ 'company_name' ] ) ){
        // Save "customer reference" as order meta data
        update_post_meta( $post_id, '_company_name', sanitize_text_field( $_POST[ 'company_name' ] ) );
    }*/
    // Update the existing "customer reference" item meta data
    /*  if( isset( $_POST[ 'item_id_ref' ] ) )
          wc_update_order_item_meta( $_POST[ 'item_id_ref' ], 'Your Reference', $_POST[ 'customer_ref' ] );
  }*/
}


//VAT Number in emails

add_filter('woocommerce_email_order_meta_keys', 'wpdesk_vat_number_display_email');

function wpdesk_vat_number_display_email($keys)
{
    $keys['Company Name'] = '_company_name';
    $keys['VAT Number'] = '_vat_number';
    return $keys;
}

//Show hide VAT fields

add_action('woocommerce_after_checkout_form', 'hide_show_vat_invoice', 999);
function hide_show_vat_invoice()
{

    wc_enqueue_js("jQuery('input#my_checkbox').change(function(){
           if (! this.checked) {
            // hide not checked
            jQuery('#checkout_vat_fields').hide();     
         } else {
            // show checked
            jQuery('#checkout_vat_fields').show();
         }
           
      }).change();");
}


//Change the 'Billing details' checkout label to 'Contact Information'
function wc_billing_field_strings($translated_text, $text, $domain)
{
    switch ($translated_text) {
        case 'Billing details' :
            $translated_text = __('Customer details', 'woocommerce');
            break;
    }
    return $translated_text;
}

add_filter('gettext', 'wc_billing_field_strings', 20, 3);

add_filter('woocommerce_loop_add_to_cart_link', function ($product) {

    global $product;

    if (is_shop() && 'variable' === $product->product_type) {
        return '';
    } else {
        sprintf('<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url($product->add_to_cart_url()),
            esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
            esc_attr(isset($args['class']) ? $args['class'] : 'button'),
            isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
            esc_html($product->add_to_cart_text())
        );
    }

});


function page_title_sc()
{
    return get_the_title();
}

add_shortcode('page_title', 'page_title_sc');

/*function post_title_shortcode(){
    return get_the_title();
}
add_shortcode('post_title','post_title_shortcode');*/


add_action('woocommerce_before_shop_loop_item_title', function () {
    global $product;
    if (!$product->is_in_stock()) {
        echo '<span class="soldOut">Sold Out</span>';
    }
});


add_action('woocommerce_checkout_before_customer_details', 'notice_shipping');

/*function notice_shipping() {
echo '<p class="allow" style="font-weight: 700; ">While we will strive to keep our delivery times, over this period, our courier services are under immense pressure and delivery times may be delayed by up to 2 - 3 days.', '</p>';
}	*/


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);

// Add the custom tab to the product edit page
function custom_product_data_tabs($product_data_tabs)
{
    $product_data_tabs['custom_deal'] = array(
        'label' => __('Deals', 'woocommerce'),
        'target' => 'custom_deal_options',
        'priority' => 100,
    );
    return $product_data_tabs;
}

add_filter('woocommerce_product_data_tabs', 'custom_product_data_tabs');

// Add the custom field to the custom tab
function custom_product_data_fields()
{
    global $woocommerce, $post;

    echo '<div id="custom_deal_options" class="panel woocommerce_options_panel hidden">';

    // Custom deals products field
    $upsell_ids = get_post_meta($post->ID, '_custom_deal_ids', true);
    $upsell_ids = is_array($upsell_ids) ? array_map('absint', $upsell_ids) : array();

    echo '<div class="options_group">';

    // Add category filter
    $category_id = get_term_by('slug', 'speakers', 'product_cat')->term_id;

    $args = array(
        'category' => $category_id,
    );

    echo '<p class="form-field"><label for="_custom_deal_ids">' . __('Deal Search', 'woocommerce') . '</label>';

    // Add $args to search function call
    echo '<select class="wc-product-search" multiple="multiple" style="width: 50%;" id="_custom_deal_ids" name="_custom_deal_ids[]" data-placeholder="' . esc_attr__('Search for deals&hellip;', 'woocommerce') . '" data-action="woocommerce_json_search_products_and_variations" data-args="' . esc_attr(wp_json_encode($args)) . '"></select>';

    echo '</p>';

    // Set the initial values of the select field
    $product_ids = array_filter(array_map('absint', $upsell_ids));
    foreach ($product_ids as $product_id) {
        $product = wc_get_product($product_id);
        if (is_object($product)) {
            echo '<option value="' . esc_attr($product->get_id()) . '" selected="selected">' . wp_kses_post($product->get_formatted_name()) . '</option>';
        }
    }

    echo '</div>';

    echo '</div>';
}

add_action('woocommerce_product_data_panels', 'custom_product_data_fields');

// Save the selected products
function custom_process_product_meta($post_id)
{
    $upsell_ids = isset($_POST['_custom_deal_ids']) ? array_filter(array_map('intval', $_POST['_custom_deal_ids'])) : array();
    update_post_meta($post_id, '_custom_deal_ids', $upsell_ids);
}

add_action('woocommerce_process_product_meta', 'custom_process_product_meta');

/**
 * Add a custom admin menu item for the 'Deals' post category.
 */
function add_deals_admin_menu_item()
{
    add_submenu_page(
        'woocommerce',
        'Deals',
        'Deals',
        'edit_posts',
        'edit.php?product_cat=deals&post_type=product',
        '',
        'dashicons-tag',
        21

    );
}

add_action('admin_menu', 'add_deals_admin_menu_item');
