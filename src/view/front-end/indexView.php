<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article id="banner">
        <div class="banner_image">

            <!-- <img src="/public/images/Boxes9siteA.jpg" alt="Boxes 9"/> -->
            <?php foreach ($Images as $data): ?>
                <div class="slide">
                    <img src="/public/upload/<?= htmlspecialchars($data->image()); ?>" alt="<?= $data->title(); ?>"/>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
