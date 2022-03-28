<?php
require 'private/conn.php';
$sql = "SELECT *, naam FROM tbl_pakket 
        INNER JOIN tbl_gemeentes ON tbl_pakket.pakket_stad = tbl_gemeentes.id WHERE pakket_status = 'Aangemeld' ";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT *, naam FROM tbl_pakket 
          INNER JOIN tbl_gemeentes ON tbl_pakket.pakket_stad = tbl_gemeentes.id WHERE pakket_status = 'Geclaimed'";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();

$sql3 = "SELECT *, naam FROM tbl_pakket 
        INNER JOIN tbl_gemeentes ON tbl_pakket.pakket_stad = tbl_gemeentes.id WHERE pakket_status = 'Afgeleverd'";
$stmt3 = $db->prepare($sql3);
$stmt3->execute();



?>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <label for="table table-striped">
        <h3>Aangemelde pakketen</h3>
      </label>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Straatnaam</th>
            <th scope="col">Huisnummmer</th>
            <th scope="col">Postcode</th>
            <th scope="col">Stad</th>
            <th scope="col">Status</th>
            <th scope="col">Bezorg pakketje</th>
            <th scope="col">Info</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($stmt as $r) { ?>
            <tr>
              <th><?= $r['pakket_straatnaam'] ?></th>
              <td><?= $r['pakket_huisnummer'] ?></td>
              <td><?= $r['pakket_postcode'] ?></td>
              <td><?= $r['naam'] ?></td>
              <td><?= $r['pakket_status'] ?></td>
              <td>
                <form action="php/pak_claim_pakket.php" method="post">
                  <input type="hidden" name="pak_id" value="<?= $r['pakket_id'] ?>">
                  <button class="btn btn-dark">Bezorg</button>
                </form>
                </td>
                <td>
                <form action="index.php?page=pak_info" method="post">
                  <input type="hidden" name="pak_id" value="<?= $r['pakket_id'] ?>">
                  <button class="btn btn-secondary">Info</button>
                </form>
                </td>  
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="col-sm">
        <label for="table table-striped">
          <h3>Geclaimde pakketen</h3>
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
                <th scope="col">Bezorg pakketje</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($stmt2 as $r2) { ?>
                <tr>
                  <th><?= $r2['pakket_straatnaam'] ?></th>
                  <td><?= $r2['pakket_huisnummer'] ?></td>
                  <td><?= $r2['pakket_postcode'] ?></td>
                  <td><?= $r2['naam'] ?></td>
                  <td><?= $r2['pakket_status'] ?></td>
                  <td>
                    <form action="php/pak_afronden.php" method="post">
                      <input type="hidden" name="pak_id" value="<?= $r2['pakket_id'] ?>">
                      <button class="btn btn-danger">Rond af</button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          </table>
          <div class="col-sm">
            <label for="table table-striped">
              <h3>Afgeronde pakketen</h3>
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
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($stmt3 as $r3) { ?>
                    <tr>
                      <th><?= $r3['pakket_straatnaam'] ?></th>
                      <td><?= $r3['pakket_huisnummer'] ?></td>
                      <td><?= $r3['pakket_postcode'] ?></td>
                      <td><?= $r3['naam'] ?></td>
                      <td><?= $r3['pakket_status'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>