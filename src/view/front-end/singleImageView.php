<?php
if(isset($_GET['image_id'])): ?>

<!-- <div id="image_details"> -->


        <p>
            <?= $image->title(); ?>
        </p>

        <p>
            <?= $image->image_date(); ?>
        </p>
        <div>
            <img src="public/upload/<?= $image->image(); ?>" alt="<?= $image->title(); ?>" class="img">
        </div>

        <p>
            <?= html_entity_decode($image->description()); ?>
        </p>


<!-- </div> -->

<?php endif; ?>
