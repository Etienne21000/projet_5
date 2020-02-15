<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="blocInfos">
    <section class="container">

        <div class="containerAdmin">

            <div class="titre">
                <h4>
                    Ajouter une image
                </h4>
            </div>

            <form action="/addImg" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="fileSize" value="8000000"/>

                <input type="file" name="image"/>

                <p>
                    <label for="form-title">Titre</label>
                    <br>
                    <input type="text" name="title" id="form-title" placeholder="titre" required/>
                </p>
                <p>
                    <label for="id_serie">Serie</label>
                    <br>
                    <select name="id_serie" class="id_serie">
                        <option value="">Choissiez la série correspondante</option>

                        <?php foreach ($Series as $data): ?>

                            <option value="<?php echo $data->id(); ?>"> <?php echo $data->title(); ?></option>

                        <?php endforeach; ?>

                        <?php foreach ($Expos as $data): ?>

                            <option value="<?php echo $data->id(); ?>"> <?php echo $data->title(); ?></option>

                        <?php endforeach; ?>

                    </select>

                </p>

                <p>
                    <label for="img_acc">Définir comme image page d'accueil</label>
                    <br>
                    <select name="img_acc" class="img_acc">
                        <option value="1">Non</option>
                        <option value="2">Oui</option>
                    </select>
                </p>

                <p>
                    <label for="form-content">Description</label>
                    <br>
                    <textarea type="textarea" name="description" id="full-featured-non-premium" charset="utf-8"></textarea>
                </p>

                <p>
                    <button type="submit" value="upload" name="submit" class="button2">Ajouter <i class="fas fa-paper-plane"></i></button>
                </p>

                <?php if($error) {?>
                    <p id="error">
                        <?= $error; ?>
                    </p>
                <?php } ?>

            </form>

        </div>
    </section>
</div>



<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
