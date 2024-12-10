<?php
// Redis configuration
$redis = new Redis();


print_r($redis); die;

$redis->connect('127.0.0.1', 6379); // Ensure Redis is running locally
?>
