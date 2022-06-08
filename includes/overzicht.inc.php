<?php
require 'private/conn.php';

$sql = "SELECT * FROM tbl_pakket 
        INNER JOIN tbl_gemeentes ON tbl_gemeentes.id = tbl_pakket.pakket_stad
        WHERE pakket_betaald = 'Betaald'";
$stmt = $db->prepare($sql);
$stmt->execute();
$totaalbedrag = '0';

?>

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <br>
            <table>
                <tr>
                    <th>Regio</th>
                    <th>bedrag</th>
                </tr>
                <?php foreach ($stmt as $r) { ?>
                    <?php $totaalbedrag += $r['pakket_bedrag']; ?>
                    <tr>
                        <td><?= $r['naam'] ?></td>
                        <td>$<?= $r['pakket_bedrag'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <h3>Totale bedrag betaald</h3>
          <h3>$<?= $totaalbedrag; ?></h3>  

        </div>
        <div class="col-sm">
        </div>
    </div>
</div>