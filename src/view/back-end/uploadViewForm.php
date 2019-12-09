<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<p>Bonjour</p>

<form action="index.php?action=addImage" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="size" value="100000"/>

    <input type="file" name="image"/>


    <p>
        <label for="form-title">Titre</label>
        <br>
        <input type="text" name="title" id="form-title" placeholder="titre" required/>
    </p>

    <p>
        <label for="form-content">Description</label>
        <br>
        <textarea type="textarea" name="content" id="form-desc" placeholder="Description de l'image" required charset="utf-8"></textarea>
    </p>

    <p>
        <button type="submit" value="UploadImg" name="UploadImg" class="button2">Ajouter <i class="fas fa-paper-plane"></i></button>
    </p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
