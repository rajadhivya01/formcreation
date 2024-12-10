<?php
//require_once 'redis_config.php';
require_once 'db_config.php';

// Retrieve JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

  $username = $data['username'];
 $password = $data['password'];
session_start();
try {
    // Check if the username exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $password =$user['password']) {
        // Cache user data in Redis
      //  $redis->set("user_session:$username", json_encode($user));
        $_SESSION['username']=$user['username'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'An error occurred.']);
}
?>

