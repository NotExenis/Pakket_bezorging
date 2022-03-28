<?php
require '../private/conn.php';
session_start();
$kilo = $_POST['KG'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$stad = $_POST['stad'];
$postcode = $_POST['postcode'];
$keuzepakket = $_POST['keuzepakket'];
$omschrijving = $_POST['omschrijving'];
$status = 'Aangemeld';
$user_id = $_SESSION['id'];

if($keuzepakket == '0'){
    $sql = "INSERT INTO tbl_pakket (pakket_straatnaam, pakket_huisnummer, pakket_stad, pakket_postcode, pakket_keuze, pakket_omschrijving, pakket_status, pakket_kg, pakket_user_id, pakket_bedrag)
        VALUES(:straatnaam, :huisnummer, :stad, :postcode, :keuzepakket, :omschrijving, :aangemeld, :kg, :id, :bedrag)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array( 
        ':straatnaam'=>$straatnaam,
        ':huisnummer'=>$huisnummer,
        ':stad'=>$stad,
        ':postcode'=>$postcode,
        ':keuzepakket'=>$keuzepakket,
        ':omschrijving'=>$omschrijving,
        ':aangemeld'=>$status,
        ':kg'=>$kilo,
        ':id'=>$user_id,
        ':bedrag'=>$kilo
    ));
}else{
    
    $totaalbedrag = ($kilo/100) * $keuzepakket + $kilo;
    $sql = "INSERT INTO tbl_pakket (pakket_straatnaam, pakket_huisnummer, pakket_stad, pakket_postcode, pakket_keuze, pakket_omschrijving, pakket_status, pakket_kg, pakket_user_id, pakket_bedrag)
    VALUES(:straatnaam, :huisnummer, :stad, :postcode, :keuzepakket, :omschrijving, :aangemeld, :kg, :id, :bedrag)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array( 
        ':straatnaam'=>$straatnaam,
        ':huisnummer'=>$huisnummer,
        ':stad'=>$stad,
        ':postcode'=>$postcode,
        ':keuzepakket'=>$keuzepakket,
        ':omschrijving'=>$omschrijving,
        ':aangemeld'=>$status,
        ':kg'=>$kilo,
        ':id'=>$user_id,
        ':bedrag'=>$totaalbedrag
    ));
}


header('location:../index.php?page=home');
// echo "<pre>", print_r($totaalbedrag), "</pre>";


?>