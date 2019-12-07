<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> <?= $title?> </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" href="/public/faw/css/all.min.css"/>
</head>

<body>

    <header class="top-Admin">

        <div id="ID_Utilisateur_admin">
            <a href="index.php?action=Accueil" title="retour à l'accueil du site">
                <i class="fas fa-user-edit"></i>
                <?php
                if(isset($_SESSION['pseudo']) && isset($_SESSION['id']))
                {
                    echo  $_SESSION['pseudo'];
                }
                else {
                    echo 'se connecter';
                }
                ?>
            </a>
        </div>

    </header>

    <section class="generalAdmin">

        <header class="titre">
            <h3>
                <a href="index.php?action=Accueil" title="Retour à l'accueil"></a>
            </h3>
        </header>

        <div id="contentAdminView">

            <!-- <div id="admin_fleche">
                <p>Menu
                    <i class="fas fa-chevron-down" id="fleche_bas_admin"></i>
                    <i class="fas fa-chevron-up" id="fleche_haut_admin"></i>
                </p>
            </div> -->

            <aside class="asideAdmin">
                <ul id="adminList">
                        <li class="menuAdmin"><a href="index.php?action="><i class="fas fa-tachometer-alt"></i>Tableau de bord</a></li>
                        <li class="menuAdmin"><a href="index.php?action=addPost"><i class="fas fa-list-ul"></i>Ajouter un post</a></li>
                        <li class="menuAdmin"><a href="index.php?action=serieView"><i class="fas fa-list-ul"></i>Series </a></li>
                        <li class="menuAdmin"><a href="index.php?action=expoView"><i class="fas fa-list-ul"></i>Expos</a></li>
                        <li class="menuAdmin"><a href="index.php?action=addImage"><i class="fas fa-list-ul"></i>Ajouter une image</a></li>

                        <li class="menuAdmin"><a href="index.php?action=Accueil"><i class="fas fa-igloo"></i>Accueil</a></li>
                    <li class="menuAdminDeco"><a href="index.php?action=discUser"><i class="fas fa-power-off"></i> Deconnexion</a></li>
                </ul>
            </aside>

            <div id="blocInfos">
                <?= $content?>
            </div>
        </div>
    </section>

    <footer>
        <p> Copyright © Etienne Juffard - 2019 - tous droits réservés </p>
        <!-- <script src="/src/public/js/transitionsAdmin.js"></script>
        <script src="src/public/js/tinyMce/tinymce.min.js"></script>
        <script src="src/public/js/wysiwyg.js"></script> -->
    </footer>
</body>
</html>