<?php
session_start();
if (isset($_SESSION['LAST_CALL'])) {
    $last = strtotime($_SESSION['LAST_CALL']);
    $curr = strtotime(date("Y-m-d h:i:s"));
    $sec =  abs($last - $curr);
    if ($sec <= 5) {
        die ("Rate limit exceeded.");
    }
}
$_SESSION['LAST_CALL'] = date("Y-m-d h:i:s");
?>