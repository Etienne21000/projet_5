<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="blocInfos">
	<section class="container">

		<div class="containerAdmin">
            <div class="titre">
    			<h4>
    				Créer une nouvelle exposition
    			</h4>
    		</div>
			<aside id="addSerie">
				<form action="/addExpo" method="POST">

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
						<textarea type="textarea" name="tech" cols="70" rows="30" class="textePost" id="full-featured-non-premium2"></textarea>
					</p>

					<p>
						<button type="submit" value="submit" name="submit" class="button1">Ajouter l'exposition'<i class="fas fa-pen-nib"></i></button>
					</p>

				</form>
			</aside>
		</div>
	</section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
