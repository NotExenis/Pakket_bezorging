<?php
require 'private/conn.php';

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM tbl_pakket WHERE pakket_user_id = :id AND pakket_status <> 'Afgeleverd' ";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':id'    => $user_id
));

$sql2 = "SELECT * FROM tbl_pakket WHERE  pakket_user_id = :id AND pakket_status = 'Afgeleverd' AND pakket_betaald = 'onbetaald'";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(array(
    ':id'    => $user_id
));

$sql3 = "SELECT * FROM tbl_pakket WHERE  pakket_user_id = :id AND pakket_betaald = 'Betaald'";
$stmt3 = $db->prepare($sql3);
$stmt3->execute(array(
    ':id'    => $user_id
));

?>
<div class="container">
    <div class="row">
        <div class="col-sm">
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
        <div class="col-lg-">
        <table class="table table-striped">
        <h1>Afgeleverde pakketen</h1>

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
                        <th scope="col">Betaal status</th>
                        <th scope="col">Betaal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stmt2 as $r2) { ?>
                        <tr>
                            <th><?= $r2['pakket_straatnaam'] ?></th>
                            <td><?= $r2['pakket_huisnummer'] ?></td>
                            <td><?= $r2['pakket_postcode'] ?></td>
                            <td><?= $r2['pakket_stad'] ?></td>
                            <td><?= $r2['pakket_status'] ?></td>
                            <td><?= $r2['pakket_omschrijving'] ?></td>
                            <td><?= $_SESSION['naam'] ?></td>
                            <td>$<?= $r2['pakket_bedrag'] ?></td>
                            <td><?= $r2['pakket_betaald'] ?></td>
                            <td>
                                <form action="php/betaal.php" method="post">
                                    <input type="hidden" name="pakket_id" value="<?= $r2['pakket_id'] ?>">
                                    <button class="btn btn-dark">Betaal</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
           
        </div>
        <div class="col-sm">
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
                        <th scope="col">Betaal status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stmt3 as $r3) { ?>
                        <tr>
                            <th><?= $r3['pakket_straatnaam'] ?></th>
                            <td><?= $r3['pakket_huisnummer'] ?></td>
                            <td><?= $r3['pakket_postcode'] ?></td>
                            <td><?= $r3['pakket_stad'] ?></td>
                            <td><?= $r3['pakket_status'] ?></td>
                            <td><?= $r3['pakket_omschrijving'] ?></td>
                            <td><?= $_SESSION['naam'] ?></td>
                            <td>$<?= $r3['pakket_bedrag'] ?></td>
                            <td><?= $r3['pakket_betaald'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        
        </div>
    </div>
</div>