<?php $title = 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php ob_start(); ?>

<section class="body">
    <article id="banner">
        <div class="banner_image">
            <div class="slide">
                <div class="titreh1">
                    <h1> Campodombra </h1>
                </div>
                <img src="/public/upload/<?= $image->image(); ?>" alt="<?= $image->title(); ?>"/>
            </div>
            <?php /*foreach ($Images as $data): */ ?><!--
                <div class="slide">
                    <img src="/public/upload/<?php /*= htmlspecialchars($data->image()); */ ?>" alt="<?php /*= $data->title(); */ ?>"/>
                </div>
            --><?php /*endforeach; */ ?>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
