<?php

var_dump("Ok je suis sur la page de traitement");

$donnees = array();

$erreurs = array();

if(isset($_POST["nom"]) && !empty($_POST["nom"])){
    $donnees["nom"] = $_POST["nom"];
}else{
    $erreurs["nom"] = "Le champs nom est requis. Veuillez le renseigné.";
}

if(isset($_POST["prenom"]) && !empty($_POST["prenom"])){
    $donnees["prenom"] = $_POST["prenom"];
}else{
    $erreurs["prenom"] = "Le champs prénom est requis. Veuillez le renseigné.";
}

if(isset($_POST["sexe"]) && !empty($_POST["sexe"])){
    $donnees["sexe"] = $_POST["sexe"];
}else{
    $erreurs["sexe"] = "Le champs sexe est requis. Veuillez le renseigné.";
}

header("location: inscription.php?erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnees));