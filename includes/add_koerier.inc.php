<?php 
require 'private/conn.php';
$sql = "SELECT * FROM tbl_gemeentes";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM tbl_gemeentes";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();

$sql1 = "SELECT * FROM tbl_users WHERE user_role = 'koerier'";
$stmt1 = $db->prepare($sql1);
$stmt1->execute();

?>
<form action="php/add_koerier.php" method="POST">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <table class="table text-white">
            <thead>
              <tr>
                <th scope="col">Naam</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($stmt1 as $r1) { ?>
                <tr>
                  <th><?= $r1['user_naam'] ?></th>
                  <td><?= $r1['user_email'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Voeg een koerier toe!</h2>
                                    <div class="form-group">  
                                        <label for="inputName">Naam</label>
                                        <input type="text" class="form-control"  placeholder="Voornaam" name="naam" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Tussenvoegsel</label>
                                        <input type="text" class="form-control"  placeholder="Tussenvoegsel" name="tussenvoegsel">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Achternaam</label>
                                        <input type="text" class="form-control"  placeholder="Achternaam" name="achternaam" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3">Email</label>
                                        <input type="email" class="form-control"  placeholder="email@gmail.com" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">Wachtwoord</label>
                                        <input type="password" class="form-control"  placeholder="Wachtwoord" name="wachtwoord" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">Postcode</label>
                                        <input type="text" class="form-control"  placeholder="Postcode" name="postcode" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4">Adres</label>
                                        <input type="text" class="form-control"  placeholder="Straatnaam" name="straatnaam" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4">Huisnummer</label>
                                        <input type="text" class="form-control"  placeholder="Huisnummer" name="huisnummer" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                      <label for="woonplaats">Woonplaats</label>
                                      <select name="woonplaats">
                                        <?php foreach($stmt as $r){ ?>
                                        <option name="woonplaats" value="<?= $r['id'] ?>"><?= $r['naam'] ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <br>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Add koerier</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
