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
    require_once "../model/model-employe.php";
    require_once "../view/view-template.php";
    require_once "../view/view-employe.php";

    ViewEmploye::menuAdmin();

    // $client = new ModelClient();
    //     if ($client->connexionClient('test@mail.fr')) {
    //       ViewTemplate::alert("danger", "Email déja utilisé", "ajout-client.php");
    //     }


    if (isset($_POST['ajout'])) {
        $employe = new ModelEmploye();
        if ($employe->connexionEmploye($_POST['mail'])) {
            ViewTemplate::alert("danger", "Mail existant", "ajout-client");
        } else {
            $pass  = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            if ($employe->ajoutEmploye($_POST['nom'], $_POST['prenom'], $_POST['mail'], $pass, $_POST['role'])) {
                ViewTemplate::alert("success", "Client ajouté avec succès", "login-employe.php");
            } else {
                ViewTemplate::alert("danger", "Erreur d'ajout", "ajout-employe.php");
            }
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