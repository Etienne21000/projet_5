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

        <?php if(isset($_SESSION['id']) && isset($_SESSION['identifiant'])){?>

            <aside id="form" aria-hidden="true" class="titre-form">
                <article id="form-wrapper">
                    <!-- <i class="fas fa-times" id="cross"></i> -->
                    <div class="titre titre-form">
                        <h4>Laissez un commentaire</h4>
                    </div>
                    <form action="/addComment/<?= $serie->id(); ?>" method="POST">

                        <p>
                            <?php echo 'Pseudo : ' . $_SESSION['identifiant']; ?>
                        </p>

                        <p>
                            <label for="form-comment">Commentaire : </label>
                            <br>
                            <textarea name="comment" id="form-comment" placeholder="message" required></textarea>
                        </p>

                        <p>
                            <button type="submit" value="poster" name="submit" class="btn btn-outline-primary" id="submit_btn">poster</button>
                        </p>
                    </form>
                </article>
            </aside>

        <?php }
        else {?>
            <a href="/admin">
                <input type="button" class="btn btn-outline-primary" value="connexion"/>
            </a>
        <?php }?>

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
                            <img src="/public/upload/<?= htmlspecialchars($data->image()); ?>" alt="Serie boxes" class="img">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </article>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/Template.php'; ?>
