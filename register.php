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
 
    $statement = $pdo->prepare('INSERT INTO users (username, password, name, date_of_birth, contact_number,age)  
    VALUES (:user,:pwd,:fname,:dob,:contact,:age)');

$statement->execute([
    'user' => $username,
    'pwd' => $password,

    'fname' => $name,
    'dob' => $dob,
    'contact' => $contact_number,
    'age' => $age,

]);
echo 'Registration successful.';
   
    
}
?>
