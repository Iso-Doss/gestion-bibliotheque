<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';


/**
 * Cette fonction permet de se connecter a une base de donnée.
 * Elle retourne l'instance / objet de la base de donnée, si la connexion a la base de donnée est succès.
 *
 * @return object $db L'instance / objet de la base de donnée.
 */
function connect_db()
{

    $db = null;

    try {
        $db = new PDO('mysql:host=localhost;dbname=gestion-bibliotheque;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die("Oups! Une erreur s'est produite lors de la connexion a la base de donnée.");
    }

    return $db;

}


/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas cette adresse mail.
 * @param string $email L'email a vérifié.
 *
 * @return bool $check
 */
function check_email_exist_in_db(string $email)
{

    $check = false;

    $db = connect_db();

    $requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE email = :email";

    $verifier_email = $db->prepare($requette);

    $resultat = $verifier_email->execute([
        'email' => $email,
    ]);

    if ($resultat) {

        $nbr_utilisateur = $verifier_email->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

        $check = ($nbr_utilisateur > 0) ? true : false;

    }

    return $check;

}


/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas ce nom d'utilisateur.
 * @param string $nom_utilisateur Le nom d'utilisateur a vérifié.
 *
 * @return bool $check
 */
function check_user_name_exist_in_db(string $nom_utilisateur)
{

    $check = false;

    $db = connect_db();

    $requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur";

    $verifier_nom_utilisateur = $db->prepare($requette);

    $resultat = $verifier_nom_utilisateur->execute([
        'nom_utilisateur' => $nom_utilisateur,
    ]);

    if ($resultat) {

        $nbr_utilisateur = $verifier_nom_utilisateur->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

        $check = ($nbr_utilisateur > 0) ? true : false;

    }

    return $check;

}

/**
 * Cette fonction permet de verifier si un utilisateur (email + mot de passe) existe dans la base de donnée.
 * Si oui elle retourne un tableau contenant les informations de l'utilisateur.
 * Sinon elle retourne un tableau vide.
 *
 * @param string $email L'email.
 * @param string $password Le mot de passe.
 *
 * @return array $user Les informations de l'utilisateur.
 */
function check_if_user_exist(string $email_user_name, string $password)
{

    $user = [];

    $db = connect_db();

    $requette = "SELECT * FROM utilisateur WHERE (email = :email or nom_utilisateur = :nom_utilisateur ) and mot_passe = :mot_passe";

    $verifier_nom_utilisateur = $db->prepare($requette);

    $resultat = $verifier_nom_utilisateur->execute([
        'email' => $email_user_name,
        'nom_utilisateur' => $email_user_name,
        'mot_passe' => sha1($password),
    ]);

    if ($resultat) {

        $utilisateur = $verifier_nom_utilisateur->fetch(PDO::FETCH_ASSOC);

        $user = (isset($utilisateur) && !empty($utilisateur) && is_array($utilisateur)) ? $utilisateur : [];

    }

    return $user;

}

function check_if_user_conneted()
{

    $check = false;


    if (isset($_COOKIE["info_utilisateur"]) && !empty($_COOKIE["info_utilisateur"])) {

        //$user_info = json_decode($_COOKIE["user_info"], true);

        $check = true;

    }

    return $check;

}


function send_mail($email, $message)
{
    try {

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "sendmailcefp@gmail.com";
        $mail->Password = "Iso-Doss$22#G";

        $mail->IsHTML(true);
        $mail->AddAddress("dossou.israel48@gmail.com", "dossou.israel48@gmail.com");
        $mail->SetFrom("dossou.israel48@gmail.com", "dossou.israel48@gmail.com");
        // $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
        // $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
        $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

        $mail->MsgHTML($content);
        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function router()
{

    if (isset($_GET["requette"]) && !empty($_GET["requette"])) {

        switch ($_GET["requette"]) {

            case "liste-auteurs":
                include "auteurs/liste-auteurs.php";
                break;

            case "ajout-auteur":
                include "auteurs/ajout-auteur.php";
                break;

            case "ajout-auteur-traitement":
                include "auteurs/ajout-auteur-traitement.php";
                break;

            case "modifier-auteur":
                include "auteurs/modifier-auteur.php";
                break;

            case "modifier-auteur-traitement":
                include "auteurs/modifier-auteur-traitement.php";
                break;


            case "supprimer-auteur":
                include "auteurs/supprimer-auteur.php";
                break;

            case "liste-domaines":
                include "liste-domaines.php";
                break;

            case "ajout-domaine":
                include "ajout-domaine.php";
                break;

            default:
                include "auteurs/liste-auteurs.php";
                break;
        }

    } else {

        include "auteurs/liste-auteurs.php";

    }
}

/**
 * Cett fonction permet de d'ajouter un auteur a la base de données.
 *
 * @param string $nom_auteur Le nom de l'auteur.
 *
 * @return bool $ajout_auteur Le resultat de l'ajout de l'auteur.
 */
function ajout_auteur(string $nom_auteur): bool
{

    $ajout_auteur = false;

    if (isset($nom_auteur) && !empty($nom_auteur)) {

        $db = connect_db();

        // Ecriture de la requête
        $requette = 'INSERT INTO auteur (nom_aut) VALUES (:nom_aut);';

        // Préparation
        $inserer_auteur = $db->prepare($requette);

        // Exécution ! La recette est maintenant en base de données
        $resultat = $inserer_auteur->execute([
            'nom_aut' => $nom_auteur
        ]);


        if ($resultat) {
            $ajout_auteur = true;
        }

    }

    return $ajout_auteur;

}

function check_if_auteur_exist(string $nom_auteur): bool
{

    $check_if_auteur_exist = false;

    if (isset($nom_auteur) && !empty($nom_auteur)) {

        $db = connect_db();

        // Ecriture de la requête
        $requette = 'SELECT count(*) as nbr_auteur FROM auteur WHERE nom_aut = :nom_aut;';

        // Préparation
        $verifier_auteur = $db->prepare($requette);

        // Exécution ! La recette est maintenant en base de données
        $resultat = $verifier_auteur->execute([
            'nom_aut' => $nom_auteur
        ]);

        if ($resultat) {

            $check_if_auteur_exist = ($verifier_auteur->fetch(PDO::FETCH_ASSOC)["nbr_auteur"] > 1) ? true : false;

        }

    }

    return $check_if_auteur_exist;

}

/**
 * Cette fonction permet de récupérer la liste des auteurs de la base de donnée.
 *
 * @return array $liste_auteurs La liste des auteurs.
 */
function get_liste_auteurs(): array
{

    $liste_auteurs = array();

    $db = connect_db();

    // Ecriture de la requête
    $requette = 'SELECT * FROM auteur';

    // Préparation
    $verifier_liste_auteurs = $db->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $verifier_liste_auteurs->execute();

    if ($resultat) {

        $liste_auteurs = $verifier_liste_auteurs->fetchAll(PDO::FETCH_ASSOC);

    }


    return $liste_auteurs;

}

/**
 * Cette fonction permet de récupérer un auteur via son numéro d'auteur.
 *
 * @param int $num_auteur Le numéro de l'auteur.
 *
 * @return array $auteur L'auteur.
 */
function get_auteur_by_num_auteur(int $num_auteur): array
{

    $auteur = array();

    $db = connect_db();

    // Ecriture de la requête
    $requette = 'SELECT * FROM auteur WHERE num_aut = :num_aut ';

    // Préparation
    $verifier_auteur = $db->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $verifier_auteur->execute([
        "num_aut" => $num_auteur
    ]);

    if ($resultat) {

        $auteur = $verifier_auteur->fetchAll(PDO::FETCH_ASSOC);

    }

    return $auteur;

}


/**
 * Cett fonction permet de modifier un auteur exitant dans la base de données via son numéro d'auteur.
 *
 * @param int $num_auteur Le numéro de l'auteur.
 * @param string $nom_auteur Le nom de l'auteur.
 *
 * @return bool $modifier_auteur Le resultat de l'ajout de l'auteur.
 */
function modifier_auteur(int $num_auteur, string $nom_auteur): bool
{

    $modifier_auteur = false;

    if (isset($nom_auteur) && !empty($nom_auteur)) {

        $db = connect_db();

        // Ecriture de la requête
        $requette = 'UPDATE auteur SET nom_aut = :nom_aut WHERE num_aut = :num_aut;';

        // Préparation
        $modifier_auteur = $db->prepare($requette);

        // Exécution ! La recette est maintenant en base de données
        $resultat = $modifier_auteur->execute([
            'nom_aut' => $nom_auteur,
            'num_aut' => $num_auteur,
        ]);

        if ($resultat) {

            $modifier_auteur = true;

        }

    }

    return $modifier_auteur;

}

/**
 * Cette fonction permet de supprimer un auteur de la base de données a partir de son numéro d'auteur.
 * 
 * @param int $num_auteur Le numéro de l'auteur.
 * 
 * @return bool $auteur_est_supprimer
 * 
 */
function supprimer_auteur(int $num_auteur): bool{
    
    $auteur_est_supprimer = false;

    if (isset($num_auteur) && !empty($num_auteur)) {

        $db = connect_db();

        // Ecriture de la requête
        $requette = 'DELETE FROM auteur WHERE num_aut = :num_aut';

        // Préparation
        $supprimer_auteur = $db->prepare($requette);

        // Exécution ! La recette est maintenant en base de données
        $resultat = $supprimer_auteur->execute([
            'num_aut' => $num_auteur,
        ]);

        if ($resultat) {

            $auteur_est_supprimer = true;

        }

    }

    return $auteur_est_supprimer;

}