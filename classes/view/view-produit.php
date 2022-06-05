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
              <th scope="col">nom</th>
              <th scope="col"></th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($liste as $produit) {
            ?>
              <tr>
                <th scope="row"><?= $produit['id'] ?></th>
                <td>
                  <?= $produit['nom'] ?>
                </td>
                <td>
                  <?= $produit['photo'] ?>



                </td>
                <td>
                  <a href="voir-produit.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Voir</a>
                </td>


              </tr>
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

  public static function voirProduitadmin($id)
  {
    $produit = new ModelProduit();
    $user = $produit->voirProduit($id);
  ?>
    <div>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">

            <?= $user['id'] . " " . $user['nom'] . " "; ?> </h5>

          <p class="card-text">
           <? echo '<img src="'.$user['photo'].'" alt="HTML5 Icon" style="width:128px;height:128px">';?>
            <br />
            ref : <?= $user['ref'] . " "; ?>
            <br />

            prix : <?= $user['prix'] . " "; ?>
            <br />
            quantité : <?= $user['quantite'] . " "; ?>
            <br />
            Description :
            <br />
            <?= $user['description'] . " "; ?>
            <br />

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

  public static function menuProduit()
  {

  ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
      <div class="contenair-fluid">
        <a class="navbar-brand" href="page-client.php">Navbar</a>
      </div>

      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">
              <a class="nav-link" href="liste-client.php">clients <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="liste-employe.php">employes <span class="sr-only">(current)</span></a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="liste-produit.php">Produits <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact<span class="sr-only">(current)</span></a>
            </li>



          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>



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

  public static function voirProduit($id)
  {
    $produit = new ModelProduit();
    $user = $produit->voirProduit($id);
  ?>
    <div>
      <div class="card" style="width: 18rem;">






        <div class="card-body">


          <p class="card-text">
            <img src="<?= $user['photo'] ?>"  alt="<?= $user['nom'] ?>">
          <div>
            <h1 class="name"><?= $user['nom'] ?></h1>
            <?= "ref : " . $user['ref'] . " "; ?>
            <br />
            <?= $user['quantite'] . " en stock"; ?>
            <br />
            <span class="price">

              &dollar;<?= $user['prix'] ?>

              <br />
            </span>
            <form action="panier.php?page=panier" method="post">
              <input type="number" name="quantite" value="1" min="1" max="<?= $user['quantite'] ?>" placeholder="Quantité" required>
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <input type="submit" class="btn btn-info" value="Ajouter au panier">
            </form>
            <div class="description">
              <?= $user['description'] ?>
            </div>
          </div>




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
              <th scope="col">nom</th>
              <th scope="col">photo</th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($liste as $produit) {
            ?>
              <tr>
                <th scope="row"><?= $produit['id'] ?></th>
                <td>
                  <?= $produit['nom'] ?>
                </td>
                <br />
                <td> <?= $produit['photo'] ?></td>
                <td>

                  <a href="voir-produitadmin.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Voir</a>
                  <a href="modif-produit.php?id=<?= $produit['id'] ?>" class="btn btn-info">Modifier</a>
                  <a href="supp-produit.php?id=<?= $produit['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
              </tr>


            <?php
            }
            ?>
          </tbody>
          <a href="admin.php" class="btn btn-primary">
            < Retour</a>
              <a href="ajout-produit.php" class="btn btn-primary">
                Ajout</a>
        </table>

      <?php
      } else {
      ?>
        <a href="admin.php" class="btn btn-primary">
          < Retour</a>
            <a href="ajout-produit.php" class="btn btn-primary">
              Ajout</a>
            <div class="alert alert-danger" role="alert">
              Aucun contact n'existe dans la liste.
            </div>
          <?php
        } ?>
    </div>
  <?php
  }

  public static function modifProduit($id)
  {
    $produit = new ModelProduit();
    $user = $produit->voirProduit($id);
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
