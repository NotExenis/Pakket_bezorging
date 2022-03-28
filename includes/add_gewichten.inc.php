<?php
require 'private/conn.php';

$sql = "SELECT * FROM tbl_gewichten";
$stmt = $db->prepare($sql);
$stmt->execute();

?>
<form action="php/add_gewicht.php" method="POST">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <table class="table text-white">
                <thead>
                  <tr>
                    <th scope="col">Gewicht</th>
                    <th scope="col">Prijs</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($stmt as $r) { ?>
                    <tr>
                      <th><?= $r['gewicht_kilo'] ?>kg</th>
                      <td>$<?= $r['gewicht_prijs'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Voeg gewichten toe!</h2>
                <div class="form-group">
                  <label for="inputName">Aantal gewicht</label>
                  <input type="text" class="form-control" placeholder="Voorbeeld 0-10" name="kilo" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Prijs</label>
                  <input type="text" class="form-control" placeholder="Prijs" name="prijs" required>
                </div>
                <br>
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Voeg gewicht toe</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>