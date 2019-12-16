<?php
namespace App\Controller;

use App\Controller\PostController;
use App\Controller\ImageController;
use App\Controller\SerieController;

class MasterController
{
    private $postController;
    private $imageController;
    private $serieController;

    public function __construct()
    {
        $this->postController = new PostController();
        $this->imageController = new ImageController();
        $this->serieController = new SerieController();
    }

    public function home()
    {
        require 'src/view/front-end/indexView.php';
    }

    public function series()
    {
        $Series = $this->serieController->getAll();
        $Images = $this->imageController->getAllImages();

        // $serie = $this->serieController->getOne($_GET['id']);
        // $Images = $this->imageController->getImgBySeries($_GET['id']);
        // $image = $this->imageController->getOne($_GET['id']);

        require 'src/view/front-end/seriesView.php';
    }

    public function singleSerie()
    {
        $serie = $this->serieController->getOne($_GET['id']);
        $Images = $this->imageController->getImgBySeries($_GET['id']);
        $image = $this->imageController->getOne($_GET['id']);

        require 'src/view/front-end/singleSerieView.php';
    }

    public function singleImg()
    {
        $image = $imageController->getOne($_GET['id']);

        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            $img = [
                'id' => $image->id(),
                'title' => $image->title(),
                'date' => $image->image_date(),
                'image' => $image->image(),
                'description' => strip_tags(html_entity_decode($image->description())),
            ];

            header('Content-Type: application/json');

            echo json_encode($img);
        }
    }

    public function bio()
    {
        $Posts = $this->postController->getAllPost();

        require 'src/view/front-end/BiographieView.php';
    }

    public function UploadImg()
    {
        $error = null;
        $Series = $this->serieController->getAll();
        require 'src/view/back-end/uploadViewForm.php';
    }

    public function addImg()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image']['name']) && !empty($_POST['id_serie']))
        {
            $imageController->addImg(htmlspecialchars($_POST['title']), htmlspecialchars($_FILES['image']['name']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['id_serie']));
        }

        else
        {
            throw new \Exception("Impossible de charger l'image (router)");
        }

        header('Location: index.php?action=Accueil');
    }

    public function addPost()
    {
        require 'src/view/back-end/adminAddPost.php';
    }

    public function newPost()
    {
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['slug']))
        {
            $postController->createPost(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['slug']));
        }

        else
        {
            throw new \Exception("Impossible d'ajouter le post");
        }

        header('Location: index.php?action=Accueil');
    }

    public function postUpdate()
    {
        $post = $postController->getPost($_GET['id']);

        require 'src/view/back-end/updatePostView.php';
    }

    public function updatePost()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(!empty($_POST['content']) && !empty($_POST['title']))
            {
                //Installer systeme de vérification du formulaire
                $postController->update($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
            }

            else
            {
                throw new \Exception("Impossible de mettre à jour");
            }
        }

        else
        {
            throw new \Exception("Aucun identifiant de billet");
        }

        header('Location: index.php?action=Bio');
    }

    public function serieAdd()
    {
        $Images = $imageController->getAllImages();

        require 'src/view/back-end/AddSerieView.php';
    }

    public function addSerie()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech']) && !empty($_POST['serie_img']))
        {
            $serieController->newSerie(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['serie_img']));
            $image = $imageController->getOneImg($_GET['id']);
        }

        else
        {
            throw new \Exception("Impossible d'ajouter cette série");
        }

        header('Location: index.php?action=Accueil');
    }

    public function serieUpdate()
    {
        $serie = $this->serieController->getOne($_GET['id']);
        $Images = $this->imageController->getImgBySeries($_GET['id']);

        require 'src/view/back-end/updateSerie.php';
    }

    public function updateSerie()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech'])/* && !empty($_POST['serie_img'])*/)
            {
                // $Images = $imageController->getImgBySeries($_GET['id']);
                $serieController->update($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['id_img']));
            }

            else
            {
                throw new \Exception("Impossible de mettre à jour cette série");
            }
        }

        else
        {
            throw new \Exception("Aucun identifiant envoyé");

        }

        header('Location: index.php?action=series');
    }
}
