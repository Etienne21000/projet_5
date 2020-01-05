<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="blocAdmin">

        <article class="commentAdmin">
            <div class="titre">
                <h3>
                    Contacter STEFANO g BIANCHI
                </h3>
            </div>
            <hr class="separation">

            <p>
                tel : 01.56.56.56.56
                <br>
                mail : stefanobianchi@mail.com
            </p>
        </article>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
