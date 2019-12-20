<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="content">
    <article class="images">
        <div class="titre">
            <h4>
                <?= $image->title(); ?>
            </h4>
        </div>

        <div>
            <img src="/public/upload/<?= $image->image(); ?>" alt="<?= $image->title(); ?>" class="img">
        </div>

        <p>
            <?= html_entity_decode($image->description()); ?>
        </p>

        <!-- Add serie name -->

        <div class="actions">
            <input type="button" class="button1 updateImg" href="/<?= $image->id(); ?>" value="Modifier"/>
            <input type="button" class="button2 suppImg" href="/<?= $image->id(); ?>" value="Supprimer"/>
        </div>

    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>

<!-- </div> -->
