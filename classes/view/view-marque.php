<?php
require_once '../model/model-marque.php';

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
                                <a href="voir-marque.php?id=<?= $marque['id'] ?>" class="btn btn-primary">Voir</a>


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


    public static function voirMarqueadmin($id)
    {
        $marque = new ModelMarque();
        $user = $marque->voirMarque($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " : " . $user['logo'];  ?> </h5>

                    
                    <a href="modif-marque.php" class="btn btn-info">Modifier</a>
                    <a href="supp-marque.php" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="liste-marqueadmin.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }

    public static function voirMarque($id)
    {
        $marque = new ModelMarque();
        $user = $marque->voirMarque($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " : " . $user['logo'];  ?> </h5>

                   
                    <br>
                    <a href="liste-marque.php" class="btn btn-primary">
                        < Retour</a>
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

    public static function modifMarque($id)
    {
        $marque = new ModelMarque();
        $user = $marque->voirMarque($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-marque.php">
            <a href="liste-marqueadmin.php" class="btn btn-primary">
                Retour</a>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">
                <label for="logo">logo : </label>
                <input type="file" class="form-control" name="logo" id="logo" accept="image/png, image/jpeg">
                
            </div>
            <button type="submit" class="btn btn-primary" name="modif-marque" id="modif-marque">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function ajoutMarque()
    { ?>
        <form class="col-md-6 offset-md-3" method="post" action="ajout-marque.php">
            <a href="liste-marqueadmin.php" class="btn btn-primary">
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
