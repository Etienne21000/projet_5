<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <?php foreach ($Comments as $data): ?>

        <div class="container">
            <div class="starter-template">
                <div class="titleh3">
                    <h3>
                        <?= htmlspecialchars($data->identifiant()); ?>
                    </3>
                </div>

                <div class="date">
                    Création <?= htmlspecialchars($data->comment_date()); ?>
                </div>

                <div class="content_serie">
                    <p>
                        <?= htmlspecialchars($data->comment()); ?>
                    </p>

                </div>

                <a href="/serieUpdate/<?= $data->id(); ?>">
                    <input type="button" class="btn btn-outline-danger" value="supprimer"/>
                </a>

            </div>
            <hr class="separation">

        </div>

    <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
