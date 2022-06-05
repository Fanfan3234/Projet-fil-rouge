<?php
require_once '../model/model-contact.php';

class ViewContact
{
    public static function Contact()
    {

?>

        <div>
            <a href="page-client.php" class="btn btn-primary">
                < Retour</a>
                    <div class="card" style="width: 18rem;">

                        <div class="card-body">

                            <form method="post">
                                <h4>Contactez-nous</h4>

                                <input type="text" name="prenom" placeholder="Votre prenom *" required />
                                <br />

                                <input type="text" name="nom" placeholder="Votre nom *" required />
                                <br />

                                <input type="email" name="email" placeholder="Votre mail *" required />
                                <br />


                                <input type="tel" name="phone" placeholder="Numéro de téléphone *" required />
                                <br />

                                <textarea name="message" placeholder="Ecrivez votre texte ici *" required></textarea>
                                <br />

                                <button type="submit" class="btn btn-info" value="envoyer">Envoyer</button>
                                <button type="reset" class="btn btn-danger">Réinitialiser</button>
                            </form>
                            <?php
                            if (isset($_POST['message'])) {
                                $entete = 'MIME-Version: 1.0' . "\r\n";
                                $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                                $entete .= 'Reply-to: ' . $_POST['email'];

                                $message = '<h1>Message envoyé depuis la page Contact</h1>
                        <p>
                        <b></b>' . $_POST['prenom'] . '
                        <b></b>' . $_POST['nom'] . '<br>
                        <b> </b>' . $_POST['email'] . '<br>
                        <b> </b>' . $_POST['phone'] . '<br>
                        <b> </b>' . htmlspecialchars($_POST['message']) . '</p>';

                                $retour = mail('francoisgoddefroy62@gmail.com', 'Envoi depuis page Contact', $message, $entete);
                                if ($retour) {
                                    echo '<p>Votre message a bien été envoyé, je vous répondrai sous peu.</p>';
                                }
                            }
                            ?>
                        </div>
                    </div>
        </div>
<?php

    }
}
