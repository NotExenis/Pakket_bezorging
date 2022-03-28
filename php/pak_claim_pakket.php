<?php
require '../private/conn.php';
session_start();
$user_id = $_SESSION['id'];
$id = $_POST['pak_id'];
$sql = "UPDATE tbl_pakket
        SET pakket_status = 'Geclaimed', koerier_id = :koerier_id 
        WHERE pakket_id = :pak_id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':pak_id' => $id,
    ':koerier_id'=>$user_id,
));
header('location: ../index.php?page=pak_allpakketjes');



?>