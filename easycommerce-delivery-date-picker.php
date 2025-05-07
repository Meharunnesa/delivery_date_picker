<?php
/*
 * Plugin Name:       Delivery Date Picker
 * Description:       This plugin help for pick delivery date
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bristy
 * Author URI:        https://author.example.com/
 * Text Domain:       delivery-date-picker
 * Domain Path:       /languages
 */

require_once __DIR__ . '/inc/picker.php';
use EasyCommerce\API\Order;

class Delivery_Date_Picker {

    public function __construct() {
        add_action( 'easycommerce-before_cart_summary' , [ $this , 'picker' ] );
        add_action( 'easycommerce_after_order', [ $this, 'save_delivery_date_time' ], 10, 2 );
    }

    public function picker() {
        $picker = new Picker;
        $picker->date_time_picker();
    }

    public function save_delivery_date_time( $order_id , $params ) {

        $order = new Order( $order_id );
        error_log(print_r($order));
 
        if ( isset( $params['date'] ) && isset( $params['time'] ) ) {

            $delivery_date = sanitize_text_field( $params['date'] );
            $delivery_time = sanitize_text_field( $params['time'] );   
        }

        $order->add_meta( 'delivery_date', $delivery_date );
        $order->add_meta( 'delivery_time', $delivery_time );

    }

}

new Delivery_Date_Picker();

?>


