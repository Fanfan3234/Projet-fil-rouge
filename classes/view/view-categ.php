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
                            <th scope="col">nom</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $categ) {
                        ?>
                            <th scope="row"><?= $categ['id'] ?></th>
                            <td>
                                <?= $categ['nom'] ?>

                                <br />
                                <a href="voir-categ.php?id=<?= $categ['id'] ?>" class="btn btn-primary">Voir</a>


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
                    Aucune categorie n'existe dans la liste.
                </div>
            <?php
            }  ?>
        </div>
    <?php
    }

    public static function listeCategAdmin()
    {
        $categ = new ModelCateg();
        $liste = $categ->listeCateg();
    ?>
        <div class="container">
            <?php
            if (count($liste) > 0) {
            ?>
                <table class="table">
                    <a href="ajout-categ.php" class="btn btn-primary">Ajout</a>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nom</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $categ) {
                        ?>
                            <tr>
                                <th scope="row"><?= $categ['id'] ?></th>
                                <td><?= $categ['nom'] ?>
                                    <br />
                                    <a href="voir-marqueadmin.php?id=<?= $categ['id'] ?>" class="btn btn-primary">Voir</a>



                                </td>

                            </tr>

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
                    Aucune categorie n'existe dans la liste.
                </div>
            <?php
            }  ?>
        </div>
    <?php
    }

    public static function voirCateg($id)
    {
        $marque = new ModelCateg();
        $user = $marque->voirCateg($id);

    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " :  " . $user['nom'] . " ";  ?> </h5>

                    <p class="card-text">
                        <? ViewProduit::listeProduit($id) ?>

                    </p>
                    <br>
                    <a href="liste-categ.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
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
                    <h5 class="card-title"><?= $user['id'] . " :  " . $user['nom'] . " ";  ?> </h5>

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

        <form class="col-md-6 offset-md-3" method="post" action="modif-produit.php">
            <a href="liste-produitadmin.php" class="btn btn-primary">
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
