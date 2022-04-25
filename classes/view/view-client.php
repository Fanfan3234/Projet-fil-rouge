<?php
//require_once '../model/model-client.php';

class ViewClient
{
    public static function listeClient()
    {
        $client = new ModelClient();
        $liste = $client->listeClient();
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
                            <th scope="col">Tel</th>
                            <th scope="col">adresse</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $client) {
                        ?>
                            <tr>
                                <th scope="row"><?= $client['id'] ?></th>
                                <td><?= $client['nom'] ?></td>
                                <td><?= $client['prenom'] ?></td>
                                <td><?= $client['mail'] ?></td>
                                <td><?= $client['tel'] ?></td>
                                <td><?= $client['adresse'] ?><br/><?= $client['ville'] ?>&nbsp<?= $client['code_post'] ?></td>
                                <td>
                                    <a href="voir-client.php?id=<?= $client['id'] ?>" class="btn btn-primary">Voir</a>
                                    <a href="modif-client.php?id=<?= $client['id'] ?>" class="btn btn-info">Modifier</a>
                                    <a href="supp-client.php?id=<?= $client['id'] ?>" class="btn btn-danger">Supprimer</a>
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

    public static function voirClient($id)
    {
        $client = new ModelClient();
        $user = $client->voirClient($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " " . $user['prenom'] . $user['adresse'] . " " . $user['ville'] . " " . $user['codepost'] . " ";  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>
                        Tel : <a href="tel:<?= $user['tel'] ?>" target="_blank"><?= $user['tel'] ?></a>
                    </p>
                    <a href="modif-client.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                    <a href="supp-client.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="liste-client.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
        </div>
    <?php
    }
//action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);">//
    public static function ajoutClient()
    { ?>
        <form class="col-md-6 offset-md-3" method="post"  ?>
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom : </label>
                <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
            <div class="form-group">
                <label for="mail">Adresse mail : </label>
                <input type="email" class="form-control" name="mail" id="mail">
            </div>
            <div class="form-group">
                <label for="pass">Mot de passe : </label>
                <input type="password" class="form-control" name="pass" id="pass">
                
            </div>
            <div class="form-group">
                <label for="tel">téléphone : </label>
                <input type="tel" class="form-control" name="tel" id="tel">
            </div>
            <div class="form-group">
                <label for="adresse">adresse : </label>
                <input type="adresse" class="form-control" name="adresse" id="adresse">
                <label for="ville">ville : </label>
                <input type="ville" class="form-control" name="ville" id="ville">
                <label for="code_post">code postal : </label>
                <input type="code_post" class="form-control" name="code_post" id="code_post">
            </div>
            

            <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function modifClient($id)
    {
        $client = new ModelClient();
        $user = $client->voirClient($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-client.php">
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= $user['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom : </label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">
            </div>
            <div class="form-group">
                <label for="mail">Adresse mail : </label>
                <input type="email" class="form-control" name="mail" id="mail" value="<?= $user['mail'] ?>">
            </div>
            <div class="form-group">
                <label for="pass">Mot de passe : </label>
                <input type="password" class="form-control" name="pass" id="pass">

            </div>
            <div class="form-group">
                <label for="tel">téléphone : </label>
                <input type="tel" class="form-control" name="tel" id="tel" value="<?= $user['tel'] ?>">
            </div>
            <div class="form-group">
                <label for="adresse">adresse : </label>
                <input type="adresse" class="form-control" name="adresse" id="adresse">
                <label for="ville">ville : </label>
                <input type="ville" class="form-control" name="ville" id="ville">
                <label for="code_post">code postal : </label>
                <input type="code_post" class="form-control" name="code_post" id="code_post">
            </div>
            

            <button type="submit" class="btn btn-primary" name="modif-client" id="modif-client">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>
<?php
    }
}
