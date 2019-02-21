<?php
session_start();
require_once 'connection.php';
if(isset($_POST['email']) &&($_POST['username'])){
$email = $_POST['email'];
$username = $_POST['username'];


$stmt =$con->prepare("INSERT INTO students(email,username) VALUES (:email,:username)");
$success = $stmt ->execute([
  ':email'=> $email,
  ':username' => $username
]);
if($success===true){
$_SESSION['message'] = 'Inserted succesfully';
header('location:create.php');
exit();
}else{
$_SESSION['message'] = 'Something went wrong';
header('location:create.php');
exit();
}
}
