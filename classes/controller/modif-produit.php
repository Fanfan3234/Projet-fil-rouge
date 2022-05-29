<?php
require_once "../view/view-produit.php";
require_once "../view/view-template.php";
require_once "../model/model-produit.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Modification de produit</title>
</head>

<body>
  <?php

  ViewProduit::menuProduit();



  $produit = new ModelProduit();

  if (isset($_GET['id'])) {
    if ($produit->voirProduit($_GET['id'])) {
      ViewProduit::modifProduit($_GET['id']);
    } else {
      ViewTemplate::alert("danger", "Le produit n'existe pas", "liste-produitadmin.php");
    }
  } else {

    if (isset($_POST['id']) && $produit->voirProduit($_POST['id'])) {
      if ($produit->modifProduit($_POST['id'], $_POST['nom'], $_POST['ref'], $_POST['description'], $_POST['quantite'], $_POST['prix'], $_POST['photo'], $_POST['id_categorie'], $_POST['id_marque'])) {
        ViewTemplate::alert("success", "Le produit a été modifié avec succès", "liste-produitadmin.php");
      } else {
        ViewTemplate::alert("danger", "Echec de la modification", "liste-produitadmin.php");
      }
    } else {

      ViewTemplate::alert("danger", "Aucune donnée n'a été transmise", "liste-produitadmin.php");
    }
  }

  ViewTemplate::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>