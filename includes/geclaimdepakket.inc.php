<?php 
require 'private/conn.php';
$id = $_SESSION['id'];

$sql = "SELECT *, naam FROM tbl_pakket 
        INNER JOIN tbl_gemeentes ON tbl_pakket.pakket_stad = tbl_gemeentes.id
        WHERE koerier_id = :id AND pakket_status = 'Geclaimed'";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':id'=>$id
));
?>

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
              <?php foreach ($stmt as $r) { ?>
                <tr>
                  <th><?= $r['pakket_straatnaam'] ?></th>
                  <td><?= $r['pakket_huisnummer'] ?></td>
                  <td><?= $r['pakket_postcode'] ?></td>
                  <td><?= $r['naam'] ?></td>
                  <td><?= $r['pakket_status'] ?></td>
                  <td>
                    <form action="php/pak_afronden.php" method="post">
                      <input type="hidden" name="pak_id" value="<?= $r['pakket_id'] ?>">
                      <button class="btn btn-danger">Rond af</button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>