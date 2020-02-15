<?php $title = 'Stefano G. Bianchi Campo d\'Ombra'; ?>

<?php ob_start(); ?>

<section class="container">

    <div class="container">
        <div class="starter-template">
            <?php if (isset($_SESSION['id'])) { ?>
                <h1>Bonjour <?= $_SESSION['identifiant']; ?></h1>

            <?php } else { ?>
                <h1>Bonjour </h1>
            <?php }; ?>
            <p class="lead">Page d'aministration du site Campo d'Ombra.
                <br>Vous pouvez modifiez l'ensemble des données présentes sur le site.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="starter-template">

            <div class="titre">
                <h4>Choisissez l'image de la page d'accueil du site</h4>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col"> Date d'ajout</th>
                        <th scope="col">Image</th>
                        <th scope="col">Voir</th>
                        <th scope="col">Choisir</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($ImgAcc as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars($data->title()); ?></td>

                            <td><?= htmlspecialchars($data->image_date()); ?></td>

                            <td class="single_img2">
                                <div>
                                    <img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>">
                                </div>
                            </td>

                            <td>
                                <input type="button" class="btn btn-outline-primary" value="afficher" onclick="location.href='/getOneImg/<?= $data->id(); ?>'"/>
                            </td>

                            <td>
                                <form action="/chooseImage/<?= $data->id(); ?>" method="POST">
                                    <button type="submit" value="submit" name="submit" id="submit_btn" class="btn btn-outline-primary">choisir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="starter-template">
            <div class="titre">
                <h4>Toutes les images</h4>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col"> Date d'ajout</th>
                        <th scope="col">Image</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($Images as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars($data->title()); ?></td>

                            <td><?= htmlspecialchars($data->image_date()); ?></td>

                            <td class="single_img2">
                                <div>
                                    <img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>">
                                </div>
                            </td>

                            <td>
                                <input type="button" class="btn btn-outline-primary" value="afficher" onclick="location.href='/getOneImg/<?= $data->id(); ?>'"/>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="btnsuite">
                <a href="/UploadImg">
                    <input type="button" class="btn btn-outline-primary" value="Ajouter une image"/>
                </a>
                <a name="view" class="img-form">
                    <button type="button" class="btn btn-outline-secondary" id="btn_more">Voir toutes les images</button>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="starter-template">

            <div class="titre">
                <h4>Tous les billets</h4>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col"> Date de création</th>
                        <th scope="col"> Contenu</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($Posts as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars($data->title()); ?></td>

                            <td><?= htmlspecialchars($data->creation_date()); ?></td>

                            <td>
                                <?= substr(html_entity_decode($data->content()), 0, 60) . '...'; ?>
                            </td>

                            <td>
                                <input type="button" class="btn btn-outline-primary" value="afficher" onclick="location.href='/singlepost/<?= $data->id(); ?>'"/>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="btnsuite">
                <a href="/allPosts">
                    <input type="button" class="btn btn-outline-secondary" value="Voir tous les posts"/>
                </a>
            </div>
        </div>

    </div>

    <!--  -->

    <div class="containerAdmin">
        <div class="titre">
            <h4>Toutes les series</h4>
        </div>

        <section class="row serieRow">
            <?php foreach ($Series as $data): ?>
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
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>"
                            alt="<?= $data->title(); ?>"/>
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
            <?php foreach ($Expos as $data): ?>
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
                            <img src="public/upload/<?= htmlspecialchars($data->serie_img()); ?>"
                            alt="<?= $data->title(); ?>"/>
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

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'public/templateAdmin.php'; ?>
