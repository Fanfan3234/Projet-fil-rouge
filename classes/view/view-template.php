<?php

class ViewTemplate
{
  public static function alert($type = "info", $message = "bite", $lien = null)
  {
?>
    <div class="container alert  alert-<?= $type ?>" role="alert">
      <?= $message ?> <br />
      <?php
      if ($lien) {  ?>
        Cliquez <a href="<?= $lien ?>" class="alert-link px-2"> ici </a> pour continuer la navigation
      <?php
      }
      ?>
    </div>

  <?php

  }


  public static function menu()
  {

  ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
      <div class="contenair-fluid">
        <a class="navbar-brand" href="acceuil.php">Navbar</a>
      </div>

      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">
              <a class="nav-link" href="liste-client.php">clients <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="liste-employe.php">employes <span class="sr-only">(current)</span></a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="ajout-client.php">Inscription clients <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                Connexion
                <span class="sr-only">(current)</span></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../controller/login-client.php">Client<span class="sr-only">(current)</span></a>
                <a class="dropdown-item" href="../controller/login-employe.php">Employe<span class="sr-only">(current)</span></a>
                <div class="dropdown-divider"></div>

              </div>
            </li>


          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>



        </div>

      </div>

    </nav>
  <?php

  }
  public static function menuLogin()
  {

  ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
      <div class="contenair-fluid">
        <a class="navbar-brand" href="acceuil.php">Navbar</a>
      </div>

      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">
              <a class="nav-link" href="liste-client.php">clients <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="liste-employe.php">employes <span class="sr-only">(current)</span></a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="ajout-client.php">Inscription clients <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                Connexion
                <span class="sr-only">(current)</span></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../controller/login-client.php">Client<span class="sr-only">(current)</span></a>
                <a class="dropdown-item" href="../controller/login-employe.php">Employe<span class="sr-only">(current)</span></a>
                <div class="dropdown-divider"></div>

              </div>
            </li>


          </ul>
          



        </div>

      </div>

    </nav>
  <?php

  }

  public static function footer()
  {
  ?>
    <div class="bg-dark py-4 mt-5 text-center text-light h3">
      <div class="container">
        copyright &copy; <?= date("Y") ?>
      </div>
    </div>
<?php
  }
}
