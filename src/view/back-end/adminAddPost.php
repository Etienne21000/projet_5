<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="blocInfos">
	<section class="container">
		<div class="containerAdmin">
			<div class="titre">
				<h4>
					Ajouter un billet
				</h4>
			</div>
			<aside id="addPost">
				<form action="/newPost" method="POST">

					<p>
						<input type="text" name="title" class="title" required placeholder="Titre"/>
					</p>

					<p>
						<input type="texte" name="slug" class="title" required placeholder="type"/>
					</p>

					<p>
						<textarea type="textarea" name="content" cols="70" rows="30" id="full-featured-non-premium">Commencez à écrire...</textarea>
					</p>

					<p>
						<button type="submit" value="submit" name="submit" class="button1">Ajouter <i class="fas fa-pen-nib"></i></button>
					</p>

				</form>
			</aside>
		</div>

	</section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
