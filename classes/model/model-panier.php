<?php
require_once "connexion.php";

class ModelProduit
{
  private $id;
  private $nom;
  private $ref;
  private $description;
  private $quantite;
  private $prix;
  private $photo;
  private $id_categorie;
  private $id_marque;



  public function __construct($id = null, $nom = null, $ref = null, $description = null, $quantite = null, $prix = null, $photo = null, $id_categorie = null, $id_marque = null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->ref = $ref;
    $this->description = $description;
    $this->quantite = $quantite;
    $this->prix = $prix;
    $this->photo = $photo;
    $this->id_categorie = $id_categorie;
    $this->id_marque = $id_marque;
    
  }

  public function listeProduit()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM produit
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }


  public function ajoutProduit($nom, $ref, $description, $quantite, $prix, $photo, $id_categorie, $id_marque)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO produit VALUES ( null, :nom, :ref, :description, :quantite, :prix, :photo, :id_categorie, :id_marque)
    ");
    return $requete->execute([
      ':nom' => $nom,
      ':ref' => $ref,
      ':description' => $description,
      ':quantite' => $quantite,
      ':prix' => $prix,
      ':photo' => $photo,
      ':id_categorie' => $id_categorie,
      ':id_marque' => $id_marque,

    ]);
  }

 

  public static function pageProduit($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
        SELECT * FROM produit where id=:id;
      ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public function voirProduit($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM produit where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }
  
  

  public function suppProduit($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      DELETE  FROM produit where id= :id;
    ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }

  //public function resetClient($token){$token = random_bytes(32);$requete = $idcon->prepare("INSERT INTO client values (:token);"); $requete->execute([ ':token' => hash('sha256', $token),]);}




  public function modifProduit($id, $nom, $ref, $description, $quantite, $prix, $photo, $id_categorie, $id_marque)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("
        UPDATE marque SET nom = :nom, ref = :ref, description = :description, quantite = :quantite, prix = :prix, photo = :photo, id_categorie = :id_categorie, id_marque = :id_marque  WHERE id = :id
        ");
        return $requet->execute([
          ':id' => $id,
          ':nom' => $nom,
          ':ref' => $ref,
          ':description' => $description,
          ':quantite' => $quantite,
          ':prix' => $prix,
          ':photo' => $photo,
          ':id_categorie' => $id_categorie,
          ':id_marque' => $id_marque,

        ]);
    }





  

  /*
  
  GETTERS ET SETTERS

  */

  public function getId()
  {
    return $this->id;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getRef()
  {
    return $this->ref;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getQuantite()
  {
    return $this->quantite;
  }

  public function getPrix()
  {
    return $this->prix;
  }

  public function getPhoto()
  {
    return $this->photo;
  }

  public function getId_categorie()
  {
    return $this->id_categorie;
  }

  public function getId_marque()
  {
    return $this->id_marque;
  }



  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
    return $this;
  }

  public function setRef($ref)
  {
    $this->ref = $ref;
    return $this;
  }

  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }

  public function setQuantite($quantite)
  {
    $this->quantite = $quantite;
    return $this;
  }

  public function setPrix($prix)
  {
    $this->prix = $prix;
    return $this;
  }

  public function setPhoto($photo)
  {
    $this->photo = $photo;
    return $this;
  }

  public function setId_categorie($id_categorie)
  {
    $this->id_categorie = $id_categorie;
    return $this;
  }

  public function setId_marque($id_marque)
  {
    $this->id_marque = $id_marque;
    return $this;
  }
}
