<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Suppression de produit</title>
</head>

<body>
  <?php
  
  require_once "../view/view-template.php";
  require_once "../model/model-produit.php";

  ViewTemplate::menu();

  if(isset($_GET['id'])) {
    $produit = new ModelProduit();
    if($produit->voirProduit($_GET['id'])) {
      if($produit->suppProduit($_GET['id'])){
        ViewTemplate::alert("success", "Produit supprimé avec succès", "liste-produit.php");
      }
      else{
        ViewTemplate::alert("danger", "Echec de la suppression", "liste-produit.php");
      }
    }
    else {
      ViewTemplate::alert("danger", "Contact n'existe pas", "liste-produit.php");
    }
  }
  else {
    ViewTemplate::alert("danger", "Aucune donnée n'a été transmise", "liste-produit.php");
  }

  ViewTemplate::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>