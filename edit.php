<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/register3.js" type="text/javascript" defer></script>
    <title>Register</title>
</head>
<body>
    <?php
require_once 'php/db_config.php';
 
 
if (isset($_REQUEST['username']) and $_REQUEST['username']!='') {
   
    $username = $_REQUEST['username'] ?? '';
   
    $password = $_REQUEST['password'] ?? '';
    $name = $_REQUEST['name'] ?? '';
    $dob = $_REQUEST['dob'] ?? '';
    $contact_number = $_REQUEST['contact'] ?? '';
    $age='';
if($dob !='')
{
    $today=date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
$age=$diff->format('%y');

}
    if (!$username || !$password || !$name || !$dob || !$contact_number) {
    //    die('All fields are required.');
    }
 
    $sql = "UPDATE users SET name=?, password=?, date_of_birth=?, contact_number=?, age=? WHERE username=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name,$password,$dob, $contact_number, $age, $username]);

     
echo 'Updated successfuly.';
 
  header("location:php/profile.php"); 
    
}
  


session_start();

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$_SESSION['username']]);
$user = $stmt->fetch();
?>
    <h1>Edit Profile</h1> 
    <form id="registerForm" method="POST"  onsubmit="edit();"  >

    <input type="hidden" id="username" name="username"  value="<?php echo $user['username'];?>">
       <label for="username">Name <input type="text" id="name" name="name" placeholder="name" value="<?php echo $user['name'];?>" required>
       </label>
       <label for="contact">Contact Number <input type="text" id="contact" name="contact" placeholder="name" value="<?php echo $user['contact_number'];?>" required>
       </label>

       <label for="date_of_birth">Date of Birth <input type="text" id="dob" name="dob" placeholder="dob" value="<?php echo $user['date_of_birth'];?>" required>
       </label>
       <label for="password">Password<input type="text" id="password" name="password" placeholder="password" value="<?php echo $user['password'];?>" required>
       </label>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
