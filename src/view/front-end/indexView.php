<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article id="banner">
        <div id="banner_image">
            <img src="/public/images/Boxes9siteA.jpg" alt="Boxes 9"/>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
