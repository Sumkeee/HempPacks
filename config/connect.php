<?php
$connection = mysqli_connect('localhost', 'root', '', 'hemppacks');
if (!$connection) {
    echo "Error. Unable to connect to MYSQL" . PHP_EOL;
    echo "Debugging problem" . mysqli_connect_errno() . PHP_EOL;
    exit;

}
