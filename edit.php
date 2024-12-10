<?php
require_once 'db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $age = date_diff(date_create($dob), date_create(date("Y-m-d")))->format('%y');

    try {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, date_of_birth = ?, contact_number = ?, password = ?, age = ? WHERE username = ?");
        $stmt->execute([$name, $dob, $contact, $password, $age, $username]);
        echo 'Profile updated successfully.';
        header("Location: profile.php");
    } catch (Exception $e) {
        echo 'An error occurred. Please try again.';
    }
}
?>
