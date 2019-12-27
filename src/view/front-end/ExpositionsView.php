<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">

    <div class="title">
        <h3>
            Expositions
        </h3>
    </div>

    <article class="all_gallery">

        <?php foreach ($Expos as $data): ?>

            <div class="serie">

                <a href="/singleSerie/<?= $data->id(); ?>">
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
                    <!-- <p class="suite"> -->
                </div>                <!-- </p> -->
            </div>
        <?php endforeach; ?>

        <div class="btnsuite">
            <button type="button" class="btn btn-outline-secondary">Voir toutes les séries</button>
        </div>

    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
