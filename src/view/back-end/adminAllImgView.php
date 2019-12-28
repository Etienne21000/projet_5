<div class="container">

    <div class="titre">
        <h4>Toutes les images</h4>
    </div>
    <section class="row imagesRow">
        <?php foreach($Images as $data):?>
            <div>
                <a name="view" value="view" id="<?= $data->id(); ?>" class="js-form">
                    <div class="col-xs-4 col-sm-3 col-md-2"><img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>"></div>
                </a>
                <!-- <a href="/deleteImg/<?php/* $data->id(); */?>" name="delete">
                <input type="button" name="delete" value="supprimer l'image" class="btn btn-outline-danger">
            </a> -->
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                supprimer l'image
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Supprimer <?= htmlspecialchars($data->title()); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes vous certain de vouloir supprimer
                        l'image
                        <?= htmlspecialchars($data->title()); ?>
                        <br>
                        Cette action est irreverssible, les images correspondant à cette série seront également supprimées.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/deleteImg/<?= htmlspecialchars($data->id()); ?>">
                            <input type="button" class="btn btn-danger" value="supprimer la serie"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<div>
    <!-- <a name="view" class="close">
    <button type="button" class="close_form" id="close"><i class="far fa-times-circle"></i></button>
</a> -->
<button type="button" class="close" id="close"><i class="far fa-times-circle"></i></button>

<!-- <a href="/adminHomePage" class="close" name="close"><i class="far fa-times-circle"></i></a> -->
</div>
<!-- </div> -->
</div>
