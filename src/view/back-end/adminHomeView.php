<?php $title= 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php  ob_start(); ?>

<section class="container">

    <div class="container">
        <div class="starter-template">
            <?php if(isset($_SESSION['id'])){?>
                <h1>Bonjour <?= $_SESSION['identifiant']; ?></h1>

            <?php } else {?>
                <h1>Bonjour </h1>
            <?php }; ?>
            <p class="lead">Bienvenue sur la page d'aministration du site Campo d'Ombra.
                <br>Vous pouvez modifiez l'ensemble des données présentes sur le site.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="starter-template">
            <div class="titre">
                <h4>Choisissez la série du slider</h4>
            </div>
            <?php foreach ($Series as $data): ?>
                <form action="/chooseSerie/<?=$data->id(); ?>" method="POST">
                <?php endforeach; ?>

                <p>
                    <label for="id_img">Série</label>
                    <br>
                    <select name="id_img" class="id_img">
                        <option value="">Choissiez la série</option>

                        <?php foreach ($Series as $data): ?>

                            <option value="<?php echo $data->id(); ?>"> <?php echo $data->title(); ?></option>

                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <button type="submit" value="submit" name="submit" id="submit_btn">slider</button>
                </p>
            </form>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les images</h4>
        </div>
        <section class="row imagesRow">
            <?php foreach($Images as $data):?>
                <div class="serie">
                    <a href="/getOneImg/<?= $data->id(); ?>">
                        <span class="calque">

                            <p>
                                <?= $data->title(); ?>
                            </p>

                        </span>
                    </a>
                    <div class="serie_content">

                        <div class="img_serie">
                            <img src="/public/upload/<?= $data->image(); ?>" name="<?= $data->title(); ?>" alt="<?= $data->title(); ?>">
                        </div>

                    </div>

                </div>
            <?php endforeach; ?>

        </section>

        <div class="btnsuite">
            <a name="view" class="img-form">
                <button type="button" class="btn btn-outline-secondary" id="btn_more">Voir toutes les images</button>
            </a>
        </div>

    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Tous les billets</h4>
        </div>

        <section class="row serieRow">
            <?php foreach($Posts as $data):?>
                <div class="serie">

                    <a href="/singlepost/<?= $data->id(); ?>">
                        <span class="calque">

                            <p>
                                <?= $data->title(); ?>
                            </p>

                        </span>
                    </a>

                    <div class="serie_content">

                        <div class="img_serie">
                            <p>
                                <?= substr(html_entity_decode($data->content()), 0, 530) . '...'; ?>
                            </p>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <a href="/allSeries">
                <input type="button" class="btn btn-outline-secondary" value="Voir tous les posts"/>
            </a>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les series</h4>
        </div>

        <section class="row serieRow">
            <?php foreach($Series as $data):?>
                <div class="serie">

                    <a href="/getOneSerie/<?= $data->id(); ?>/<?= $data->slug(); ?>">
                        <span class="calque">

                            <p>
                                <?= $data->title(); ?>
                            </p>

                        </span>
                    </a>

                    <div class="serie_content">

                        <div class="img_serie">
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <a href="/allSeries">
                <input type="button" class="btn btn-outline-secondary" value="Voir toutes les séries"/>
            </a>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les expositions</h4>
        </div>

        <section class="row serieRow">
            <?php foreach($Expos as $data):?>
                <div class="serie">

                    <a href="/getOneSerie/<?= $data->id(); ?>/<?= $data->slug(); ?>">
                        <span class="calque">

                            <p>
                                <?= $data->title(); ?>
                            </p>

                        </span>
                    </a>

                    <div class="serie_content">

                        <div class="img_serie">
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>" alt="<?= $data->title(); ?>"/>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <a href="/allExpos">
                <input type="button" class="btn btn-outline-secondary" value="Voir toutes les expositions"/>
            </a>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Tous les commentaires</h4>
        </div>

        <section class="row serieRow">
            <?php foreach($Comments as $data):?>
                <div class="comment">
                    <div class="content_comment">
                        <p>
                            <?= $data->identifiant(); ?>
                            <br>
                            <?= $data->comment_date(); ?>
                        </p>

                        <p>
                            <?= htmlspecialchars($data->comment()); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <a href="/allComments">
                <input type="button" class="btn btn-outline-secondary" value="Voir tous les commentaires"/>
            </a>
        </div>
    </div>

    <div class="containerAdmin">
        <div class="titre">
            <h4>Tous les commentaires signalés</h4>
        </div>

        <section class="row serieRow">
            <?php foreach($Reported as $data):?>
                <div class="comment">
                    <div class="content_comment">
                        <p>
                            <?= $data->identifiant(); ?>
                            <br>
                            <?= $data->comment_date(); ?>
                        </p>

                        <p>
                            <?= htmlspecialchars($data->comment()); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="btnsuite">
            <a href="/reportedComments">
                <input type="button" class="btn btn-outline-secondary" value="Voir tous les commentaires signalés"/>
            </a>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
