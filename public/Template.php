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

<body>

    <header>

        <div class="menu_ham">
            <span></span>
        </div>

        <div class="menu_top">

            <div id="name">
                <p>
                    <a href="/UploadImg"> STEFANO G BIANCHI </a>
                </p>
            </div>

            <div class="menu nav">
                <a href="/home"> ACCUEIL</a>
                <a href="/">ACTUALITES</a>
                <a href="/series">TRAVAUX</a>
                <a href="/Bio">A PROPOS</a>
                <a href="/home">CONTACT</a>
                <a href="/UploadImg">ADMIN</a>
            </div>

        </div>

    </header>

    <?= $content ?>

    <footer>
        <!-- <script src="/public/js/transitions.js"></script> -->
        <script src="/public/js/ajax.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <p> Copyright © Etienne Juffard - 2019 - Campo d'Ombra - Stefano Bianchi - tous droits réservés </p>
    </footer>

</body>
</html>
