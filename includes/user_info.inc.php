<?php 
require 'private/conn.php';
$id = $_POST['user_id'];

$sql = "SELECT * FROM tbl_users
        INNER JOIN tbl_pakket
        ON tbl_users.user_id = tbl_pakket.pakket_user_id 
        WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array(  ':id' => $id));



?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Straatnaam</th>
            <th scope="col">Huisnummer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stmt as $r) { ?>
            <tr>
                <th><?= $r['pakket_straatnaam'] ?></th>
                <th><?= $r['pakket_huisnummer'] ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>