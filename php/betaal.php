<?php 
require '../private/conn.php';

$pakket_id = $_POST['pakket_id'];
$betaald = 'Betaald';

$sql = "UPDATE tbl_pakket SET pakket_betaald = :betaald WHERE pakket_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':betaald'=>$betaald,
    ':id'=>$pakket_id,
));

header('location:../index.php?page=user_verstuurd');
?>