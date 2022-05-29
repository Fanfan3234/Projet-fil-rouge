<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Voir produit</title>
</head>

<body>
  <?php
  require_once "../view/view-produit.php";
  require_once "../view/view-template.php";

  //ViewProduit::menuProduit();
  ViewProduit::voirProduit($_GET['id']);
  if (isset($_POST['id'], $_POST['quantite']) && is_numeric($_POST['id']) && is_numeric($_POST['quantite'])) {
    $produit_id = (int)$_POST['id'];
    $quantite = (int)$_POST['quantite'];
    $stmt = $pdo->prepare('SELECT * FROM produit WHERE id = ?');
    $stmt->execute([$_POST['id']]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($produit && $quantite > 0) {
      if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
        if (array_key_exists($produit_id, $_SESSION['panier'])) {
          $_SESSION['panier'][$produit_id] += $quantite;
        } else {
          $_SESSION['panier'][$produit_id] = $quantite;
        }
      } else {
        $_SESSION['panier'] = array($produit_id => $quantite);
      }
    }
    header('location: panier.php?page=panier');
    exit;
  }
  ViewTemplate::footer();


  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>