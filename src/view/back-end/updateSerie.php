<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<article class="blocAdmin">
	<div class="titre">
		<h4>
			Mettre à jour la série
		</h4>
	</div>

	<div class="content">
		<aside id="addSerie">
			<form action="index.php?action=updateSerie&id=<?= $serie->id(); ?>" method="POST">

				<p>
					<label for="form-content">Titre</label>
					<br>
					<input type="text" name="title" class="title" required value="<?= $serie->title();?>"/>
				</p>

                <p>
					<label for="form-content">Description</label>
					<br>
					<textarea type="textarea" name="description" cols="70" rows="30" id="full-featured-non-premium" charset="utf-8"><?= $serie->description(); ?></textarea>
				</p>

				<p>
					<label for="form-content">Description technique</label>
					<br>
					<textarea type="textarea" name="tech" cols="70" rows="30"><?= $serie->tech(); ?></textarea>
				</p>

				<p>
					<button type="submit" value="submit" name="submit" class="button1">Mettre à jour<i class="fas fa-pen-nib"></i></button>
				</p>

			</form>
		</aside>
	</div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
