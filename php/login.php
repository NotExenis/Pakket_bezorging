<?php
require '../private/conn.php';
session_start();

$email = $_POST['email'];
$pass = $_POST['wachtwoord'];

$sql = "SELECT * FROM tbl_users 
        INNER JOIN tbl_gemeentes ON tbl_users.koerier_regio = tbl_gemeentes.id
        WHERE user_email = :email";
$stmt = $db->prepare($sql);
$stmt->execute(array(
  ':email'=>$email
));
$r = $stmt->fetch();





if(password_verify($pass, $r['user_wachtwoord'])){
    $_SESSION['id'] = $r['user_id'];
    $_SESSION['role'] = $r['user_role'];
    $_SESSION['naam'] = $r['user_naam'];
    $_SESSION['regio_id'] = $r['id'];
   if(isset($_SESSION['role'])){
       header('location: ../index.php?page=home');
   }
}
else{
    header('location: ../index.php?page=login');

}

?>