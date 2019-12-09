<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article class="gallery">
        <div class="serie">

            <?php foreach ($Images as $data): ?>

            <header class="serie_title">
                <p>
                    <?= htmlspecialchars($data->title()); ?>
                </p>
            </header>

            <div class="imgContent">
                <div class="desc">
                    <?= $data->description(); ?>
                </div>

                <div class="img">
                    <?php ?>
                </div>
            </div>

        <?php endforeach; ?>

        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
