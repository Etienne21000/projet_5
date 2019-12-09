<?php
namespace App\Controller;

use App\Model\ImageManager;

class ImageController
{
    private $image;

    function __construct()
    {
        $this->image = new ImageManager();
    }

    //Display all images

    public function addImg($title, $image, $description, $id_serie, $id_expo)
    {
        $Image = new Image([$data]);

        $Image->setTitle($title);
        $Image->setImage($_FILE['image']['name']);
        $Image->setDescription($description);
        $Image->setIdSerie($id_serie);
        $Image->setIdExpo($id_expo);

        $this->image->addImage($Image);
    }

    public function upload()
    {
        if(isset($_FILE['image']))
        {
            $file = $_FILE['image'];

            $fileName = $_FILE['image']['name'];
            $fileSize = $_FILE['image']['size'];
            $fileTmp = $_FILE['image']['tmp'];
            $fileError = $_FILE['image']['error'];
            $fileType = $_FILE['image']['type'];

            $fileExt = explode('.', $fileName);
            $fileReExt = strtolower(end($fileExt));
            $allowedExt = ['jpg', 'jpeg', 'png', 'pdf'];

            if(in_array($fileReExt, $allowedExt))
            {
                if($fileError === 0)
                {
                    if($fileSize < 100000)
                    {
                        $fileDestination = "src/upload/" . $fileReExt;
                        move_uploaded_file($fileTmp, $fileDestination);
                    }
                    else
                    {
                        throw new \Exception("Image trop lourde");
                    }
                }
                else
                {
                    throw new \Exception("Il y a eu une erreur de téléchargement");
                }
            }

            else {
                throw new \Exception("Le type de fichier n'est pas valide");

            }
        }
    }

    public function getAllImages()
    {
        $Images = $this->image->GetAll();

        return $Images;
    }
}
