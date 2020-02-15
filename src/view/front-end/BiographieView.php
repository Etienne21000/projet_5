<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="blocAdmin">
    <?php foreach ($Posts as $data): ?>

        <article class="commentAdmin">
            <div class="titleh3">
                <h3>
                    <?= htmlspecialchars($data->title()); ?>
                </h3>
            </div>

            <div>
                <?= html_entity_decode($data->content()); ?>
            </div>
            <hr class="separation">
        </article>
    <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php';?>
