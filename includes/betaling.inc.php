<?php
require 'private/conn.php';
$u_id = $_SESSION['id'];
$sql = "SELECT * FROM tbl_pakket WHERE pakket_user_id = (SELECT max(pakket_id) FROM tbl_pakket WHERE pakket_user_id = :pakket_user_id)";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':pakket_user_id' => $u_id
));
$r = $stmt->fetch();
?>
<div class="container">
  <div class="row">
    <div class="col-sm">

    </div>
    <div class="col-sm">

   <input type="text" value="<?= $r['pakket_straatnaam'] ?>
"> 
    </div>
    <div class="col-sm">

    </div>
    </div>
    </div>