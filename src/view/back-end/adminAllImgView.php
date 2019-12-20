<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="content">
    <article class="images">
        <div class="titre">
            <h4>
                Toutes les images
            </h4>
        </div>
        <?php foreach ($Images as $data):?>
            <div class="image_title">
                <div class="single_img">
                    <a href="/getOneImg/<?= $data->id(); ?>" name="<?= $data->title();?>">
                        <img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>">
                    </a>
                </div>
                <a href="/deleteImg/<?= $data->id(); ?>" name="delete">supprimer</a>
            </div>
        <?php endforeach; ?>

    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
