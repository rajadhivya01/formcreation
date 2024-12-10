<?php
require_once 'redis_config.php';
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $name = $_POST['name'] ?? '';
    $dob = $_POST['date_of_birth'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';

    if (!$username || !$password || !$name || !$dob || !$contact_number) {
        die('All fields are required.');
    }

    $query = "INSERT INTO users (username, password, name, date_of_birth, contact_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssss', $username, $password, $name, $dob, $contact_number);

    if ($stmt->execute()) {
        echo 'Registration successful.';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
