<?php 
require '../private/conn.php';
$gewicht_id = $_POST['gewicht_id'];
$sql = "SELECT * FROM tbl_pakket 
        INNER JOIN tbl_gewichten 
        ON tbl_pakket.pakket_gewicht_id = tbl_gewichten.gewicht_id
        WHERE pakket_gewicht_id = :gewicht_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':gewicht_id',$gewicht_id);
$stmt->execute();

if($stmt->rowCount() == 0){
        $sql2 = "DELETE FROM tbl_gewichten WHERE gewicht_id = :id";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':id',$gewicht_id);
        $stmt2->execute();
}else{

    $message='Dit gewicht is in gebruik';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';    
    header('location: ../index.php?page=add_gewichten');

}

?>