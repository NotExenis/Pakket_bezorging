<?php
require '../private/conn.php';
$id = $_POST['pak_id'];

$sql = "UPDATE tbl_pakket
        SET pakket_status = 'Afgeleverd'
        WHERE pakket_id = :pak_id";    
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':pak_id' => $id
));
header('location: ../index.php?page=pak_allpakketjes');
?>