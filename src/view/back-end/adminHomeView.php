<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="starter-template">
        <h1>Espace administrateur du site</h1>
        <p class="lead">Use this document as a way to quickly start any new project.
            <br>All you get is this text and a mostly barebones HTML document.
        </p>
    </div>
</div>

<div class="container">
    <div class="titre">
        <h4>Toutes les images</h4>
    </div>
    <section class="row">
        <?php foreach($Images as $data):?>
            <div class="col-xs-4 col-sm-3 col-md-2"><img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>"></div>
        <?php endforeach; ?>
    </section>
</div>

<div class="container">
    <div class="titre">
        <h4>Tous les billets</h4>
    </div>
    <section class="row">
        <?php foreach($Posts as $data):?>
            <div class="col-xs-4 col-sm-3 col-md-2">
                <p>
                    <?= $data->title(); ?>
                    <a href="/<?= $data->id(); ?>"> Lire la suite</a>
                </p>
            </div>
        <?php endforeach; ?>
    </section>

    <div class="container">
        <div class="titre">
            <h4>Toutes les series</h4>
        </div>
        <section class="row">
            <?php foreach($Series as $data):?>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <p>
                        <?= $data->title(); ?>

                        <div class="img_serie">
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                        </div>

                        <a href="/<?= $data->id(); ?>"> Voir la série</a>
                    </p>
                </div>
            <?php endforeach; ?>
        </section>
</div>

<!-- <section class="row">
<div class="col-sm-8"><img src="/public/upload/<?php/* $image->image(); */?>" alt="<?php/* $image->title(); */?>"></div>
</section> -->





<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
