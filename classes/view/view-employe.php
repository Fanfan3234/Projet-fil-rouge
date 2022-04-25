<?php
require_once '../model/model-employe.php';

class ViewEmploye
{
    public static function listeEmploye()
    {
        $employe = new ModelEmploye();
        $liste = $employe->listeEmploye();
?>
        <div class="container">
            <?php
            if (count($liste) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $employe) {
                        ?>
                            <tr>
                                <th scope="row"><?= $employe['id'] ?></th>
                                <td><?= $employe['nom'] ?></td>
                                <td><?= $employe['prenom'] ?></td>
                                <td><?= $employe['mail'] ?></td>
                                <td>
                                    <a href="voir-employe.php?id=<?= $employe['id'] ?>" class="btn btn-primary">Voir</a>
                                    <a href="modif-employe.php?id=<?= $employe['id'] ?>" class="btn btn-info">Modifier</a>
                                    <a href="supp-employe.php?id=<?= $employe['id'] ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Aucun contact n'existe dans la liste.
                </div>
            <?php
            }  ?>
        </div>
    <?php
    }

    public static function voirEmploye($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->voirEmploye($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " : " . $user['prenom'];  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>

                    </p>
                    <a href="modif-employe.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                    <a href="supp-employe.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="liste-employe.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function ajoutEmploye()
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ajout employe</title>
        </head>

        <body>
            <style>
                #role {
                    visibility: hidden;
                }
            </style>

            <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="nom">Nom : </label>
                    <input type="text" required="veuillez compléter ce champ" class="form-control" name="nom" id="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom : </label>
                    <input type="text" required="veuillez compléter ce champ" class="form-control" name="prenom" id="prenom">
                </div>
                <div class="form-group">
                    <label for="mail">Adresse mail : </label>
                    <input type="email" required="veuillez compléter ce champ" class="form-control" name="mail" id="mail">
                </div>
                <div class="form-group">
                    <label for="pass" >Mot de passe : </label>
                    <input type="pass" required="veuillez compléter ce champ" class="form-control" name="pass" id="pass">

                </div>
                <div class="form-group">
                    <label for="role" id="role">role : </label>
                    <input type="role" class="form-control" name="role" id="role">
                </div>
                <script>
                    var myvalue = "2";
                    document.getElementById('role').setAttribute('value', myvalue);
                </script>



                <button type="submit" class="btn btn-primary" name="ajout" id="ajout"> Ajouter </button>
                <button type="reset" class="btn btn-danger"> Réinitialiser </button>
            </form>
        </body>

        </html>

    <?php
    }

    public static function modifEmploye($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->voirEmploye($id);
    ?>

        < form class="col-md-6 offset-md-3" method="post" action="modif-employe.php">
            < input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
                < div class="form-group">
                    < label for="nom"> Nom: < /label>
                            < input type="text" class="form-control" name="nom" id="nom" value="<?= $user['nom'] ?>">
                                < /div>
                                    < div class="form-group">
                                        < label for="prenom"> Prenom: < /label>
                                                < input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">
                                                    < /div>
                                                        < div class="form-group">
                                                            < label for="mail"> Adresse mail: < /label>
                                                                    < input type="email" class="form-control" name="mail" id="mail" value="<?= $user['mail'] ?>">
                                                                        < /div>
                                                                            < div class="form-group">
                                                                                < label for="pass"> Mot de passe: < /label>
                                                                                        < input type="password" class="form-control" name="pass" id="pass">
                                                                                            < /div>

                                                                                                < button type="submit" class="btn btn-primary" name="modif" id="modif"> Modifier < /button>
                                                                                                        < button type="reset" class="btn btn-danger"> Réinitialiser < /button>
                                                                                                                < /form>
                                                                                                            <?php
                                                                                                        }
                                                                                                    }
