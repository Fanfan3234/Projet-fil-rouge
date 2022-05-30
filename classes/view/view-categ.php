<?php
require_once '../model/model-categ.php';

class ViewCateg
{
    public static function listeCateg()
    {
        $categ = new ModelCateg();
        $liste = $categ->listeCateg();
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

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $categ) {
                        ?>
                            <tr>
                                <th scope="row"><?= $categ['id'] ?></th>
                                <td><?= $categ['nom'] ?></td>

                                <td>
                                    <a href="voir-categ.php?id=<?= $categ['id'] ?>" class="btn btn-primary">Voir</a>
                                    <a href="modif-categ.php?id=<?= $categ['id'] ?>" class="btn btn-info">Modifier</a>
                                    <a href="supp-categ.php?id=<?= $categ['id'] ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>
                            <a href="ajout-categ.php" class="btn btn-primary">
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



    public static function voirCateg($id)
    {
        $categ = new ModelCateg();
        $user = $categ->voirCateg($id);

    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $user['id'] . " :  " . $user['nom'] . " "; ?> </h5>





                    <br>
                    <a href="liste-categ.php" class="btn btn-primary">
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
            <div class="contenair-fluid">
                <a class="navbar-brand" href="admin.php">Navbar</a>
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
        </nav>
    <?php

    }

    public static function voirCategadmin($id)
    {
        $marque = new ModelCateg();
        $user = $marque->voirCateg($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " :  " . $user['nom'] . " "; ?> </h5>

                    <p class="card-text">
                        <? ViewProduit::listeProduitadmin($id) ?>
                    </p>

                    <a href="supp-client.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="liste-categadmin.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }
    //action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);">//
    public static function ajoutCateg()
    { ?>
        <form class="col-md-6 offset-md-3" method="post" ?>
            <a href="page-employe.php" class="btn btn-primary">
                Retour</a>
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" required="veuillez compléter ce champ" class="form-control" name="nom" id="nom">
            </div>
            <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function ModifCateg($id)
    {
        $categ = new ModelCateg();
        $user = $categ->voirCateg($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-categ.php">
            <a href="liste-categ.php" class="btn btn-primary">
                Retour</a>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">

            </div>
            <button type="submit" class="btn btn-primary" name="modif-produit" id="modif-produit">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

<?php
    }
}
