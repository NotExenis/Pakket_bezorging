<?php
require 'private/conn.php';
$pakket_id = $_POST['pak_id'];

$sql = "SELECT * FROM tbl_gemeentes";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM tbl_pakket WHERE pakket_id = :id";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(array('id' => $pakket_id));
$r2 = $stmt2->fetch();
?>
<form action="php/edit_pakket.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-6">
                <h3>Edit het pakketje</h3>
                <div>
                    <br>
                    <input type="text" value="<?= $r2['pakket_straatnaam']  ?>" name="straatnaam" placeholder="Straatnaam" required>
                </div>
                <div>
                    <br>
                    <input type="text" value="<?= $r2['pakket_huisnummer']  ?>" name="huisnummer" placeholder="Huisnummer" required>
                </div>
                <div>
                </div>
                <div>
                    <br>
                    <input type="text" value="<?= $r2['pakket_postcode']  ?>" name="postcode" placeholder="Postcode" required>
                </div>
                <div>
                </div>
                <br>
                <div>
                    <input type="text" value="<?= $r2['pakket_omschrijving']  ?>" name="omschrijving" placeholder="Omschrijving" required>
                </div>
                <br>
                <input type="hidden"  value="<?= $r2['pakket_id'] ?>"  name="id" >
                <button class="btn btn-dark" type="submit">Edit</button>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</form>