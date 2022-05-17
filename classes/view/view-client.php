<?php
require_once '../model/model-client.php';

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
                            <th scope="col">Clients</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($liste as $client) {
                        ?>
                            <th scope="row"><?= $client['id'] ?></th>
                                <td><?= $client['nom'] ?>
                                    <?= $client['prenom'] ?>
                                    <?= $client['mail'] ?>
                                    <?= $client['tel'] ?>
                                    <br/>
                                    <?= $client['adresse'] ?>
                                    <br />
                                    <?= $client['ville'] ?>&nbsp<?= $client['code_post'] ?>
                                    <br/>
                                    <a href="voir-client.php?id=<?= $client['id'] ?>" class="btn btn-primary">Voir</a>
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

    

    public static function menu()
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


                </div>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </form>

            </div>
            <!--<li class="nav-item">-->


            </li>
            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="profil-client.php">Profil <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>




            </ul>

        </nav>
    <?php

    }



    public static function connexionClient()
    {
    ?>
        <div class="container mt-5">
            <a href="acceuil.php" class="btn btn-primary">Retour</a>
            <form class="col-md-6 offset-md-3" method="post" action="" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> enctype="multipart/form-data">
                Connexion client
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

    public static function profilClient($id)
    {
        $client = new ModelClient();
        $user = $client->profilClient($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <a href="page-client.php" class="btn btn-primary">
                    Retour</a>
                <div class="card-body">
                    <h5 class="card-title"><?= "#" . $user['id'] . " <br/> " . $user['nom'] . " " . $user['prenom'] . "<br/>" . $user['adresse'] . " <br/> " . $user['ville'] . "  " . $user['code_post'] . " ";  ?> </h5>

                    <p class="card-text">
                        Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>
                        Tel : <a href="tel:<?= $user['tel'] ?>" target="_blank"><?= $user['tel'] ?></a>
                    </p>
                    <a href="modif-client.php?id=<?= $user['id'] ?>" class="btn btn-info">Modifier</a>
                    <a href="supp-client.php?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="page-client.php" class="btn btn-primary">
                        < Retour</a>
                </div>
            </div>
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
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " " . $user['prenom'] . $user['adresse'] . " " . $user['ville'] . " " . $user['code_post'] . " ";  ?> </h5>

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
        <form class="col-md-6 offset-md-3" method="post" ?>
            <a href="acceuil.php" class="btn btn-primary">
                Retour</a>
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
                <label for="tel">téléphone : </label>
                <input type="tel" required="veuillez compléter ce champ" class="form-control" name="tel" id="tel">
            </div>
            <div class="form-group">
                <label for="adresse">adresse : </label>
                <input type="adresse" required="veuillez compléter ce champ" class="form-control" name="adresse" id="adresse">
                <label for="ville">ville : </label>
                <input type="ville" required="veuillez compléter ce champ" class="form-control" name="ville" id="ville">
                <label for="code_post">code postal : </label>
                <input type="code_post" required="veuillez compléter ce champ" class="form-control" name="code_post" id="code_post">
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
            <a href="profil-client.php" class="btn btn-primary">
                Retour</a>
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
            <div class="form-group">

                <input type="hidden" class="form-control" name="token" id="token" value="<?= $user['token'] ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="modif-client" id="modif-client">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function modifClientEmploye($id)
    {
        $client = new ModelClient();
        $user = $client->voirClient($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-client.php">
            <a href="liste-client.php" class="btn btn-primary">
                Retour</a>
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
            <div class="form-group">

                <input type="hidden" class="form-control" name="token" id="token" value="<?= $user['token'] ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="modif-client" id="modif-client">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

    <?php
    }

    public static function modifClientAdmin($id)
    {
        $client = new ModelClient();
        $user = $client->voirClient($id);
    ?>

        <form class="col-md-6 offset-md-3" method="post" action="modif-client.php">
            <a href="liste-client2.php" class="btn btn-primary">
                Retour</a>
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
            <div class="form-group">

                <input type="hidden" class="form-control" name="token" id="token" value="<?= $user['token'] ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="modif-client" id="modif-client">Modifier</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>

<?php
    }
}
