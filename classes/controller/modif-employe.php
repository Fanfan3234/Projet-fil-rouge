<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Modification d'employes</title>
</head>

<body>
  <?php
  require_once "../view/view-employe.php";
  require_once "../view/view-template.php";
  require_once "../model/model-employe.php";

  ViewEmploye::menuEmploye();

  $employe = new ModelEmploye();
  if (isset($_GET['id'])) {
    if ($employe->voirEmploye($_GET['id'])) {
      ViewEmploye::modifEmploye($_GET['id']);
    } else {
      ViewTemplate::alert("danger", "L'employe  n'existe pas", "profil-employe.php");
    }
  } else {
    $pass  = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    if (isset($_POST['id']) && $employe->voirEmploye($_POST['id'])) {
      if ($employe->modifEmploye($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $pass)) {
        ViewTemplate::alert("success", "Le client a été modifié avec succès", "profil-employe.php");
      } else {
        ViewTemplate::alert("danger", "Echec de la modification", "profil-employe.php");
      }
    } else {
      ViewTemplate::alert("danger", "Aucune donnée n'a été transmise", "profil-employe.php");
    }
  }

  ViewTemplate::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>