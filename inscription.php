<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription | Gestion d'une bibliothèque</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">

<div class="register-box">

    <div class="card card-outline card-primary">

        <div class="card-header text-center">

            <a href="#" class="h1"><b>Ges</b>Bibliothèque</a>

        </div>

        <?php

        var_dump($_GET);

        ?>

        <div class="card-body">

            <p class="login-box-msg">Enregistrer un utilisateur </p>

            <form action="inscription-traitement.php" method="post" novalidate>

                <div class="col-sm-12">

                    <label for="inscription-nom">

                        Nom:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="text" name="nom" id="inscription-nom" class="form-control"
                               placeholder="Veuillez entrer votre nom" required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-prenom">

                        Prénom:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="text" name="prenom" id="inscription-prenom" class="form-control"
                               placeholder="Veuillez entrer votre prénom" required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-sexe">

                        Sexe:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="form-group clearfix">

                        <div class="icheck-primary d-inline">

                            <input type="radio" name="sexe" checked="" id="sexe-m">

                            <label for="sexe-m">M</label>

                        </div>

                        <div class="icheck-primary d-inline">

                            <input type="radio" name="sexe" checked="" id="sexe-f">

                            <label for="sexe-f">F</label>

                        </div>
                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-date-naissance">

                        Date de naissance:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control"
                               placeholder="Veuillez entrer votre date de naissance"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-email">

                        Email:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="email" name="email" id="inscription-email" class="form-control"
                               placeholder="Veuillex entrer votre address email"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-envelope"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-nom-utilisateur">

                        Nom d'utilisateur:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur" class="form-control"
                               placeholder="Veuillez entrer votre nom d'utilisateur"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-mot-passe">

                        Mot de passe:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control"
                               placeholder="Veuillez entrer votre mot de passe">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <label for="inscription-retapez-mot-passe">

                        Retapez mot de passe:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe"
                               class="form-control" placeholder="Veuillez retaper votre mot de passe">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-6"></div>

                    <!-- /.col -->
                    <div class="col-6">

                        <button type="submit" class="btn btn-primary btn-block">Inscription</button>

                    </div>
                    <!-- /.col -->

                </div>

            </form>

            <a href="connexion.php" class="text-center mt-3">J'ai deja un compte</a>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/js/adminlte.min.js"></script>
</body>
</html>
