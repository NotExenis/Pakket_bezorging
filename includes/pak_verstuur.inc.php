<?php
require 'private/conn.php';
$sql = "SELECT * FROM tbl_gemeentes";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM tbl_gewichten";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();

$sql3 = "SELECT * FROM tbl_gewichten";
$stmt3 = $db->prepare($sql3);
$stmt3->execute();

?>
<form action="php/pak_verstuur.php" method="POST">
  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col-6">

        <h3>Meld uw pakketje aan</h3>
        <br>
        <h5>Hoeveel weegt uw pakketje</h5>
        <div>
          <select name="prijs">
            <?php foreach ($stmt2 as $r2) { ?>
              <option name="prijs" value="<?= $r2['gewicht_id'] ?>">$<?= $r2['gewicht_prijs'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div>
          <br>
          <input type="text" name="straatnaam" placeholder="Straatnaam" required>
        </div>
        <div>
          <br>
          <input type="text" name="huisnummer" placeholder="Huisnummer" required>
        </div>
        <div> 
          <br>
          <select name="stad">
            <?php foreach ($stmt as $r) { ?>
              <option name="stad" value="<?= $r['id'] ?>"><?= $r['naam'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div>
          <br>
          <input type="text" name="postcode" placeholder="Postcode" required>
        </div>
        <div>
          <br>
          <select name="keuzepakket">
            <option value="0">Niks</option>
            <option value="20">Verzekerd +20%</option>
            <option value="10">Spoed +10%</option>
            <option value="30">Verzekerd en spoed +30%</option>
            <option value="12.5">Zakelijk spoed +12.5%</option>
          </select>
        </div>
        <br>

        <div>
          <input type="text" name="omschrijving" placeholder="Omschrijving" required>
        </div>
        <br>
        <button class="btn btn-dark" type="submit">Volgende pagina</button>



      </div>
      <div class="col-2">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Gewicht</th>
              <th scope="col">Prijs</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($stmt3 as $r3) { ?>
              <tr>
                <th><?= $r3['gewicht_kilo'] ?>kg</th>
                <td>$<?= $r3['gewicht_prijs'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</form>