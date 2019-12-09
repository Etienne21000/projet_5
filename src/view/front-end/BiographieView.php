<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<article class="blocAdmin">
    <article class="commentAdmin">
        <?php foreach ($Posts as $data): ?>
            <header class="titre">
                <h3>
                    <?= htmlspecialchars($data->title()); ?>
                </h3>
            </header>

            <?= htmlspecialchars($data->content()); ?>
            <p>
                <a href="index.php?action=postUpdate&id=<?= $data->id(); ?>">Mettre à jour</a>
            </p>
        <?php endforeach; ?>
    </article>
</article>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php';?>
