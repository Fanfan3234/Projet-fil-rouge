<?php
require_once "connexion.php";

class ModelMarque
{
    private $id;
    private $nom;
    private $logo;

    public function __construct($id = null, $nom = null, $logo = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->logo = $logo;
    }

    public function listeMarque()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM marque
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajoutMarque($nom, $logo)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO marque VALUES ( null, :nom, :logo)
    ");
        return $requete->execute([
            ':nom' => $nom,
            ':logo' => $logo,

        ]);
    }

    public static function pageMarque($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM marque where id=:id;
      ");
        $requete->execute([
            ':id' => $id,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function voirMarque($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM marque where id=:id;
    ");
        $requete->execute([
            ':id' => $id,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function suppMarque($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      DELETE FROM marque where id= :id;
    ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }


    public function modifMarque($id, $nom, $logo)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("
        UPDATE marque SET nom = :nom, logo = :logo  WHERE id = :id
        ");
        return $requet->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':logo' => $logo,

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

    public function getLogo()
    {
        return $this->logo;
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

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }
}
