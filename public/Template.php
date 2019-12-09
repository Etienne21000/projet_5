<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> <?= $title; ?> </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" href="/public/faw/css/all.min.css"/>
</head>

<header>

    <div class="menu_ham">
        <span></span>
    </div>

    <div class="menu_top">

        <div id="name">
            <p>
                <a href="index.php?action=UploadImg"> STEFANO G BIANCHI </a>
            </p>
        </div>

        <div class="menu nav">
            <a href="/index.php?action=Accueil"> ACCUEIL</a>
            <a href="/index.php?action=UploadImg">ACTUALITES</a>
            <a href="/index.php?action=series">TRAVAUX</a>
            <a href="/index.php?action=Bio">A PROPOS</a>
            <a href="/index.php?action=Accueil">CONTACT</a>
            <a href="/index.php?action=homeAdmin">ADMIN</a>
        </div>

    </div>

</header>

<body>

    <?= $content ?>

    <footer>
        <p> Copyright © Etienne Juffard - 2019 - Campo d'Ombra - Stefano Bianchi - tous droits réservés </p>
    </footer>

</body>
</html>
