<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Ajout de contact</title>
</head>

<body>
  <?php
  require_once "../view/view-employe.php";
  require_once "../view/view-template.php";
  require_once "../model/model-employe.php";

  ViewTemplate::menu();
 
  if (isset($_POST['ajout'])) {
    $employe = new ModelEmploye();
    if($employe->ajoutEmploye($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['pass'], $_POST['role'])){
      ViewTemplate::alert("success","Employe ajouté avec succès", "liste-employe.php");
    }
    else {
      ViewTemplate::alert("danger", "Erreur d'ajout", "ajout-employe.php");
    }
  } else {
    ViewEmploye::ajoutEmploye();
  }

  ViewTemplate::footer();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>