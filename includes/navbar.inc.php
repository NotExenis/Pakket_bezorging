<?php
if(isset($_SESSION['role'])){
  if($_SESSION['role'] == 'admin'){
    $navitems = array(
      array('pak_verstuur', 'Verstuur pakketje'),
      array('pak_allpakketjes', 'Alle pakketen'),
      array('geclaimdepakket', 'Door jou geclaimde pakketen'),
      array('add_koerier', 'Nieuwe koeriers'),
      array('add_gewichten', 'Voeg gewichten toe'),
      array('all_accounts', 'Alle accounts'),
      array('koerier_regio', 'Regio koeriers'),
      array('logout.php', 'Logout')
    );
  }
  elseif($_SESSION['role'] == 'koerier'){
    $navitems = array(
      array('allpakketjes', 'Alle pakketen'),
      array('geclaimdepakket', 'Door jou geclaimde pakketen'),
      array('update_regio', 'Update regio'),
      array('logout.php', 'Logout')

    );

  }
  elseif($_SESSION['role'] == 'user'){

    $navitems = array(
      array('pak_verstuur', 'Verstuur pakketje'),
      array('user_verstuurd', 'Mijn verstuurde pakketen'),
      array('logout.php', 'Logout')

    );

  }
}
else{
  $navitems = array(
    array('login', 'Login'),
    array('registreer', 'Registreer')
  );
}


?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <ul class="navbar-nav">
<?php foreach((array)$navitems as $navitem){?>
 <li class="nav-item">
      <a class="font-weight-bold nav-link text-danger" href="index.php?page=<?= $navitem[0] ?>"><?= $navitem[1]?></a>
    </li>
 <?php } ?>
  </ul>
</nav> 