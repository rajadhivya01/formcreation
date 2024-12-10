<?php
require_once 'db_config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username'], $data['password'], $data['name'], $data['dob'], $data['contact'])) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

$username = $data['username'];
$password = $data['password'];
$name = $data['name'];
$dob = $data['dob'];
$contact = $data['contact'];

// Calculate age based on DOB
$today = new DateTime();
$dateOfBirth = new DateTime($dob);
$age = $today->diff($dateOfBirth)->y;

try {
    $stmt = $pdo->prepare("INSERT INTO users (username, password, name, date_of_birth, contact_number, age) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$username, $password, $name, $dob, $contact, $age]);
    echo json_encode(['success' => true, 'message' => 'User registered successfully.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
