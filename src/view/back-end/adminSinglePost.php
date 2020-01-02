<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="blocInfos">

    <div class="container">

        <div class="containerAdmin">

            <div class="titre">
                <h4><?= htmlspecialchars($post->title()); ?></h4>
            </div>

            <article>
                <p>
                    <?= html_entity_decode($post->content()); ?>
                </p>
            </article>
            
            <a href="/postUpdate/<?= $post->id(); ?>">
                <input type="button" class="btn btn-outline-primary" value="mettre à jour le post"/>
            </a>

            <a href="/deletePost/<?= $post->id(); ?>">
                <input type="button" class="btn btn-outline-danger" value="supprimer le post"/>
            </a>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
