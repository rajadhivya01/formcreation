<?php
 
//require_once 'redis_config.php';
 require_once '../php/db_config.php';
 
if ($_REQUEST['username']) {
   
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
 
   
    
}
?>
