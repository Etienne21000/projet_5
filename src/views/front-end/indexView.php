<?php $title= 'Jean Forteroche, Billet simple pour l\'Alaska'; ?>

<?php  ob_start(); ?>

<section class="body">
    <article id="banner">
        <!-- <div id="banner_title">
            <h1>STEFANO G BIANCHI</h1>
        </div> -->
        <div id="banner_image">
            <img src="src/public/images/Boxes_9_site_A.jpg" alt="Boxes 9"/>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'src/public/Template.php'; ?>
