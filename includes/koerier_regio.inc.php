<?php 
require 'private/conn.php';
$sql = "SELECT * FROM tbl_users WHERE user_role <> 'user' ";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM tbl_gemeentes";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();


?>

<div class="container">
  <div class="row">
    <div class="col-sm">

    </div>
    <form action="php/update_regio_admin.php" method="post">
    <div class="col-sm">
        <br>
        <select name="users">
            <?php foreach($stmt as $r){ ?>
                <option name="users" value="<?= $r['user_id'] ?>"><?= $r['user_naam'] ?></option>
                <?php } ?>
        </select>
        <br>
        <br>
        <select name="regio">
            <?php foreach($stmt2 as $r2){ ?>
                <option name="regio" value="<?= $r2['id'] ?>"><?= $r2['naam'] ?></option>
                <?php } ?>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-dark">Update regio</button>
    </form>
    <div class="col-sm">

    </div>
  </div>
</div>