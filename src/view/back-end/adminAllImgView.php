<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les images</h4>
        </div>
        <section class="row imagesRow">
            <?php foreach($Images as $data):?>
                <!-- <a href="/getOneImg/<?php/* $data->id(); */?>" name="<?php/* $data->title();*/?>"> -->
                    <a name="view" value="view" id="<?= $data->id(); ?>" class="js-form">
                    <div class="col-xs-4 col-sm-3 col-md-2"><img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>"></div>
                </a>
                <a href="/deleteImg/<?= $data->id(); ?>" name="delete">supprimer</a>
            <?php endforeach; ?>
        </section>

        <div class="close">
            <a href="/adminHomePage" class="close" name="close"><i class="far fa-times-circle"></i></a>
        </div>

    </div>

    <!-- <?php/* foreach ($Images as $data):*/?>
    <div class="image_title">
    <div class="single_img">
    <a href="/getOneImg/<?php/* $data->id(); */?>" name="<?php/* $data->title();*/?>">
    <img src="/public/upload/<?php/* $data->image(); */?>" alt="<?php/* $data->title(); */?>">
</a>
</div>
<a href="/deleteImg/<?php/* $data->id(); */?>" name="delete">supprimer</a>
</div>
<?php/* endforeach; */?>
-->

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
