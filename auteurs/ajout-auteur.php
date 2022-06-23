<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajouter un auteur</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">

        <?php

        if (isset($message["statut"]) && 0 == $message["statut"]) {

            ?>
            <div class="alert alert-danger" role="alert">
                <?= $message["message"]; ?>
            </div>
            <?php

        } else if (isset($message["statut"]) && 1 == $message["statut"]) {

            ?>
            <div class="alert alert-success" role="alert">
                <?= $message["message"]; ?>
            </div>
            <?php

        }

        ?>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ajout d'un auteur</h3>
            </div>


            <form class="form-horizontal" action="?requette=ajout-auteur-traitement" method="POST">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nom-auteur" class="col-sm-2 col-form-label">Nom de l'auteur: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom-auteur" id="nom-auteur"
                                   placeholder="Veuillez entrer le nom de l'auteur"
                                   value="<?= (isset($donnees["nom-auteur"]) && !empty($donnees["nom-auteur"])) ? $donnees["nom-auteur"] : ""; ?>"
                                   >


                            <span class="text-danger">

                                <?php
                                if (isset($erreurs["nom-auteur"]) && !empty($erreurs["nom-auteur"])) {
                                    echo $erreurs["nom-auteur"];
                                }

                                ?>

                            </span>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" class="btn btn-success  float-right">Enregistrer un auteur</button>
                </div>

            </form>
        </div>


    </div>

</section>
