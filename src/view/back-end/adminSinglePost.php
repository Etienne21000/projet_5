<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="titre">
        <h4><?= htmlspecialchars($post->title()); ?></h4>
    </div>

    <article>
        <p>
            <?= html_entity_decode($post->content()); ?>
        </p>
    </article>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
