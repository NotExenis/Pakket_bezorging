<?php 
require '../private/conn.php';
$regio = $_POST['regio'];
$user = $_POST['users'];

$sql = "UPDATE tbl_users
        SET koerier_regio = :regio
        WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':regio'=>$regio,
    ':id'=>$user
));

header('location:../index.php?page=home');

?>