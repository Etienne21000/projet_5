<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">

    <div class="title">
        <h3>
            SERIES
        </h3>
    </div>

    <article class="all_gallery">

        <?php foreach ($Series as $data): ?>

            <div class="serie">

                <a href="/singleSerie/<?= $data->id(); ?>/<?= $data->slug(); ?>">
                    <div class="calque">

                        <p>
                            <?= $data->title(); ?>
                        </p>

                    </div>
                </a>

                <div class="serie_content">

                    <div class="img_serie">
                        <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                    </div>

                </div>
            </div>

        <?php endforeach; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
