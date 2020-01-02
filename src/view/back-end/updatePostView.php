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
			<aside id="updatePost">
				<form action="/updatePost/<?= $post->id(); ?>" method="POST" charset="utf-8">
					<p>
						<label for="form-content">Titre</label>
						<br>
						<input type="text" name="title" class="title" required placeholder="Titre" value="<?= $post->title();?>"/>
					</p>

					<p>
						<label for="form-content">Contenu</label>
						<br>
						<textarea type="textarea" name="content" cols="70" rows="30" id="full-featured-non-premium"><?= $post->content();?></textarea>
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
