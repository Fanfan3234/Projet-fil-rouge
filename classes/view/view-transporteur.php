<?php
require_once '../model/model-transporteur.php';

class ViewTransporteur
{


    public static function listeTransporteur()
    {
        $transporteur = new ModelTransporteur();
        $liste = $transporteur->listeTransporteur();
?>
        <div class="container">
            <?php
            if (count($liste) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nom</th>
                            <th scope="col">logo</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $transporteur) {
                        ?>
                            <tr>
                                <th scope="row"><?= $transporteur['id'] ?></th>
                                <td><?= $transporteur['nom'] ?></td>
                                <td><?= $transporteur['logo'] ?></td>
                                <td>

                                    <a href="voir-transporteur.php?id=<?= $transporteur['id'] ?>" class="btn btn-primary">Voir</a>
                                    <a href="modif-transporteur.php?id=<?= $transporteur['id'] ?>" class="btn btn-info">Modifier</a>
                                    <a href="supp-transporteur.php?id=<?= $transporteur['id'] ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>



                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="admin.php" class="btn btn-primary">
                        < Retour</a>

                            <a href="ajout-transporteur.php" class="btn btn-primary">
                                Ajout</a>
                </table>
            <?php
            } else {
            ?>
                <a href="admin.php" class="btn btn-primary">
                    < Retour</a>
                        <a href="ajout-transporteur.php" class="btn btn-primary">
                            Ajout</a>
                        <br />
                        <div class="alert alert-danger" role="alert">
                            Aucun contact n'existe dans la liste.
                        </div>
                    <?php
                }  ?>
        </div>
    <?php
    }




    public static function voirTransporteur($id)
    {
        $transporteur = new ModelTransporteur();
        $user = $transporteur->voirTransporteur($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nom'] . " ";  ?> </h5>

                    <p class="card-text">
                        <?= $user['logo'] . " "; ?>

                    </p>
                    <br>
                    <a href="liste-transporteur.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function menuTransporteur()
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




    public static function modifTransporteur($id)
    {
        $transporteur = new ModelTransporteur();
        $user = $transporteur->voirTransporteur($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-transporteur.php">
            <a href="liste-produitadmin.php" class="btn btn-primary">
                Retour</a>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">
                <label for="logo">Logo : </label>
                <input type="file" class="form-control" name="logo" id="logo" accept="image/png, image/jpeg">
            </div>
            <button type="submit" class="btn btn-primary" name="modif" id="modif">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function ajoutTransporteur()
    { ?>
        <form class="col-md-6 offset-md-3" method="post" action="ajout-transporteur.php">
            <a href="liste-transporteur.php" class="btn btn-primary">
                Retour
            </a>

            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">
                <label for="logo">logo : </label>
                <input type="file" class="form-control" name="logo" id="logo" accept="image/png, image/jpeg">

            </div>
            <button type="submit" class="btn btn-primary" name="ajout" id="ajout">ajout</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>
<?php
    }
}
