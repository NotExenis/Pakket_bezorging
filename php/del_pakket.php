<?php
require '../private/conn.php';

$pak_id = $_POST['pak_id'];

$sql = "DELETE FROM tbl_pakket WHERE pakket_id = :pakket_id";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':pakket_id'=>$pak_id
));
// echo "<pre>", print_r($pak_id), "</pre>";

header('location:../index.php?page=pak_allpakketjes');
?>