<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <?php foreach ($Posts as $data): ?>

        <div class="container">
            <div class="starter-template">
                <div class="titleh3">
                    <h3>
                        <?= htmlspecialchars($data->title()); ?>
                    </3>
                </div>

                <div class="date">
                    Créé le <?= htmlspecialchars($data->creation_date()); ?>
                </div>

                <div class="content_serie">
                    <p>
                        <?= html_entity_decode($data->content()); ?>
                    </p>
                </div>

                <a href="/postUpdate/<?= $data->id(); ?>">
                    <input type="button" class="btn btn-outline-primary" value="mettre à jour"/>
                </a>

                <a href="/deletePost/<?= $data->id(); ?>">
                    <input type="button" class="btn btn-outline-danger" value="supprimer"/>
                </a>

            </div>
            <hr class="separation">

        </div>

    <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
