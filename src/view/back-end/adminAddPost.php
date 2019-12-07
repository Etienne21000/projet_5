<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<article class="blocAdmin">
	<header class="titre">
		<h4>
			Ajouter un billet
		</h4>
	</header>

	<div class="content">
		<aside id="addPost">
			<form action="index.php?action=" method="POST">

				<p>
					<label for="form-content">Titre</label>
					<br>
					<input type="text" name="title" class="title" required placeholder="Titre"/>

				</p>
				<p>
					<label for="form-content">Contenu</label>
					<br>
					<textarea type="textarea" name="comment" cols="70" rows="30" id="textePost"></textarea>
				</p>

				<p>
					<button type="submit" value="submit" name="submit" class="button1">Editer <i class="fas fa-pen-nib"></i></button>
				</p>
			</form>
		</aside>
	</div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
