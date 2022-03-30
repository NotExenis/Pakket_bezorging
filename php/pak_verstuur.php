<?php
require '../private/conn.php';
session_start();
$prijs = $_POST['prijs'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$stad = $_POST['stad'];
$postcode = $_POST['postcode'];
$keuzepakket = $_POST['keuzepakket'];
$omschrijving = $_POST['omschrijving'];
$status = 'Aangemeld';
$user_id = $_SESSION['id'];
$betaald = 'onbetaald';

if($keuzepakket == '0'){
    $sql = "INSERT INTO tbl_pakket (pakket_straatnaam, pakket_huisnummer, pakket_betaald, pakket_stad, pakket_postcode, pakket_keuze, pakket_omschrijving, pakket_status, pakket_gewicht_id, pakket_user_id)
        VALUES(:straatnaam, :huisnummer, :betaald, :stad, :postcode, :keuzepakket, :omschrijving, :aangemeld, :kg, :id)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array( 
        ':straatnaam'=>$straatnaam,
        ':huisnummer'=>$huisnummer,
        ':stad'=>$stad,
        ':postcode'=>$postcode,
        ':keuzepakket'=>$keuzepakket,
        ':omschrijving'=>$omschrijving,
        ':aangemeld'=>$status,
        ':kg'=>$prijs,
        ':id'=>$user_id,
        ':betaald'=>$betaald,

    ));
}else{

        $sql3 = "SELECT * FROM tbl_gewichten WHERE gewicht_id = :gewicht_id";
        $stmt3 = $db->prepare($sql3);
        $stmt3->bindParam(':gewicht_id',$prijs);
        $stmt3->execute();
        $r = $stmt3->fetch();

    $prijs2 = $r['gewicht_prijs'];

    $totaleprijs = ($prijs2/100) * $keuzepakket + $prijs2;

    $sql2 = "INSERT INTO tbl_pakket (pakket_straatnaam, pakket_huisnummer, pakket_betaald, pakket_stad, pakket_postcode, pakket_keuze, pakket_omschrijving, pakket_status, pakket_gewicht_id, pakket_user_id, pakket_bedrag)
    VALUES(:straatnaam, :huisnummer, :betaald, :stad, :postcode, :keuzepakket, :omschrijving, :aangemeld, :kg, :id, :bedrag)";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute(array( 
        ':straatnaam'=>$straatnaam,
        ':huisnummer'=>$huisnummer,
        ':stad'=>$stad,
        ':postcode'=>$postcode,
        ':keuzepakket'=>$keuzepakket,
        ':omschrijving'=>$omschrijving,
        ':aangemeld'=>$status,
        ':kg'=>$prijs,
        ':id'=>$user_id,
        ':bedrag'=>$totaleprijs,
        ':betaald'=>$betaald,
    ));
}


header('location:../index.php?page=home');
// echo "<pre>", print_r($totaalbedrag), "</pre>";


?>
