<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="content">
    <article class="gallery">
        <div class="titleh3">
            <h3>
                <?= htmlspecialchars($Serie->title()); ?>
            </h3>
        </div>

        <div class="date">
            (<?= htmlspecialchars($Serie->created_at()); ?>)
        </div>

        <div class="content_serie">
            <div>
                <?= html_entity_decode($Serie->tech()); ?>
            </div>

            <hr class="separation">

            <div>
                <?= html_entity_decode($Serie->description()); ?>
            </div>

        </div>

    </article>

    <div id="display_img">

        <aside id="open" aria-hidden="true">

            <div id="image_details"></div>

        </aside>

        <article class="images">

            <?php foreach ($Images as $data): ?>
                <div class="image_title">
                    <div class="single_img">
                        <a name="view" id="<?= $data->id(); ?>" class="js-form">
                            <img src="/public/upload/<?= htmlspecialchars($data->image()); ?>" alt="Serie boxes" class="img">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </article>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
