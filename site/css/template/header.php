<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $pagetitle; ?> | Epicerie</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/template/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/template/css/style.css" rel="stylesheet">
    <!-- Icon Material-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<!-- Start your project here-->
<header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <?php
    if (isset($_GET['controller'])){
        if ($_GET['controller']=="caisse"){
            $var="display:none;";
        } else {
            $var="";
        }
    } else {
        $style="";
    }
    ?>

    <!--Navbar-->
    <nav class="fixed-top scrolling-navbar navbar navbar-expand-lg navbar-dark light-green darken-3" style="<?php echo $var; ?>">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="./">
            <img src="./css/template/img/logo.jpg" height="50" class="d-inline-block align-top"
                 alt="mdb logo">
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">

                <form class=" my-2 mx-3 my-lg-0">
                    <div class="input-group">
                        <input type="text" class="form-control typeahead border-primary" name="query" id="search"
                               placeholder="Rechercher un produit" data-provide="typeahead" autocomplete="off"
                               style="width: 40vw;">
                        <div id="match-list" style="position: absolute; width: 40vw;margin-top: 40px;">
                        </div>
                    </div>
                </form>
            </ul>
            <!-- Links -->

            <a class="nav-link white-text" href="./?controller=panier&action=read">
                <i class="fas fa-shopping-cart"></i> </a>
            <?php
            if (isset($_SESSION['login'])) {
                echo '<a class="nav-link dropdown-toggle white-text" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
		          aria-haspopup="true" aria-expanded="false">
		          <i class="fas fa-user"></i> ' . $_SESSION['login'] . ' </a>
		        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
		          <a class="dropdown-item" href="./?controller=utilisateur&action=read&login=' . $_SESSION['login'] . '">Mon compte</a>';
                if (Session::is_admin() == false) {
                    echo '<a class="dropdown-item" href="./?controller=commandeClient">Mes commandes</a>';
                }

                if (Session::is_admin() == true) {
                    echo '<a class="dropdown-item" href="./?controller=admin">Administation</a>
		          <a class="dropdown-item" href="./?controller=produit">Produit</a>
		          <a class="dropdown-item" href="./?controller=commandeClient">Commandes</a>
		          <a class="dropdown-item" href="./?controller=commande">Livraison</a>
		          <a class="dropdown-item" href="./?controller=utilisateur">Utilisateur</a>
		          <a class="dropdown-item" href="./?controller=fournisseur">Fournisseur</a>
		          <a class="dropdown-item" href="./?controller=categorie">Catégorie</a>
		          <a class="dropdown-item" href="./?controller=statistique">Comptabilité</a>
                  <a class="dropdown-item" href="./?controller=caisse">Caisse</a>';
                }
                echo '<a class="dropdown-item" href="./?controller=utilisateur&action=deconnected">Déconnexion</a>
		        </div>';
            } else {
                echo '<a href="./?controller=utilisateur&action=connect"><button class="btn btn-outline-white" type="button">CONNEXION</button></a>
				    <a href="./?controller=utilisateur&action=create"><button class="btn btn-outline-white" type="button">INSCRIPTION</button></a>';
            }
            ?>

        </div>
        <!-- Collapsible content -->


    </nav>

    <!--/.Navbar-->
</header>
<script src="css/template/js/modules/searchbar.js"></script>

<!-- Start your project here-->
<div style="min-height: 90vh;margin-top:100px;">

