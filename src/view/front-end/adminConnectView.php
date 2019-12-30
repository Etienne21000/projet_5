<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="bodyForm">

    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Connexion administration du site</h3>
                <p><a href="/inscription">Pas encore inscrit ?</a></p>
                <form action="/connectuser" method="POST">

                    <div class="form-group">
                        <input type="text" name="identifiant" class="form-control" placeholder="Identifiant *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Mot de passe *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Connexion" />
                    </div>
                    <div class="form-group">
                        <a href="#" class="ForgetPwd">Mot de passe oublié ?</a>
                    </div>

                    <?php if($error)
                    {?>
                        <p id="error">
                            <?php echo $error;?>
                        </p>
                    <?php	}?>

                </form>
            </div>
        </div>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
