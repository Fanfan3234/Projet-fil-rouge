<?php
require_once "connexion.php";
class ModelEmploye
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $pass;
    private $role;

    public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $pass = null, $role = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->pass = $pass;
        $this->role = $role;
    }

    public function listeEmploye()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM employe
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function profilEmploye($id)
    {
      $idcon = connexion();
      $requete = $idcon->prepare("
        SELECT * FROM employe where id=:id;
      ");
      $requete->execute([
        ':id' => $id,
      ]);
      return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function ajoutEmploye($nom, $prenom, $mail, $pass, $role)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        INSERT INTO employe VALUES ( null, :nom, :prenom, :mail, :pass, :role )
      ");
        return $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':pass' => $pass,
            ':role' => $role,
        ]);
    }

    public function connexionEmploye($mail)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
          SELECT * FROM employe WHERE mail=:mail
        ");

        $requete->execute([
            ':mail' => $mail,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function espaceAdmin($role)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM employe where role=:role;
    ");
        $requete->execute([
            ':role' => $role,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    


    public function voirEmploye($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM employe where id=:id;
    ");
        $requete->execute([
            ':id' => $id,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function suppEmploye($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      DELETE  FROM employe where id= :id;
    ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }

    public function modifEmploye($id, $nom, $prenom, $mail, $pass)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("
      UPDATE employe SET nom = :nom, prenom = :prenom, mail = :mail, pass = :pass WHERE id = :id
    ");
        return $requet->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':pass' => $pass

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

    public function getRole()
    {
        return $this->role;
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

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}
