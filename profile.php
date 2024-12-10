<?php
require_once 'redis_config.php';

$user_data = $redis->get('user_session');
if (!$user_data) {
    header('Location: ../login.html');
    exit;
}

$user = json_decode($user_data, true);
echo json_encode($user);
?>
