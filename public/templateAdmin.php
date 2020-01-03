<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?= $title?> </title>
    <meta name="description" content="Site du photographe Stefano G Bianchi">
    <meta name="author" content="Stefano G bianchi photographe, Paris">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-4.4.1-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/public/faw/css/all.min.css"/>
    <link href="/public/css/starter-template.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/home">STEFANO G BIANCHI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">ACCUEIL <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">ACTUALITES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/series">TRAVAUX</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Bio">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">CONTACT</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <section class="adminContent">

        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>MENU ADMIN</h3>
                </div>

                <ul class="list-unstyled components">

                    <li>
                        <a href="/adminHomePage"> <i class="fas fa-tachometer-alt"></i> ADMIN HOME</a>
                    </li>

                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">BILLETS</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="/addPost"> Tous les billets (<?= $countPost ?>)</a>
                            </li>
                            <li>
                                <a href="/addPost"> Ajouter un billet</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SERIES</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="/allSeries"> Toutes les séries (<?= $countSerie ?>)</a>
                            </li>

                            <li>
                                <a href="/serieAdd"> Ajouter une série</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#serieSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">EXPOS</a>
                        <ul class="collapse list-unstyled" id="serieSubmenu">
                            <li>
                                <a href="/allExpos"> Toutes les expositions (<?= $countExpo ?>)</a>
                            </li>
                            <li>
                                <a href="/addPost"> Ajouter une exposition</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#imagesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">IMAGES</a>
                        <ul class="collapse list-unstyled" id="imagesSubmenu">
                            <li>
                                <a href="/allImg"> Toutes les images (<?= $countImg ?>)</a>
                            </li>

                            <li>
                                <a href="/UploadImg"> Ajouter une image</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#commentsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">COMMENTAIRES</a>
                        <ul class="collapse list-unstyled" id="commentsSubmenu">
                            <li>
                                <a href="/allComments"> Commentaires (<?= $countCom ?>)</a>
                            </li>

                            <li>
                                <a href="/reportedComments"> Commentaires signalés (<?= $reportedCom ?>)</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/disconnect"><i class="fas fa-power-off"></i> DECONNEXION</a>
                    </li>

                </ul>
            </nav>

            <div id="blocInfos">
                <?= $content?>
            </div>

        </div>


        <!-- </div> -->
    </section>

    <footer>
        <!-- <p> Copyright © Etienne Juffard - 2019 - Campo d'Ombra - Stefano Bianchi - tous droits réservés </p> -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="/public/css/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
        <script src="/public/js/AllImg.js"></script>
        <script src="/public/js/ajaxTest.js"></script>
        <script src="/public/js/tinyMce/tinymce.min.js"></script>
        <script src="/public/js/wysiwyg.js"></script>
    </footer>
</body>
</html>
