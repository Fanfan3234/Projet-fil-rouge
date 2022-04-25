<?php
require_once "connexion.php";
class ModelClient
{
  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $pass;
  private $tel;
  private $adresse;
  private $ville;
  private $codepost;
  

  public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $pass = null, $tel = null, $adresse = null, $ville = null, $codepost = null )
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->pass = $pass;
    $this->tel = $tel;
    $this->adresse = $adresse;
    $this->ville = $ville;
    $this->codepost = $codepost;
    
  }

  public function listeClient()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM client
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }



  public function ajoutClient($nom, $prenom, $mail, $pass, $tel, $adresse, $ville, $codepost )
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO client VALUES ( null, :nom, :prenom, :mail, :pass, :tel, :adresse, :ville, :codepost  )
    ");
    return $requete->execute([
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':mail' => $mail,
      ': pass' => $pass,
      ':tel' => $tel,
      ':adresse' => $adresse,
      ':ville' => $ville,
      ':codepost' => $codepost,     
    ]);
  }

  public function voirClient($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM client where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public function suppClient($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM client where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }



  public function modifClient($id, $nom, $prenom, $mail, $pass, $tel, $adresse, $ville, $codepost )
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail, pass = :pass, tel = :tel, adresse = :adresse, ville = :ville, codepost = :codepost WHERE id = :id
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':mail' => $mail,
      ':pass' => $pass,
      ':tel' => $tel,
      ':adresse' => $adresse,
      ':ville' => $ville,
      ':codepost' => $codepost,
      
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

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getMail()
  {
    return $this->mail;
  }
  
  public function getPass()
  {
    return $this->pass;
  }
  
  public function getTel()
  {
    return $this->tel;
  }

  public function getAdresse()
  {
    return $this->adresse;
  }

  public function getVille()
  {
    return $this->ville;
  }

  public function getCodepost()
  {
    return $this->codepost;
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

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
    return $this;
  }

  public function setMail($mail)
  {
    $this->mail = $mail;
    return $this;
  }
  
  public function setPass($pass)
  {
    $this->pass = $pass;
    return $this;
  }

  public function setTel($tel)
  {
    $this->tel = $tel;
    return $this;
  }

  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;
    return $this;
  }

  public function setVille($ville)
  {
    $this->ville = $ville;
    return $this;
  }

  public function setCodepost($codepost)
  {
    $this->codepost = $codepost;
    return $this;
  }
}
  
