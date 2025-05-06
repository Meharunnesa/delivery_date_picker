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

class Delivery_Date_Picker {

    public function __construct() {
       
        add_action( 'easycommerce-before_cart_summary' , [ $this , 'picker' ] );
       

    }

    public function picker() {
        $picker = new Picker;
        $picker->date_time_picker();
    }
}

new Delivery_Date_Picker();

?>


