<?php
    $liste_auteurs = get_liste_auteurs();
?>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Liste des auteurs</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des auteurs</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">

                    <?php if(isset($liste_auteurs) && !empty($liste_auteurs)){
                        ?>

                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                foreach($liste_auteurs as $auteur){
                                    ?>
                                        <tr>
                                            <td><?= $auteur["num_aut"]; ?></td>
                                            <td><?= $auteur["nom_aut"]; ?></td>
                                            <td>
                                                <a href="?requette=modifier-auteur&num-auteur=<?= $auteur["num_aut"]; ?>" class="btn btn-warning">Modifier</a>
                                                <a href="#" class="btn btn-danger"data-toggle="modal" data-target="#supprimer-auteur-<?= $auteur["num_aut"]; ?>">Supprimer</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="supprimer-auteur-<?= $auteur["num_aut"]; ?>" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title">Supprimer l'auteur <?= $auteur["nom_aut"]; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Etes vous sur de vouloir supprimer l'auteur <?= $auteur["nom_aut"]; ?> ?</p>
                                                </div>
                                                <div class="modal-footer ">

                                                <a href="?requette=supprimer-auteur&num-auteur=<?= $auteur["num_aut"]; ?>" class="btn btn-danger">Oui</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    <?php
                                }

                            ?>
                           
                            </tbody>
                        </table>

                        <?php
                    }
                    else{

                        echo "Aucun auteurs n'a été trouvés!!!";

                    }
                    ?>


                        
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
