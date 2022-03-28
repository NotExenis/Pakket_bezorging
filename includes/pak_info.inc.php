<?php
require 'private/conn.php';
$pakket_id = $_POST['pak_id'];
$sql = "SELECT * FROM tbl_pakket WHERE pakket_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':id' => $pakket_id
));
?>

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <br>
            </table>
            <div class="col-sm">
                <label for="table table-striped">
                </label>
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
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>