<?php 
require '../private/conn.php';

$straat = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$omschrijving = $_POST['omschrijving'];
$pakket_id = $_POST['id'];

$sql = "UPDATE tbl_pakket 
        SET pakket_straatnaam = :straat, pakket_huisnummer = :huis, pakket_postcode = :post, pakket_omschrijving = :oms
        WHERE pakket_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':straat'	=> $straat,
    ':huis'	=> $huisnummer,
    ':post'	=> $postcode,
    ':oms'	=> $omschrijving,
    ':id'=> $pakket_id,
));

header('location:../index.php?page=pak_allpakketjes');

?>