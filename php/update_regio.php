<?php 
require '../private/conn.php';
session_start();
$regio = $_POST['gemeentes'];
$id = $_SESSION['id'];
$sql = "UPDATE tbl_users 
        SET koerier_regio = :regio 
        WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':regio'=>$regio,
    ':id'=>$id,
));
header('location: ../index.php?page=home');
?>