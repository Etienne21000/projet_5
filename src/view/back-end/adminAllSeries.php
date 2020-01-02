<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>
<section class="container">
    <div class="containerAdmin">
        <div class="titleSerie">
            <h3>
                TOUTES LES SERIES
            </h3>
        </div>

        <section class="row serieRow">
            <?php foreach ($Series as $data): ?>
                <div class="serie">

                    <a href="/getOneSerie/<?= $data->id(); ?>/<?= $data->slug(); ?>">
                        <span class="calque">

                            <p>
                                <?= $data->title(); ?>
                            </p>

                        </span>
                    </a>

                    <div class="serie_content">

                        <div class="img_serie">
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
