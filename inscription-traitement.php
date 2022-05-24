<?php

$donnees = array();

$erreurs = array();

if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
    $donnees["nom"] = $_POST["nom"];
} else {
    $erreurs["nom"] = "Le champs nom est requis. Veuillez le renseigné.";
}

if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
    $donnees["prenom"] = $_POST["prenom"];
} else {
    $erreurs["prenom"] = "Le champs prénom est requis. Veuillez le renseigné.";
}

if (isset($_POST["sexe"]) && !empty($_POST["sexe"])) {
    $donnees["sexe"] = $_POST["sexe"];
} else {
    $erreurs["sexe"] = "Le champs sexe est requis. Veuillez le renseigné.";
}

if (isset($_POST["date-naissance"]) && !empty($_POST["date-naissance"])) {
    $donnees["date-naissance"] = $_POST["date-naissance"];
} else {
    $erreurs["date-naissance"] = "Le champs date de naissance est requis. Veuillez le renseigné.";
}

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $donnees["email"] = $_POST["email"];
} else {
    $erreurs["email"] = "Le champs email est requis. Veuillez le renseigné.";
}

if (isset($_POST["nom-utilisateur"]) && !empty($_POST["nom-utilisateur"])) {
    $donnees["nom-utilisateur"] = $_POST["nom-utilisateur"];
} else {
    $erreurs["nom-utilisateur"] = "Le champs nom d'utilisateur est requis. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"])) {
    $donnees["mot-passe"] = $_POST["mot-passe"];
} else {
    $erreurs["mot-passe"] = "Le champs mot de passe est requis. Veuillez le renseigné.";
}

if (isset($_POST["retapez-mot-passe"]) && !empty($_POST["retapez-mot-passe"])) {
    $donnees["retapez-mot-passe"] = $_POST["retapez-mot-passe"];
} else {
    $erreurs["retapez-mot-passe"] = "Le champs retapez mot de passe est requis. Veuillez le renseigné.";
}

if(empty($erreurs)){


    if($donnees["mot-passe"] != $donnees["retapez-mot-passe"]){

        $erreurs["mot-passe"] = $erreurs["retapez-mot-passe"] = "Les mots de passe ne sont pas identitque. Veuillez le réesayer.";

    }

}


//$mysqlConnection = new PDO(
//    'mysql:host=localhost;dbname=gestion-bibliotheque;charset=utf8',
//    'root',
//    'root1'
//);
//
//die(var_dump($mysqlConnection));

header("location: inscription.php?erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnees));