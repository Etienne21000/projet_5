<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="content">
    <article class="gallery">
        <div class="titleh3">
            <h3>
                <?= htmlspecialchars($serie->title()); ?>
            </3>
        </div>

        <div class="date">
            Création <?= htmlspecialchars($serie->creation_date()); ?>
        </div>

        <div class="content_serie">
            <!-- <div class="desc"> -->
            <p>
                <?= htmlspecialchars($serie->tech()); ?>
            </p>

            <hr class="separation">

            <p>
                <?= html_entity_decode($serie->description()); ?>
            </p>

            <p class="suite">
                <a href="index.php?action=serieUpdate&id=<?= $serie->id(); ?>"> Mettre à jour</a>
            </p>
            <!-- </div> -->
        </div>
    </article>

    <div id="display_img">

        <aside id="open" aria-hidden="true">

            <div id="image_details"></div>

        </aside>

        <article class="images">

            <?php foreach ($Images as $data): ?>
                <div class="image_title">
                    <div class="single_img">
                        <!-- <a href="index.php?action=singleImg&id=<?php/* $data->id(); */?>"> -->
                        <!-- <a href="#open" class="js-form"> -->
                        <a name="view" value="view" id="<?php echo $data->id(); ?>" class="js-form">
                            <!-- <a href="index.php?action=singleImg&id=<?php/* echo $data->id(); */?>"> -->
                            <img src="public/upload/<?= $data->image(); ?>" alt="Serie boxes" class="img">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </article>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
