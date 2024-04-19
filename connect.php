<?php
    $connection = new mysqli('localhost', 'root', '', 'dbBaringF2');

    if(!$connection) {
        die (mysqli_error($mysqli));
    }
?>