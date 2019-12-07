<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article class="gallery">
        <div class="serie">
            <p>
                Boxes
            </p>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'src/public/Template.php'; ?>
