<div class="container">
    <div class="container">
        <div class="starter-template">
            <div class="titre">
                <h4>Toutes les images</h4>
            </div>
            <section class="images">
                <?php foreach($Images as $data):?>
                    <div class="image_title">

                        <div class="single_img">
                            <a href="/getOneImg/<?= $data->id(); ?>">
                                <div>
                                    <img src="/public/upload/<?= $data->image(); ?>" alt="<?= $data->title(); ?>">
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Modal -->

                <?php endforeach; ?>
            </section>

        </div>
    </div>

    <div>
        <a href="/adminHomePage" class="close" name="close"><i class="far fa-times-circle"></i></a>
    </div>
</div>
