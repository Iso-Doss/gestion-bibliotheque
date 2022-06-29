<?php

$donnees = array();

$erreurs = array();

$message = array();

$message_success = "";

if (isset($_POST["nom-auteur"]) && !empty($_POST["nom-auteur"])) {
    $donnees["nom-auteur"] = $_POST["nom-auteur"];
} else {
    $erreurs["nom-auteur"] = "Le champs nom de l'auteur est requis. Veuillez le renseigné.";
}

if (empty($erreurs)) {

    $check_if_auteur_exist = check_if_auteur_exist($donnees["nom-auteur"]);

    if (!$check_if_auteur_exist) {

        $numero_auteur = -1;

        if (isset($_POST["numero-auteur"]) && !empty($_POST["numero-auteur"])) {
            $numero_auteur = $_POST["numero-auteur"];
        }

        $modifier_auteur = modifier_auteur($numero_auteur, $donnees["nom-auteur"]);

        if ($modifier_auteur) {

            $message["statut"] = 1;
            $message["message"] = "Auteur modifié avec succès.";

        } else {

            $message["statut"] = 0;
            $message["message"] = "Oups! Une erreur s'est produite lors de la modification de l'auteur. Veuillez réesayer.";

        }

    } else {

        $message["statut"] = 0;
        $message["message"] = "Oups! Le nom de ce auteur existe deja. Veuillez réesayer.";

    }

}

include("auteurs/ajout-auteur.php");
