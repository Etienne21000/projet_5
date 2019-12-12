<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<p>Bonjour</p>

<form action="index.php?action=addImage" method="POST" enctype="multipart/form-data">

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

                <option value="<?= $data->id(); ?>"> <?= $data->title(); ?></option>

            <?php endforeach; ?>

        </select>
    </p>

    <p>
        <label for="form-content">Description</label>
        <br>
        <textarea type="textarea" name="description" id="full-featured-non-premium" charset="utf-8"></textarea>
    </p>

    <p>
        <label for="Serie">Serie</label>
        <input type="checkbox" name="Serie" class="checkbox"/>
        <label for="Expo">Exposition</label>
        <input type="checkbox" name="Expo" class="checkbox"/>
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

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
