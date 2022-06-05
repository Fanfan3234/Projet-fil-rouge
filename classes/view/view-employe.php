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
                    <a href="ajout-employe.php" class="btn btn-primary">
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

    public static function voirEmploye($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->voirEmploye($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " : " . $user['prenom']; ?> </h5>

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
                    <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " : " . $user['prenom']; ?> </h5>

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
                    <h5 class="card-title"><?= "#" . $user['id'] . " <br/> " . $user['nom'] . " " . $user['prenom'] . "<br/>" . $user['mail'] . " <br/> "; ?> </h5>

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

    public static function profilAdmin($id)
    {
        $employe = new ModelEmploye();
        $user = $employe->profilEmploye($id);
    ?>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= "#" . $user['id'] . " <br/> " . $user['nom'] . " " . $user['prenom'] . "<br/>" . $user['mail'] . " <br/> "; ?> </h5>

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

    public static function DashboardAdmin()
    {

    ?>
        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Hugo 0.88.1">
            <title>Dashboard Template · Bootstrap v4.6</title>

            <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">



            <!-- Bootstrap core CSS -->
            <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">



            <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                        font-size: 3.5rem;
                    }
                }
            </style>


            <!-- Custom styles for this template -->
            <link href="/css/dashboard.css" rel="stylesheet">
        </head>

        <body>

            <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
                <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="admin.php">Acceuil</a>













            </nav>

            <a class="nav-link" href="profil-admin.php">Profil</a>
            <a class="nav-link" href="deconnexion.php">Deconnexion</a>


            <br />

            <div class="container">
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="row">

                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="sidebar-sticky pt-3">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="liste-employe.php">
                                        <span data-feather="file"></span>
                                        Employes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="liste-client.php">
                                        <span data-feather="shopping-cart"></span>
                                        Clients
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-expanded="false">Produits</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                                        <a class="dropdown-item" href="liste-produitadmin.php">Produits</a>
                                        <a class="dropdown-item" href="liste-marque.php">Marques</a>
                                        <a class="dropdown-item" href="liste-categ.php">Categories</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="liste-transporteur.php">
                                        <span data-feather="bar-chart-2"></span>
                                        Transporteurs
                                    </a>
                                </li>

                            </ul>


                        </div>
                    </nav>

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Espace admin</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">

                                </div>

                            </div>
                        </div>

                        <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

                    </main>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script>
                window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
            </script>
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


            <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
            <script src="/js/dashboard.js"></script>
        </body>

        </html>

    <?php

    }

   
    

    public static function menuEmploye()
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
                            <a class="nav-link" href="liste-client.php">liste clients <span class="sr-only"></span></a>
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
