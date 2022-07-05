        // add code to your functions.php (child theme)
        
        add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
        function custom_override_checkout_fields( $fields ) {
        $fields['billing']['billing_date'] = array(
        'label' => __('Date', 'woocommerce'),
        'type' => 'date',
        'placeholder' => _x('Date', 'placeholder', 'woocommerce'),
        'required' => true,
        'class' => array('form-row-wide'),
        'clear' => true
        );
        return $fields;
        }
        add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');
        function my_custom_checkout_field_update_order_meta( $order_id ) {
        if ($_POST['billing_date']) update_post_meta( $order_id, 'Date', esc_attr($_POST['billing_date']));
        }
