<?php

$num_auteur = "";

$auteur = array();

if (isset($_GET["num-auteur"]) && !empty($_GET["num-auteur"])) {
    $num_auteur = $_GET["num-auteur"];

    $auteur = get_auteur_by_num_auteur($num_auteur);

}

?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Supprimer 
                    l'auteur <?= (isset($auteur[0]["nom_aut"]) && !empty($auteur[0]["nom_aut"])) ? $auteur[0]["nom_aut"] : ""; ?> </h1>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">
    <?php
if ((!isset($num_auteur) || empty($num_auteur)) || (!isset($auteur) || empty($auteur))) {
    
    ?>
    <div class="alert alert-danger" role="alert">
        L'auteur que vous souhaitez supprimer n'existe pas.

        <a class="btn btn-default" href="?requette=liste-auteurs">Retour vers la liste des auteurs</a>
    </div>
    <?php

}else{

    $est_supprimer = supprimer_auteur($num_auteur);

    if($est_supprimer){

        ?>
        <div class="alert alert-success" role="alert">
           Auteur supprimer avec succès
    
            <a class="btn btn-default" href="?requette=liste-auteurs">Retour vers la liste des auteurs</a>
        </div>
        <?php

    }else{

        ?>
        <div class="alert alert-success" role="alert">
           Oups !!! Une erreur s'est produite lors de la suppression de l'auteur.
    
            <a class="btn btn-default" href="?requette=liste-auteurs">Retour vers la liste des auteurs</a>
        </div>
        <?php

    }

}


?>


</div>

</section>