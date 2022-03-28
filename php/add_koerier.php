<?php 
require '../private/conn.php';

$naam = $_POST['naam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$ww = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
$postcode = $_POST['postcode'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$woonplaats = $_POST['woonplaats'];
$role = 'koerier';

$sql = "SELECT * FROM tbl_users WHERE user_email = :email";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    'email'=>$email
));
$r = $stmt->fetch();
if($stmt->rowcount() == 0){
$sql2 = "INSERT INTO tbl_users 
        (user_naam, user_tussenvoegsel, user_achternaam, user_email, user_wachtwoord, user_postcode, user_straatnaam, user_huisnummer,  user_woonplaats, user_role)
        VALUES (:naam, :tussenvoegsel, :achternaam, :email, :wachtwoord, :postcode, :straatnaam, :huisnummer, :woonplaats, :role)";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(array( 
    ':naam'=>$naam,
    ':tussenvoegsel'=>$tussenvoegsel,
    ':achternaam'=>$achternaam,
    ':email'=>$email,
    ':wachtwoord'=>$ww,
    ':postcode'=>$postcode,
    ':straatnaam'=>$straatnaam,
    ':huisnummer'=>$huisnummer,
    ':woonplaats'=>$woonplaats,
    ':role'=>$role
));
header('location: ../index.php?page=home');

}else{
    header('location: ../index.php?page=add_koerier');

}


?>


