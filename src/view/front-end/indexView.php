<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article id="banner">
        <div id="banner_image">
            <!-- <img src="/public/images/Boxes9siteA.jpg" alt="Boxes 9"/> -->
            <?php foreach ($Images as $data): ?>
                <ul>
                    <li class="slide"><img src="/public/upload/<?= htmlspecialchars($data->image()); ?>" alt="<?= $data->title(); ?>"/></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
