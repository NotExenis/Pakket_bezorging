<?php 
require 'private/conn.php';

$sql = "SELECT * FROM tbl_users";
$stmt = $db->prepare($sql);
$stmt->execute();

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Verstuurd</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stmt as $r) { ?>
            <tr>
                <th><?= $r['user_email'] ?></th>
                <th>
                    <form action="index.php?page=user_info" method="post">
                        <input type="hidden" name="user_id" value="<?= $r['user_id'] ?>">
                        <button type="submit" class="btn btn-info">Verstuurd</button>
                    </form>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>