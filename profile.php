<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/profile.js" defer></script>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <div id="profileDetails">
<?php
require_once 'db_config.php';

session_start();

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$_SESSION['username']]);
$user = $stmt->fetch();

 
    ?>
    <p>Name: <?php echo $user['name'];?></p>
        <p>Age: <?php echo $user['age'];?></p>
        <p>Date of Birth: <?php echo $user['date_of_birth'];?></p>
         <p>Contact: <?php echo $user['contact_number'];?></p>

    </div>
    <button id="logoutButton"><a href="logout.php" >Logout</a></button>
    <button id="changeButton"><a href="../edit.php" >Edit Profile</a></button>
</body>
</html>

