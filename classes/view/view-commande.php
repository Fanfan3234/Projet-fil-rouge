<?php
require_once '../model/model-commande.php';

class ViewCommande
{

    public static function listeCommande($id_client)
    {
        $commande = new ModelCommande();
        $liste = $commande->listeCommande($id_client);
?>
        <div class="container">
            <?php
            if (count($liste) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">date</th>
                            <th scope="col">etat</th>
                            <th scope="col">mode</th>
                            <th scope="col">id_client</th>
                            <th scope="col">id_transporteur</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $commande) {
                        ?>
                            <th scope="row"><?= $commande['id'] ?></th>
                            <td><?= $commande['date'] ?>
                                <?= $commande['etat'] ?>
                                <?= $commande['mode'] ?>
                                <?= $commande['id_client'] ?>
                                <?= $commande['id_transporteur'] ?>

                                <br />
                                <a href="voir-commande.php?id=<?= $commande['id'] ?>" class="btn btn-primary">Voir</a>


                            </td>

                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="page-client.php" class="btn btn-primary">
                        < Retour</a>
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

    public static function menuCommande()
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
                        <li class="nav-item active">
                            <a class="nav-link" href="liste-produit.php">Produits <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.php">Contact <span class="sr-only"></span></a>
                        </li>

                    </ul>



                </div>
            </div>
            <form class="form-inline my-2 my-lg-0">

                <a class="nav-link" href="profil-client.php">Profil<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>
            </form>
        </nav>
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

    public static function voirCommandeadmin($id)
    {
        $commande = new ModelCommande();
        $user = $commande->voirCommande($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['date'] . " : "; ?> </h5>

                    <p class="card-text">
                        <?= $user['etat'] . " " . $user['mode'] . " " . $user['id_client'] . " " . $user['id_transporteur'] . " "; ?></a><br>

                    </p>
                    <br>
                    <a href="liste-commande.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function voirCommande($id)
    {
        $commande = new ModelCommande();
        $user = $commande->voirCommande($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['date'] . " : "; ?> </h5>

                    <p class="card-text">
                        <?= $user['etat'] . " " . $user['mode'] . " " . $user['id_client'] . " " . $user['id_transporteur'] . " "; ?></a><br>

                    </p>
                    <br>
                    <a href="liste-commande.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function listeCommandeadmin($id_client)
    {
        $commande = new ModelCommande();
        $liste = $commande->listeCommande($id_client);
    ?>
        <div class="container">
            <?php
            if (count($liste) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">date</th>
                            <th scope="col">etat</th>
                            <th scope="col">mode</th>
                            <th scope="col">id_client</th>
                            <th scope="col">id_transporteur</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $commande) {
                        ?>
                            <th scope="row"><?= $commande['id'] ?></th>
                            <td><?= $commande['date'] ?>
                                <?= $commande['etat'] ?>
                                <?= $commande['mode'] ?>
                                <?= $commande['id_client'] ?>
                                <?= $commande['id_transporteur'] ?>
                                <br />
                                <a href="voir-commandeadmin.php?id=<?= $commande['id'] ?>" class="btn btn-primary">Voir</a>
                                <a href="modif-commande.php?id=<?= $commande['id'] ?>" class="btn btn-primary">Modifier</a>
                                <a href="supp-commande.php?id=<?= $commande['id'] ?>" class="btn btn-primary">Supprimer</a>
                            </td>

                        <?php
                        }
                        ?>
                    </tbody>
                    <a href="page-employe.php" class="btn btn-primary">
                        < Retour</a>
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

    public static function modifCommande($id)
    {
        $commande = new ModelCommande();
        $user = $commande->voirCommande($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-produit.php">
            <a href="liste-produitadmin.php" class="btn btn-primary">
                Retour</a>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label for="etat">Etat: </label>
                <input type="text" class="form-control" name="etat" id="etat">
                <label for="date">date : </label>
                <input type="text" class="form-control" name="date" id="date">
                <label for="mode">mode : </label>
                <input type="text" class="form-control" name="mode" id="mode">
                <label for="id_client">quantite : </label>
                <input type="number" class="form-control" name="id_client" id="id_client">
                <label for="id_transporteur">prix : </label>
                <input type="price" class="form-control" name="id_transporteur" id="id_transporteur">
            </div>
            <button type="submit" class="btn btn-primary" name="modif" id="modif">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function ajoutProduit()
    { ?>
        <form class="col-md-6 offset-md-3" method="post" action="ajout-produit.php">
            <a href="liste-produitadmin.php" class="btn btn-primary">
                Retour
            </a>

            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">
                <label for="ref">ref : </label>
                <input type="text" class="form-control" name="ref" id="ref">
                <label for="description">description : </label>
                <input type="text" class="form-control" name="description" id="description">
                <label for="quantite">quantite : </label>
                <input type="number" class="form-control" name="quantite" id="quantite">
                <label for="prix">prix : </label>
                <input type="price" class="form-control" name="prix" id="prix">
                <label for="photo">photo du produit : </label>
                <input type="file" class="form-control" name="photo" id="photo" accept="image/png, image/jpeg">
                <label for="id_categorie">Choisissez la categorie du produit:</label>

                <select name="id_categorie" id="id_categorie">
                    <option value="">categorie produit</option>
                    <option value="1">pantalons</option>
                    <option value="2">t-shirt</option>
                    <option value="3">sous-vetements</option>
                    <option value="4">sweats a capuche</option>
                    <option value="5">accessoires</option>
                    <option value="6">chaussures</option>
                </select>
                <label for="id_marque">Choisissez la marque du produit:</label>

                <select name="id_marque" id="id_marque">
                    <option value="">marque produit</option>
                    <option value="1">adidas</option>
                    <option value="2">nike</option>
                    <option value="3">fila</option>
                    <option value="4">supreme</option>
                    <option value="5">Bape</option>
                    <option value="6">Vans</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="ajout" id="ajout">ajout</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>
<?php
    }
}
