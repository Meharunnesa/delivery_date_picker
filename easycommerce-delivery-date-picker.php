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
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'easycommerce-before_cart_summary' , [ $this , 'picker' ] );
        add_action( 'easycommerce_after_order', [ $this, 'save_delivery_date_time' ], 10, 2 );
        add_filter( 'easycommerce_get_single_order_data', [ $this, 'date_store_from_order' ], 10, 2 );
        add_filter( 'easycommerce_updater', [ $this, 'update' ] );
    }

    public function update( $plugins ) {
		$plugins[] = 'easycommerce-delivery-date-picker';

		return $plugins;
	}

    public function enqueue_scripts() {
		wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_style( 'jquery-ui-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css' );
		wp_enqueue_script(
			'easycommerce-delivery-date',
			plugins_url( 'assets/js/main.js', __FILE__ ),
			[ 'jquery', 'jquery-ui-datepicker' ],
			'1.1',
			true
		);
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
            
            
            $order->add_meta( 'delivery_date', $delivery_date );
            $order->add_meta( 'delivery_time', $delivery_time );
        }


    }

    public function date_store_from_order( $order_data , $order_id ) {
       
		$order 					 	 = new Order( $order_id );
        $delivery_date 		 	 = $order->get_meta( 'delivery_date' );
        $delivery_time 		 	 = $order->get_meta( 'delivery_time' );
        $order_data['delivery_date'] = $delivery_date ?: 'N/A';
        $order_data['delivery_time'] = $delivery_time ?: 'N/A';
		
        return $order_data;

        error_log(print_r($order_data));
	}

}

new Delivery_Date_Picker();

?>


