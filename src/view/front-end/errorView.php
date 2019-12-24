<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                        <div class="error-details">
                            Désolé la page que vous demandez n'hexiste pas!
                        </div>
                        <div class="error-actions">
                            <a href="http://www.jquery2dotnet.com" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                                Accueil </a>
                                <a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $content = ob_get_clean(); ?>

            <?php require 'public/Template.php'; ?>
