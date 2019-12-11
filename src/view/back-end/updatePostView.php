<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<article class="blocAdmin">
	<div class="titre">
		<h4>
			Ajouter un billet
		</h4>
	</div>

	<div class="content">
		<aside id="updatePost">
			<form action="index.php?action=updatePost&id=<?= $post->id(); ?>" method="POST" charset="utf-8">
				<p>
					<label for="form-content">Titre</label>
					<br>
					<input type="text" name="title" class="title" required placeholder="Titre" value="<?= $post->title();?>"/>
				</p>

				<p>
                    <?= $post->slug(); ?>
				</p>

				<p>
					<label for="form-content">Contenu</label>
					<br>
					<textarea type="textarea" name="content" cols="70" rows="30" id="full-featured-non-premium" charset="utf-8"><?= $post->content();?></textarea>
				</p>

				<p>
					<button type="submit" value="submit" name="submit" class="button1">Mettre à jour <i class="fas fa-pen-nib"></i></button>
				</p>

			</form>
		</aside>
	</div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
