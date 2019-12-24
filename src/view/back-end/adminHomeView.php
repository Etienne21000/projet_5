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
            <p class="lead">Use this document as a way to quickly start any new project.
                <br>All you get is this text and a mostly barebones HTML document.
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
        <div class="btnsuite">
            <a name="view" class="img-form">
                <button type="button" class="btn btn-outline-secondary">Voir toutes les images</button>
            </a>
        </div>
    </div>

    <section class="img_open">
    </section>

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

                        <a href="/<?= $data->id(); ?>"> Voir la série</a>
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
