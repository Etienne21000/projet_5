<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="blocAdmin">
    <?php foreach ($Posts as $data): ?>

        <article class="commentAdmin">
            <div class="titre">
                <h3>
                    <?= htmlspecialchars($data->title()); ?>
                </h3>
            </div>

            <p>
                <?= html_entity_decode($data->content()); ?>
            </p>
            <hr class="separation">
        </article>
    <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php';?>
