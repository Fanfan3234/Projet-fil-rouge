<?php
require_once '../model/model-produit.php';

class ViewProduit
{


    public static function listeProduit()
    {
        $produit = new ModelProduit();
        $liste = $produit->listeProduit();
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
                        foreach ($liste as $produit) {
                        ?>
                            <th scope="row"><?= $produit['id'] ?></th>
                            <td><?= $produit['logo'] ?>
                                <?= $produit['nom'] ?>

                                <br />
                                <a href="voir-produit.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Voir</a>


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
            }  ?>
        </div>
    <?php
    }


    public static function voirProduitadmin($id)
    {
        $produit = new ModelProduit();
        $user = $produit->voirProduit($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nom'] . " : " . $user['ref'] . " : " . $user['description']." : " . $user['quantité']." : " . $user['prix']." : " . $user['photo'];  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>

                    </p>
                    <a href="modif-produit.php" class="btn btn-info">Modifier</a>
                    <a href="supp-produit.php" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="liste-produitadmin.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function voirProduit($id)
    {
        $produit = new ModelProduit();
        $user = $produit->voirProduit($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nom'] . " : " . $user['ref'] . " : " . $user['description']." : " . $user['quantité']." : " . $user['prix']." : " . $user['photo'];  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>

                    </p>
                    <br>
                    <a href="liste-produit.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function listeProduitadmin()
    {
        $produit = new ModelProduit();
        $liste = $produit->listeProduit();
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
                        foreach ($liste as $produit) {
                        ?>
                            <th scope="row"><?= $produit['id'] ?></th>
                            <td><?= $produit['logo'] ?>
                                <?= $produit['nom'] ?>

                                <br />
                                <a href="voir-produitadmin.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Voir</a>
                                <a href="modif-produit.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Modifier</a>
                                <a href="supp-produit.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Supprimer</a>
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
            }  ?>
        </div>
    <?php
    }

    public static function modifProduit($id)
    {
        $marque = new ModelProduit();
        $user = $marque->voirProduit($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-produit.php">
            <a href="liste-produitadmin.php" class="btn btn-primary">
                Retour</a>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
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
            <button type="submit" class="btn btn-primary" name="modif-produit" id="modif-produit">Modifier</button>
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
