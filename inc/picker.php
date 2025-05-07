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
            </form>
        <?php
    }
}

?>