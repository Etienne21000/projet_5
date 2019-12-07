<?php
namespace App\Controller;

use App\Model\ImageManager;

class ImageController
{
    private $image;

    function __construct(argument)
    {
        $this->image = new ImageManager();
    }

    //Display all images

    public function addImg($title, $image, $description, $id_serie, $id_expo)
    {
        $Image = new Image([$data]);

        $Image->setTitle($title);
        $Image->setImage($image);
        $Image->setDescription($description);
        $Image->setIdSerie($id_serie);
        $Image->setIdExpo($id_expo);

        $this->image->addImage($Image);
    }
}
