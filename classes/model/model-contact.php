<?php
require_once "connexion.php";

class ModelContact
{
    public function FormulaireContact()
    {if (isset($_POST['message'])) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'Reply-to: ' . $_POST['email'];

        $message = '<h1>Message envoyé depuis la page Contact</h1>
        <p>
        <b></b>' . $_POST['prenom'] . '
        <b></b>' . $_POST['nom'] . '<br>
        <b> </b>' . $_POST['email'] . '<br>
        <b> </b>' . $_POST['phone'] . '<br>
        <b> </b>' . htmlspecialchars($_POST['message']) . '</p>';

        $retour = mail('francoisgoddefroy62@gmail.com', 'Envoi depuis page Booking', $message, $entete);
        if ($retour)
            echo '<p>Votre message a bien été envoyé, je vous répondrai sous peu.</p>';
    }
   }
    
}
