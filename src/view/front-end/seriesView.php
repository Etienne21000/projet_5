<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article class="all_gallery">

        <?php foreach ($Series as $data): ?>

            <div class="serie">

                <div class="serie_title">
                    <p>
                        <?= htmlspecialchars($data->title()); ?>
                    </p>
                </div>

                <div class="serie_content">
                    <p>
                        <?= substr(html_entity_decode($data->description()), 0, 300) . '...'; ?>
                    </p>

                    <p>
                        <?= htmlspecialchars($data->tech()); ?>
                    </p>

                    <p>
                        <?= htmlspecialchars($data->creation_date()); ?>
                    </p>

                    <p class="suite">
                        <a href="index.php?action=singleSerie&id=<?= $data->id(); ?>">Voir la série <?= $data->title(); ?></a>
                    </p>
                </div>

                <div class="serie_content">

                    

                </div>

            </div>

        <?php endforeach; ?>

    </article>

    <article class="images">
        <?php foreach ($Images as $data): ?>
            <div class="image_title">
                <p>
                    <?= htmlspecialchars($data->title());?>
                </p>
                <img src="public/upload/<?= $data->image(); ?>" alt="Serie boxes" class="img">
            </div>
        <?php endforeach; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
