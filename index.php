<?php
if(isset($_GET['page'])){
  if(file_exists('php/' . $_GET['page'])){
    include 'php/' . $_GET['page'];
  }else{
    $page = $_GET['page'];
  }
}
else{
  $page = 'login';
}

session_start();

?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="CSS/style.css"> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body class="bg-warning">
  <?php include 'includes/navbar.inc.php'; ?>
  <?php include 'includes/'.$page.'.inc.php';?>
  </body>

</html>