<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<article class="blocAdmin">
	<div class="titre">
		<h4>
			Créer une nouvelle série
		</h4>
	</div>

	<div class="content">
		<aside id="addSerie">
			<form action="index.php?action=addSerie" method="POST">

				<p>
					<label for="form-content">Titre</label>
					<br>
					<input type="text" name="title" class="title" required placeholder="Titre"/>
				</p>

                <p>
					<label for="form-content">Description</label>
					<br>
					<textarea type="textarea" name="description" cols="70" rows="30" id="full-featured-non-premium" charset="utf-8"></textarea>
				</p>

				<p>
					<label for="form-content">Description technique</label>
					<br>
					<textarea type="textarea" name="tech" cols="70" rows="30" class="textePost"></textarea>
				</p>

				<p>
					<button type="submit" value="submit" name="submit" class="button1">Ajouter la série<i class="fas fa-pen-nib"></i></button>
				</p>

			</form>
		</aside>
	</div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
