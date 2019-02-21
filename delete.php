<?php
require_once 'connection.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$query = "delete from students WHERE id=:id";
$stmt = $con->prepare($query);
$stmt ->bindParam(':id',$id);
$stmt ->execute();
header('location:index.php');
exit();
}
