<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="content">
    <article class="gallery">
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
                <?= htmlspecialchars($serie->tech()); ?>
            </p>

            <hr class="separation">

            <p>
                <?= html_entity_decode($serie->description()); ?>
            </p>

            <?php if(isset($_SESSION['id'])):?>
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
        <?php endif; ?>
        <!-- </div> -->
    </div>
</article>

<div id="display_img">

    <aside id="open" aria-hidden="true">

        <div id="image_details"></div>

    </aside>

    <article class="images">

        <?php foreach ($Images as $data): ?>
            <div class="image_title">
                <div class="single_img">
                    <a name="view" value="view" id="<?= $data->id(); ?>" class="js-form">
                        <img src="/public/upload/<?= $data->image(); ?>" alt="Serie boxes" class="img">
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </article>

</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
