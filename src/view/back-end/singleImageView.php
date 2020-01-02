<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <div class="container">
        <div class="title">
            <h4>
                <?= $image->title(); ?>
            </h4>
        </div>
        <div class="starter-template">

            <div class="singleImg">
                <img src="/public/upload/<?= $image->image(); ?>" alt="<?= $image->title(); ?>" class="img">
            </div>

            <p>
                <?= html_entity_decode($image->description()); ?>
            </p>

            <div class="actions">

                <a href="/imgUpdate/<?= $image->id(); ?>">
                    <input type="button" class="btn btn-outline-primary" value="mettre à jour l'image"/>
                </a>

                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteImg">
                    supprimer l'image <?= htmlspecialchars($image->title()); ?>
                </button>

                <div class="modal fade" id="DeleteImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Supprimer <?= htmlspecialchars($image->title()); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Êtes vous certain de vouloir supprimer
                                la série
                                <?= htmlspecialchars($image->title()); ?>
                                <br>
                                Cette action est irreverssible, les images correspondant à cette série seront également supprimées.
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <a href="/deleteImg/<?= $image->id(); ?>">
                                    <input type="button" class="btn btn-danger" value="supprimer l'image"/>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>

<!-- </div> -->
