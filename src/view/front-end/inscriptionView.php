<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="bodyForm">

    <div class="container login-container">
        <div class="row">

            <div class="col-md-6 login-form-1">
                <h3>Inscription au B-O</h3>

                <form action="/userinscription" method="POST">

                    <div class="form-group">
                        <input type="text" name="identifiant" class="form-control" placeholder="Identifiant *"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="mail" class="form-control" placeholder="email *"/>
                    </div>

                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Mot de passe *"/>
                    </div>

                    <div class="form-group">
                        <input type="password" name="confirmePass" class="form-control" placeholder="Confirmer le mot de passe *"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Inscription" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
