<?php
require_once "connexion.php";

class ModelCateg
{
  private $id;
  private $nom;



  public function __construct($id = null, $nom = null)
  {
    $this->id = $id;
    $this->nom = $nom;
  }

  public function listeCateg()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM categorie
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }


  public function ajoutCateg($nom)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO categorie VALUES ( null, :nom)
    ");
    return $requete->execute([
      ':nom' => $nom,


    ]);
  }




  public function voirCateg($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM categorie where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public function suppCateg($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM categorie where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  //public function resetClient($token){$token = random_bytes(32);$requete = $idcon->prepare("INSERT INTO client values (:token);"); $requete->execute([ ':token' => hash('sha256', $token),]);}












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
}
