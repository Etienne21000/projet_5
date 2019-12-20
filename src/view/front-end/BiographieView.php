<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="blocAdmin">
    <article class="commentAdmin">
        <?php foreach ($Posts as $data): ?>
            <div class="titre">
                <h3>
                    <?= htmlspecialchars($data->title()); ?>
                </h3>
            </div>

            <p>
                <?= html_entity_decode($data->content()); ?>
            </p>

            <p class="suite">
                <a href="/postUpdate/<?= $data->id(); ?>">Mettre à jour</a>
            </p>
        <?php endforeach; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php';?>
