<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article id="banner">
        <div class="banner_image">
            <?php foreach($Series as $data):?>
                <?= $data->title(); ?>
            <?php endforeach; ?>
            <!-- <img src="/public/images/Boxes9siteA.jpg" alt="Boxes 9"/> -->
            <?php foreach ($Images as $data): ?>
                <div class="slide">
                    <img src="/public/upload/<?= htmlspecialchars($data->image()); ?>" alt="<?= $data->title(); ?>"/>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
    <div class="btn">
        <button class="precedent">précédent</button>
        <button class="suivant">suivant</button>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
