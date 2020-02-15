<?php $title= 'Reset password'; ?>

<?php  ob_start(); ?>

<section class="bodyForm">

    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Réinitialisation du mot de passe</h3>
                <!-- <p><a href="/inscription">Pas encore inscrit ?</a></p> -->
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="mail" class="form-control" placeholder="Votre email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Réinitialiser" />
                    </div>

                    <?php if($error)
                    {?>
                        <p class="p-3 mb-2 bg-danger text-white">
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
