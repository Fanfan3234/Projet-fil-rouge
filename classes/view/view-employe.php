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
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>
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

    public static function listeEmploye2()
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
                            <th scope="col">Employes</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $employe) {
                        ?>
                            <tr>
                                <th scope="row"><?= $employe['id'] ?></th>
                                <td>
                                    <?= $employe['nom'] ?>
                                    <br />
                                    <?= $employe['prenom'] ?>
                                    <br />
                                    <?= $employe['mail'] ?>
                                    <br />
                                    <a href="voir-employeadmin.php?id=<?= $employe['id'] ?>" class="btn btn-primary">Voir</a>


                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>
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

    public static function voirEmploye2($id)
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
                    <a href="modif-employeadmin.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                    <a href="supp-employe.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="liste-employe2.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }


    public static function profilEmploye($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->profilEmploye($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= "#" . $user['id'] . " <br/> " . $user['nom'] . " " . $user['prenom'] . "<br/>" . $user['mail'] . " <br/> ";  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>

                    </p>
                    <a href="modif-employe.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                    <a href="supp-employe.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="page-employe.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function profilAdmin($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->profilEmploye($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= "#" . $user['id'] . " <br/> " . $user['nom'] . " " . $user['prenom'] . "<br/>" . $user['mail'] . " <br/> ";  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>

                    </p>
                    <a href="modif-employe.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                    <a href="supp-employe.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function menuAdmin()
    {


    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="contenair">
                <a class="navbar-brand" href="page-client.php">Navbar</a>
            </div>
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-client2.php">liste clients <span class="sr-only">(current)</span></a>

                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="liste-employe2.php">liste employes<span class="sr-only">(current)</span></a>

                        </li>
                    </ul>



                </div>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </form>


            </div>


            </div>
            <!--<li class="nav-item">-->


            </li>
            <div class="nav-item active">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link" href="profil-admin.php">Profil <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>




                </ul>
            </div>
        </nav>
    <?php

    }

    public static function menu3()
    {


    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="contenair">
                <a class="navbar-brand" href="page-client.php">Navbar</a>
            </div>
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <!--<a class="nav-link" href="liste-client.php">liste clients <span class="sr-only">(current)</span></a>

                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="liste-employe.php">liste employes<span class="sr-only">(current)</span></a>-->

                        </li>
                    </ul>



                </div>
                <form class="form-inline my-2 my-lg-0">
                    <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->

                </form>


            </div>


            </div>
            <!--<li class="nav-item">-->


            </li>
            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="profil-employe.php">Profil <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>




            </ul>

        </nav>
    <?php

    }
    public static function menu4()
    {


    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="contenair">
                <a class="navbar-brand" href="page-client.php">Navbar</a>
            </div>
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="ajout-client.php">Inscription clients <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ajout-employe.php">Inscription employes <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <!--<a class="nav-link" href="liste-client.php">liste clients <span class="sr-only">(current)</span></a>

                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="liste-employe.php">liste employes<span class="sr-only">(current)</span></a>-->

                        </li>
                    </ul>



                </div>
                <form class="form-inline my-2 my-lg-0">
                    <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->

                </form>


            </div>


            </div>
            <!--<li class="nav-item">-->


            </li>
            <ul class="navbar-nav mr-auto">
                <!--<a class="nav-link" href="profil-admin.php">Profil <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>-->




            </ul>

        </nav>
    <?php

    }

    public static function menu()
    {

    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="contenair-fluid">
                <a class="navbar-brand" href="page-employe.php">Navbar</a>
            </div>
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-client.php">liste clients <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">

                        </li>
                    </ul>



                </div>
            </div>
            <form class="form-inline my-2 my-lg-0">

                <a class="nav-link" href="profil-employe.php">Profil<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>
            </form>
        </nav>
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
            <a href="acceuil.php" class="btn btn-primary">
                < Retour</a>



                    <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <br />
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
                            <label for="pass">Mot de passe : </label>
                            <input type="password" required="veuillez compléter ce champ" class="form-control" name="pass" id="pass">

                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="role" id="role" value="2">
                        </div>


                        <button type="submit" class="btn btn-primary" name="ajout" id="ajout"> Ajouter </button>

                        <button type="reset" class="btn btn-danger"> Réinitialiser </button>
                    </form>
        </body>

        </html>

    <?php
    }

    public static function connexionEmploye()
    {
    ?>
        <div class="container mt-5">
            <a href="acceuil.php" class="btn btn-primary">
                < Retour</a>

                    <form class="col-md-6 offset-md-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                        <br />
                        Connexion employés
                        <br />
                        <div class="form-group">
                            <label for="mail">Mail : </label>
                            <input type="email" required="veuillez compléter ce champ" class="form-control" name="mail" id="mail">
                        </div>
                        <div class="form-group">
                            <label for="pass">Mot de passe : </label>
                            <input type="password" required="veuillez compléter ce champ" class="form-control" name="pass" id="pass">
                        </div>
                        <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
                        <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
                    </form>
        </div>
    <?php
    }

    public static function modifEmploye($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->voirEmploye($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-employe.php">
            <a href="profil-employe.php" class="btn btn-primary">Retour</a>
            <br />
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">

                <label for="nom"> Nom:
                    <input type="text" class="form-control" name="nom" id="nom" value="<?= $user['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="prenom"> Prenom: </label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">
            </div>
            <div class="form-group">
                <label for="mail"> Adresse mail: </label>
                <input type="email" class="form-control" name="mail" id="mail" value="<?= $user['mail'] ?>">
            </div>
            <div class="form-group">
                <label for="pass"> Mot de passe: </label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>

            <button type="submit" class="btn btn-primary" name="modif" id="modif"> Modifier </button>
            <button type="reset" class="btn btn-danger"> Réinitialiser </button>
        </form>
    <?php
    }

    public static function modifEmployeAdmin($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->voirEmploye($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-employe.php">
            <a href="liste-employe.php" class="btn btn-primary">Retour</a>
            <br />
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">

                <label for="nom"> Nom:
                    <input type="text" class="form-control" name="nom" id="nom" value="<?= $user['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="prenom"> Prenom: </label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">
            </div>
            <div class="form-group">
                <label for="mail"> Adresse mail: </label>
                <input type="email" class="form-control" name="mail" id="mail" value="<?= $user['mail'] ?>">
            </div>
            <div class="form-group">
                <label for="pass"> Mot de passe: </label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>

            <button type="submit" class="btn btn-primary" name="modif" id="modif"> Modifier </button>
            <button type="reset" class="btn btn-danger"> Réinitialiser </button>
        </form>
    <?php
    }

    public static function modifAdmin($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->voirEmploye($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-employe.php">
            <a href="profil-admin.php" class="btn btn-primary">Retour</a>
            <br />
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">

                <label for="nom"> Nom:
                    <input type="text" class="form-control" name="nom" id="nom" value="<?= $user['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="prenom"> Prenom: </label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">
            </div>
            <div class="form-group">
                <label for="mail"> Adresse mail: </label>
                <input type="email" class="form-control" name="mail" id="mail" value="<?= $user['mail'] ?>">
            </div>
            <div class="form-group">
                <label for="pass"> Mot de passe: </label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>

            <button type="submit" class="btn btn-primary" name="modif" id="modif"> Modifier </button>
            <button type="reset" class="btn btn-danger"> Réinitialiser </button>
        </form>
<?php
    }
}
