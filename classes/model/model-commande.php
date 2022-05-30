<?php
require_once "connexion.php";
class ModelCommande
{
    private $id;
    private $date;
    private $etat;
    private $mode;
    private $id_client;
    private $id_transporteur;

    public function __construct($id = null, $date = null, $etat = null, $mode = null, $id_client = null, $id_transporteur = null)
    {
        $this->id = $id;
        $this->date = $date;
        $this->etat = $etat;
        $this->mode = $mode;
        $this->id_client = $id_client;
        $this->id_transporteur = $id_transporteur;
    }

    public function listeCommandeAdmin()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM commande
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listeCommande($id_client)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM commande where id_client=:id_client;
    ");
        $requete->execute([
            ':id_client' => $id_client,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function ajoutCommande($id, $date, $etat, $id_client, $id_transporteur)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        INSERT INTO commande VALUES (null, :date, :etat, :id_client, :id_transporteur )
      ");
        return $requete->execute([
            ':id' => $id,
            ':date' => $date,
            ':etat' => $etat,
            ':id_client' => $id_client,
            ':id_transporteur' => $id_transporteur,
        ]);
    }

    public function voirCommande($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM commande where id=:id;
    ");
        $requete->execute([
            ':id' => $id,
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function suppCommande($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      DELETE  FROM commande where id= :id;
    ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }

    public function modifCommande($id, $date, $etat, $id_client, $id_transporteur)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("
      UPDATE commande SET date = :date, etat = :etat, id_client = :id_client, id_transporteur = :id_transporteur WHERE id = :id
    ");
        return $requet->execute([
            ':id' => $id,
            ':date' => $date,
            ':etat' => $etat,
            ':id_client' => $id_client,
            ':id_transporteur' => $id_transporteur,

        ]);
    }



    

    /*

    GETTERS ET SETTERS

     */

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function getId_client()
    {
        return $this->id_client;
    }

    public function getId_transporteur()
    {
        return $this->id_transporteur;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    public function setId_client($id_client)
    {
        $this->id_client = $id_client;
        return $this;
    }

    public function setId_transporteur($id_transporteur)
    {
        $this->id_transporteur = $id_transporteur;
        return $this;
    }
}
