<div class="container">
    <div class="starter-template">
        <div class="titre">
            <h4>Toutes les images</h4>
        </div>
        <!-- <section class="images">
        <div class="example-wrapper"> -->
        <h1> Toutes les images</h1>

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

    </div>
</div>
