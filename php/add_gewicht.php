<?php
require '../private/conn.php';
$kilo = $_POST['kilo'];
$prijs = $_POST['prijs'];

$sql2 = "SELECT * FROM tbl_gewichten WHERE gewicht_kilo = :kilo";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(array(
    ':kilo'=>$kilo
));

if($stmt2->rowCount() == 0){
$sql = "INSERT INTO tbl_gewichten (gewicht_kilo, gewicht_prijs)
        VALUES(:kilo, :prijs)";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':kilo'=>$kilo,
    ':prijs'=>$prijs
));
}
else{

}
header('location:../index.php?page=add_gewichten')
?>