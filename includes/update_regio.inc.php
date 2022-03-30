<?php 
require 'private/conn.php';
$sql = "SELECT * FROM tbl_gemeentes";
$stmt = $db->prepare($sql);
$stmt->execute();
?>

<div class="container">
  <div class="row">
    <div class="col-sm">

    </div>
    <form action="php/update_admin_regio.php" method="post">
    <div class="col-sm">
        <br>
        <select name="gemeentes">
            <?php foreach($stmt as $r){ ?>
                <option name="gemeentes" value="<?= $r['id'] ?>"><?= $r['naam'] ?></option>
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