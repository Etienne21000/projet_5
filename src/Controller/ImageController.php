<?php
namespace App\Controller;

use App\Model\ImageManager;
use App\Model\Image;

class ImageController
{
    private $image;

    function __construct()
    {
        $this->image = new ImageManager();
    }

    //Display all images

    public function addImg($title, $image, $description, $id_serie)
    {
        $Image = new Image([$data]);

        $Image->setTitle($title);
        $Image->setImage($image);
        // $Image->setImage($_FILES['image']['name']);
        $Image->setDescription($description);
        $Image->setIdSerie($id_serie);
        // $Image->setIdExpo($id_expo);

        if(!$_FILES['image']['error'])
        {
            $this->upload();
        }

        $this->image->addImage($Image);
    }

    public function getImgBySeries($id_serie)
    {
        $Images = $this->image->getImgBySerie($id_serie);

        return $Images;
    }

    public function getFirstImg($id_serie)
    {
        $Image = $this->image->getImgBySerie($id_serie, $start = 0, $limit = 1);

        return $Image;
    }

    function upload()
    {
        $error = null;

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0)
        {
            if($_FILES['image']['size'] <= 8000000)
            {
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extUpload = $fileInfo['extension'];
                $validExt = array('jpg', 'jpeg', 'png', 'gif');

                if(in_array($extUpload, $validExt))
                {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/upload/' .
                    basename($_FILES['image']['name']));

                    echo "image envoyée";

                    header('Refresh: 2; url: index.php?action=series');
                }

                else
                {
                    $error = 3;
                }
            }

            else
            {
                $error = 2;
            }
        }

        else
        {
            $error = 1;
        }

        switch ($error)
        {
            case 1:
            $error = "* Aucune image à importer";
            break;

            case 2:
            $error = "* Le fichier est trop volumineux (il ne doit pas dépasser 8Mo)";
            break;

            case 3:
            $error = "* Le type de fichier est invalide (seuls les fichiers jpg, jpeg, png et gif sont autorisés)";

        }
    }

    public function getAllImages()
    {
        $Images = $this->image->GetAll();

        return $Images;
    }

    public function getOne($id)
    {
        $image = $this->image->getOneImg($id);

        return $image;
    }
}
