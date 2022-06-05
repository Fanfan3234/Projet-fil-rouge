<?php
require_once '../model/model-marque.php';
require_once '../model/model-produit.php';

class ViewMarque
{

    public static function listeMarque()
    {
        $marque = new ModelMarque();
        $liste = $marque->listeMarque();
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
                            <th scope="col">Logo</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $marque) {
                        ?>
                            <tr>
                                <th scope="row"><?= $marque['id'] ?></th>
                                <td><?= $marque['nom'] ?></td>
                                <td><img class="fit-picture" src="images/<?= $marque['logo'] ?>" alt="logo marque"></td>
                                <td>
                                    <a href="voir-marque.php?id=<?= $marque['id'] ?>" class="btn btn-primary">Voir</a>
                                    <a href="modif-marque.php?id=<?= $marque['id'] ?>" class="btn btn-info">Modifier</a>
                                    <a href="supp-marque.php?id=<?= $marque['id'] ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>
                            <a href="ajout-marque.php" class="btn btn-primary">
                                Ajout</a>
                </table>
            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Aucun contact n'existe dans la liste.
                </div>
            <?php
            } ?>
        </div>
    <?php
    }

    public static function voirMarque($id)
    {
        $client = new ModelMarque();
        $user = $client->voirMarque($id);


    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="liste-marque.php" class="btn btn-primary">
                        < Retour</a>

                            <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " <br/>"; ?></h5>
                            <img src="images/<?= $user['logo'] ?>" alt="logo marque">


                            <br />
                            <a href="modif-marque.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                            <a href="supp-marque.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>

                </div>
            </div>
        </div>
    <?php
    }

    public static function listeMarqueadmin()
    {
        $marque = new ModelMarque();
        $liste = $marque->listeMarque();
    ?>
        <div class="container">
            <?php
            if (count($liste) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">logo</th>
                            <th scope="col">nom</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $marque) {
                        ?>
                            <th scope="row"><?= $marque['id'] ?></th>
                            <td><?= $marque['logo'] ?>
                                <?= $marque['nom'] ?>

                                <br />
                                <a href="voir-marqueadmin.php?id=<?= $marque['id'] ?>" class="btn btn-primary">Voir</a>


                            </td>

                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>
                            <a href="ajout-marque.php" class="btn btn-primary">
                                Ajout</a>
                </table>
            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Aucun contact n'existe dans la liste.
                </div>
            <?php
            } ?>
        </div>
    <?php
    }

    public static function menuMarque()
    {

    ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="contenair-fluid">
                <a class="navbar-brand" href="admin.php">Admin</a>
            </div>

            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="liste-produitadmin.php">Produits <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="liste-client.php">Clients<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-employe.php">Employes <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-marque.php">Marques <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-categ.php">Categories <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-transporteur.php">Transporteurs <span class="sr-only"></span></a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php">Espace admin <span class="sr-only"></span></a>
                        </li>
                    </ul>



                </div>
            </div>
            <form class="form-inline my-2 my-lg-0">

                <a class="nav-link" href="profil-employe.php">Profil<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>
            </form>



            </div>

            </div>

        </nav>
    <?php

    }

    public static function modifMarque($id)
    {
        $marque = new ModelMarque();
        $user = $marque->voirMarque($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-marque.php">
            <a href="liste-marque.php" class="btn btn-primary">Retour</a>
            <br />
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">

                <label for="nom"> Nom:
                    <input type="text" class="form-control" name="nom" id="nom" value="<?= $user['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="logo"> logo: </label>
                <input type="file" class="form-control" name="logo" id="logo" value="<?= $user['logo'] ?>">
            </div>


            <button type="submit" class="btn btn-primary" name="modif" id="modif"> Modifier </button>
            <button type="reset" class="btn btn-danger"> Réinitialiser </button>
        </form>
    <?php
    }

    public static function ajoutMarque()
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ajout marque</title>
        </head>

        <body>




            <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <a href="liste-marque.php" class="btn btn-primary">
                    < Retour</a>
                        <br />
                        <div class="form-group">
                            <label for="nom">Nom : </label>
                            <input type="text" required="veuillez compléter ce champ" class="form-control" name="nom" id="nom">
                        </div>
                        <div class="form-group">
                            <label for="logo">logo : </label>
                            <input type="file" required="veuillez compléter ce champ" class="form-control" name="logo" id="logo">
                        </div>



                        <button type="submit" class="btn btn-primary" name="ajout" id="ajout"> Ajouter </button>

                        <button type="reset" class="btn btn-danger"> Réinitialiser </button>
            </form>
        </body>

        </html>

<?php
    }
}
