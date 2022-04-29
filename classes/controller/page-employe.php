<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Accueil</title>
</head>

<body>

  <?php
  session_start();
  require_once "../view/view-template.php";
  require_once "../view/view-employe.php";
  require_once "../model/model-employe.php";


  if (isset($_SESSION['id'])) {
    $salutation = "&nbspBienvenue " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "";
    //$salutation .= '<br/><a href="deconnexion.php"> Déconnexion</a>';
  } else {
    header('Location: login-employe.php');
    exit;
  }
  ViewEmploye::menu();
  ?>
  <?php
   echo $salutation;

  ?>


  

  <?php
  ViewTemplate::footer();
  ?>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>