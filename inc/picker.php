<?php

class Picker {

    public function date_time_picker() {
        ?>
       
            <form action="" method="post">
                <h2>Delivery Date Picker</h2>
                <label for="">Date : </label>
                <input type="date" name="date" id="">
                <label for="">Time : </label>
                <input type="time" name="time" id="">
                <br>
                <!-- <input type="submit" value="Submit" name="submit_delivery"> -->
            </form>
        
    
        <?php
    
        // if (isset($_POST['submit_delivery'])) {
    
        //     global $wpdb;
        //     $table_name = $wpdb->prefix . 'date_time';
    
        //     $data = array(
        //         'date' => sanitize_text_field($_POST['date']),
        //         'time' => sanitize_text_field($_POST['time'])
        //     );
        //     $format = array('%s', '%s');
    
        //     $wpdb->insert($table_name, $data, $format);
    
        // } 
    }
}










?>