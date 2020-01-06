<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="blocInfos">
	<section class="container">
		<div class="titre">
			<h4>
				Mettre à jour la série
			</h4>
		</div>

		<div class="containerAdmin">
			<aside id="addSerie">
				<form action="/updateSerie/<?= $serie->id(); ?>" method="POST">

					<p>
						<label for="form-content">Titre</label>
						<br>
						<input type="text" name="title" class="titre" required value="<?= $serie->title();?>"/>
					</p>

					<p>
						<label for="id_img">Image de couverture</label>
						<br>
						<select name="id_img" class="id_img">
							
							<?php foreach ($Images as $data): ?>
								<option value="<?php echo $data->id(); ?>"> <?php echo $data->title(); ?></option>
							<?php endforeach; ?>

						</select>
					</p>

					<p>
						<label for="form-content">Description</label>
						<br>
						<textarea type="textarea" name="description" cols="70" rows="30" id="full-featured-non-premium" charset="utf-8"><?= $serie->description(); ?></textarea>
					</p>

					<p>
						<label for="form-content">Description technique</label>
						<br>
						<textarea type="textarea" name="tech" cols="70" rows="30" id="full-featured-non-premium2"><?= $serie->tech(); ?></textarea>
					</p>

					<p>
						<button type="submit" value="submit" name="submit" class="btn btn-outline-primary">Mettre à jour<i class="fas fa-pen-nib"></i></button>
					</p>

				</form>
			</aside>
		</div>
	</section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
