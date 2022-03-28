<?php
require 'private/conn.php';

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM tbl_pakket WHERE pakket_user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':id'    => $user_id
));

?>
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-lg-">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Straatnaam</th>
                        <th scope="col">Huisnummmer</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Stad</th>
                        <th scope="col">Status</th>
                        <th scope="col">Omschrijving</th>
                        <th scope="col">Naam verstuurder</th>
                        <th scope="col">Totaal bedrag</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stmt as $r) { ?>
                        <tr>
                            <th><?= $r['pakket_straatnaam'] ?></th>
                            <td><?= $r['pakket_huisnummer'] ?></td>
                            <td><?= $r['pakket_postcode'] ?></td>
                            <td><?= $r['pakket_stad'] ?></td>
                            <td><?= $r['pakket_status'] ?></td>
                            <td><?= $r['pakket_omschrijving'] ?></td>
                            <td><?= $_SESSION['naam'] ?></td>
                            <td>$<?= $r['pakket_bedrag'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>