<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Ajout d'employe</title>
</head>
<body>


    <?php
require_once "../model/model-produit.php";
require_once "../view/view-template.php";
require_once "../view/view-produit.php";

ViewProduit::menuProduit();
ViewProduit::ajoutProduit();
// $client = new ModelClient();
//     if ($client->connexionClient('test@mail.fr')) {
//       ViewTemplate::alert("danger", "Email déja utilisé", "ajout-client.php");
//     }

if (isset($_POST['ajout'])) {
    $produit = new ModelProduit();
    if ($produit->ajoutProduit($_POST['nom'], $_POST['ref'], $_POST['description'], $_POST['quantite'], $_POST['prix'], $_POST['photo'], $_POST['id_categorie'], $_POST['id_marque'])) {
        ViewTemplate::alert("success", "Client ajouté avec succès", "liste-produit.php");
    } else {
        ViewTemplate::alert("danger", "Erreur d'ajout", "ajout-produit.php");
    }
}

ViewTemplate::footer();
?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>