<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Modification de commande</title>
</head>

<body>
  <?php
require_once "../view/view-employe.php";
require_once "../view/view-commande.php";
require_once "../view/view-template.php";
require_once "../model/model-commande.php";

ViewCommande::menuCommande();

$commande = new ModelCommande();
if (isset($_GET['id'])) {
    if ($commande->voirCommande($_GET['id'])) {
        ViewCommande::modifCommande($_GET['id']);
    } else {
        ViewTemplate::alert("danger", "La commande n'existe pas", "liste-commandeadmin.php");
    }
    if ($commande->modifCommande($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $pass)) {
        ViewTemplate::alert("success", "La commande a été modifiée avec succès", "liste-commandeadmin.php");
    } else {
        ViewTemplate::alert("danger", "Echec de la modification", "liste-commandeadmin.php");
    }
} else {
    ViewTemplate::alert("danger", "Aucune donnée n'a été transmise", "liste-commandeadmin.php");
}

ViewTemplate::footer();
?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>