<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Suppression de commande</title>
</head>

<body>
  <?php
  require_once "../view/view-employe.php";
  require_once "../view/view-template.php";
  require_once "../view/view-commande.php";
  require_once "../model/model-commande.php";

  ViewTemplate::menuSupp();

  if(isset($_GET['id'])) {
    $commande = new ModelCommande();
    if($commande->voirCommande($_GET['id'])) {
      if($commande->suppCommande($_GET['id'])){
        ViewTemplate::alert("success", "Commande supprimée avec succès", "liste-commandeadmin.php");
      }
      else{
        ViewTemplate::alert("danger", "Echec de la suppression", "liste-commandeadmin.php");
      }
    }
    else {
      ViewTemplate::alert("danger", "La commande n'existe pas", "liste-commandeadmin.php");
    }
  }
  else {
    ViewTemplate::alert("danger", "Aucune donnée n'a été transmise", "liste-commandeadmin.php");
  }

  ViewTemplate::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>