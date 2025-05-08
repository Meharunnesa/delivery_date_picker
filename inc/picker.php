<?php

class Picker {

    public function date_time_picker() {
        ?>
            
            <h2>Delivery Date Picker</h2>
            <label for="">Date : </label>
            <input type="text" name="date" id="delivery_date">
            <label for="">Time : </label>
            <input type="time" name="time" id="delivery_time">
            <br>
            
        <?php
    }
}

?>