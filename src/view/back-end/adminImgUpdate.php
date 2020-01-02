<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="blocInfos">
    <section class="container">

        <div class="containerAdmin">
            <div class="titre">
                <h4>
                    Mettre à jour l'image
                </h4>
            </div>
            <div class="serie">
                <div class="serie_content">
                    <div class="img_serie">
                        <img src="/public/upload/<?= $image->image(); ?>" alt="<?= $image->title(); ?>">
                    </div>
                </div>
            </div>

            <aside id="updatePost">
                <form action="/updateImage/<?= $image->id(); ?>" method="POST">
                    <p>
                        <label for="form-content">Titre</label>
                        <br>
                        <input type="text" name="title" class="title" required placeholder="Titre" value="<?= $image->title();?>"/>
                    </p>

                    <p>
                        <label for="form-content">Contenu</label>
                        <br>
                        <textarea type="textarea" name="description" cols="70" rows="30" id="full-featured-non-premium"><?= $image->description(); ?></textarea>
                    </p>

                    <p>
                        <button type="submit" value="submit" name="submit" class="btn btn-outline-primary">Mettre à jour <i class="fas fa-pen-nib"></i></button>
                    </p>

                </form>
            </aside>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
