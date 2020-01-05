<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <div class="container">
        <div class="starter-template">
            <div class="titleh3">
                <h3>
                    <?= htmlspecialchars($serie->title()); ?>
                </3>
            </div>

            <div class="date">
                Création <?= htmlspecialchars($serie->creation_date()); ?>
            </div>

            <div class="content_serie">
                <!-- <div class="desc"> -->
                <p>
                    <?= html_entity_decode($serie->tech()); ?>
                </p>

                <hr class="separation">

                <p>
                    <?= html_entity_decode($serie->description()); ?>
                </p>

            </div>

            <a href="/serieUpdate/<?= $serie->id(); ?>">
                <input type="button" class="btn btn-outline-primary" value="mettre à jour la série"/>
            </a>

            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                supprimer la serie
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Supprimer <?= htmlspecialchars($serie->title()); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Êtes vous certain de vouloir supprimer
                            la série
                            <?= htmlspecialchars($serie->title()); ?>
                            <br>
                            Cette action est irreverssible, les images correspondant à cette série seront également supprimées.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/deleteSerie/<?= $serie->id(); ?>">
                                <input type="button" class="btn btn-danger" value="supprimer la serie"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="separation">

            <div id="display_img">

                <div class="titleh3">
                    <h3>
                        Images associées à la série <?= htmlspecialchars($serie->title()); ?>
                    </h3>
                </div>

                <article class="images">

                    <?php foreach ($Images as $data): ?>
                        <div class="image_title">
                            <div class="single_img">
                                <a href="/getOneImg/<?= $data->id(); ?>">
                                    <img src="/public/upload/<?= htmlspecialchars($data->image()); ?>" alt="Serie boxes" class="img">
                                </a>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </article>
            </div>

            <hr class="separation">

            <div class="comments">

                <h4>Les commentaires <i class="fas fa-comments"></i></h4>
                <?php foreach ($Comments as $data): ?>

                    <div class="row comment-row">
                        <div class="col-md-8">
                            <div class="media g-mb-30 media-comment">
                                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                    <div class="g-mb-15">
                                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><?= htmlspecialchars($data->identifiant()); ?></h5>
                                        <span class="g-color-gray-dark-v4 g-font-size-12"><?= htmlspecialchars($data->comment_date()); ?></span>
                                    </div>
                                    <p><?= htmlspecialchars($data->comment()); ?></p>
                                </div>
                                <a href="/reportCom/<?= $data->id(); ?>">Signaler</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
