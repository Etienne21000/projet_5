<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <!-- Display all images -->


    <div class="container">
        <div class="starter-template">
            <?php if(isset($_SESSION['id'])){?>
                <h1>Bonjour <?= $_SESSION['identifiant']; ?></h1>

            <?php } else {?>
                <h1>Bonjour </h1>
            <?php }; ?>
            <p class="lead">Bienvenue sur la page d'aministration du site Campo d'Ombra.
                <br>Vous pouvez modifiez l'ensemble des données présentes sur le site.
            </p>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les images</h4>
        </div>
        <section class="row imagesRow">
            <?php foreach($Images as $data):?>
                <div class="col-xs-4 col-sm-3 col-md-2"><img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>"></div>
            <?php endforeach; ?>

        </section>

        <section class="img_open">
        </section>

        <div class="btnsuite">
            <a href="/allImg" name="view" class="img-form">
                <button type="button" class="btn btn-outline-secondary">Voir toutes les images</button>
            </a>
        </div>

        <!-- <div class="close">
            <a class="close" name="close"><i class="far fa-times-circle"></i></a>
        </div> -->

    </div>



    <div class="containerAdmin">
        <div class="titre">
            <h4>Tous les billets</h4>
        </div>
        <section class="row">
            <?php foreach($Posts as $data):?>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <p>
                        <?= $data->title(); ?>
                        <a href="/singlepost/<?= $data->id(); ?>"> Lire la suite</a>
                    </p>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <button type="button" class="btn btn-outline-secondary">Voir tous les billets</button>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les series</h4>
        </div>
        <section class="row serieRow">
            <?php foreach($Series as $data):?>
                <div class="col-xs-4 col-sm-3 col-md-2 serieCol">
                    <p>
                        <?= $data->title(); ?>

                        <div class=".img_serie_2">
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                        </div>

                        <a href="/singleSerie/<?= $data->id(); ?>"> Voir la série</a>
                    </p>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <button type="button" class="btn btn-outline-secondary">Voir toutes les series</button>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les expositions</h4>
        </div>
        <section class="row serieRow">
            <?php foreach($Expos as $data):?>
                <div class="col-xs-4 col-sm-3 col-md-2 serieCol">
                    <p>
                        <?= $data->title(); ?>

                        <div class=".img_serie_2">
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                        </div>

                        <a href="/singleSerie/<?= $data->id(); ?>"> Voir la série</a>
                    </p>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <button type="button" class="btn btn-outline-secondary">Voir toutes les series</button>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
