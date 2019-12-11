<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="content">
    <article class="gallery">
        <div class="serie_title">
            <p>
                <?= htmlspecialchars($serie->title()); ?>
            </p>
        </div>

        <div class="content_serie">
            <!-- <div class="desc"> -->
            <p>
                <?= html_entity_decode($serie->description()); ?>
            </p>
            <!-- </div> -->

            <!-- <div class="tech"> -->
            <p>
                <?= htmlspecialchars($serie->tech()); ?>
            </p>

            <p>
                <?= htmlspecialchars($serie->creation_date()); ?>
            </p>

            <p>
                <a href="index.php?action=serieUpdate&id=<?= $serie->id(); ?>"> Mettre à jour</a>
            </p>
            <!-- </div> -->
        </div>
    </article>

    <article class="images">
        <?php foreach ($Images as $data): ?>
            <div class="image_title">
                <!-- <div class="p">
                <?php /*htmlspecialchars($data->title());*/ ?>
            </div> -->

            <div class="single_img">
                <!-- <a href="index.php?action=singleImg&id=<?php/* $data->id(); */?>"> -->
                <a href=".open">
                    <img src="public/upload/<?= $data->image(); ?>" alt="Serie boxes" class="img">
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="open">
        <p>
            <?= $image->title(); ?>
        </p>

        <p>
            <?= $image->image_date(); ?>
        </p>
        <div>
            <img src="public/upload/<?= $image->image(); ?>" alt="<?= $image->title(); ?>" class="img">
        </div>

        <p>
            <?= html_entity_decode($image->description()); ?>
        </p>

    </div>
</article>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
