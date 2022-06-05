<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Connexion</title>
</head>

<body>

  <?php
  session_start();
  require_once "../view/view-template.php";
  require_once "../view/view-client.php";
  require_once "../model/model-client.php";

  ViewTemplate::menuLogin();

  if (isset($_POST['connexion'])) {
    $client = new ModelClient();
    $userData = $client->connexionClient($_POST['mail']);
    //var_dump($userData);
    var_dump(password_verify($_POST['pass'], $userData['pass']));
    if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
      $_SESSION['id'] = $userData['id'];
      $_SESSION['nom'] = $userData['nom'];
      $_SESSION['prenom'] = $userData['prenom'];

      header('Location: page-client.php');
    } else {

      ViewTemplate::alert("danger", "Identifiants incorects", "login-client");
    }
  } else {
    //francoisgoddefroy62@gmail.com
  ?>

  <?php
    ViewClient::connexionClient();
  }

  ViewTemplate::footer();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>