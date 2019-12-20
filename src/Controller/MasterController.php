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


    /*----------------------------------------------------
    Front Master Controller
    ---------------------------------------------------- */
    public function home()
    {
        require 'src/view/front-end/indexView.php';
    }

    public function series()
    {
        $Series = $this->serieController->getAll();
        $Images = $this->imageController->getAllImages();

        // $serie = $this->serieController->getOne($id);
        // $Images = $this->imageController->getImgBySeries($id);

        require 'src/view/front-end/seriesView.php';
    }

    public function singleSerie($param)
    {
        (int)$id = $param[0];

        $serie = $this->serieController->getOne($id);
        $Images = $this->imageController->getImagesBySeries($id);
        $image = $this->imageController->getOne($id);
        // $image = $this->singleImg($id);

        require 'src/view/front-end/singleSerieView.php';
    }

    public function singleImg($param)
    {
        (int)$id = $param[0];

        $image = $this->imageController->getOne($id);

        // var_dump($image);

        if(isset($id) && $id > 0)
        {
            $img = [
                'id' => $image->id(),
                'title' => $image->title(),
                'date' => $image->image_date(),
                'image' => $image->image(),
                'description' => html_entity_decode($image->description()),
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


    /*----------------------------------------------------
    Back-office Master Controller
    ---------------------------------------------------- */

    public function UploadImg()
    {
        $error = null;
        $Series = $this->serieController->getAll();
        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        require 'src/view/back-end/uploadViewForm.php';
    }

    public function addImg()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image']['name']) && !empty($_POST['id_serie']))
        {
            $this->imageController->addImg(htmlspecialchars($_POST['title']), htmlspecialchars($_FILES['image']['name']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['id_serie']));
        }

        else
        {
            throw new \Exception("Impossible de charger l'image (router)");
        }

        header('Location: /home');
    }

    public function getImages() /*Get all imgs*/
    {
        $Images = $this->imageController->getAllImages();

        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        require 'src/view/back-end/adminAllImgView.php';
    }

    public function getOneImg($param)
    {
        (int)$id = $param[0];

        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        $image = $this->imageController->getOne($id);

        require 'src/view/back-end/singleImageView.php';
    }

    public function deleteImage($param)
    {
        (int)$id = $param[0];

        $this->imageController->delete($id);

        header('Location: /allImg');
    }

    public function imgUpdate($param)
    {
        (int)$id = $param[0];

        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        $image = $this->imageController->getOne($id);

        require 'src/view/back-end/';
    }

    public function updateImage($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            if(!empty($_POST['title']) && !empty($_POST['image']) && !empty($_POST['description']))
            {
                $image = $this->imageController->updateImg($id, htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['image']), htmlspecialchars($_POST['description']),
                htmlspecialchars($_POST['id_serie']));
            }
            else
            {
                throw new \Exception('Il manque des informations');
            }
        }

        else
        {
            throw new \Exception("Aucune identifiant de billet ne correspond");
        }

    }

    public function addPost()
    {
        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        require 'src/view/back-end/adminAddPost.php';
    }

    public function newPost()
    {
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['slug']))
        {
            $this->postController->createPost(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['slug']));
        }

        else
        {
            throw new \Exception("Impossible d'ajouter le post");
        }

        header('Location: index.php?action=Accueil');
    }

    public function postUpdate($param)
    {
        (int)$id = $param[0];

        $post = $this->postController->getPost($id);
        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        require 'src/view/back-end/updatePostView.php';
    }

    public function updatePost($param)
    {
        (int)$id = $param[0];
        if(isset($id) && $id > 0)
        {
            if(!empty($_POST['content']) && !empty($_POST['title']))
            {
                //Installer systeme de vérification du formulaire
                $this->postController->update($id, htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
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

        header('Location: /Bio');
    }

    public function serieAdd()
    {
        $Images = $this->imageController->getAllImages();
        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        require 'src/view/back-end/AddSerieView.php';
    }

    public function addSerie()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech']) && !empty($_POST['serie_img']))
        {
            $this->serieController->newSerie(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['serie_img']));
            $image = $this->imageController->getOneImg($_GET['id']);
        }

        else
        {
            throw new \Exception("Impossible d'ajouter cette série");
        }

        header('Location: index.php?action=Accueil');
    }

    public function serieUpdate($param)
    {
        (int)$id = $param[0];
        $serie = $this->serieController->getOne($id);
        $Images = $this->imageController->getImagesBySeries($id);

        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();

        require 'src/view/back-end/updateSerie.php';
    }

    public function updateSerie($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech'])/* && !empty($_POST['serie_img'])*/)
            {
                // $Images = $imageController->getImgBySeries($_GET['id']);
                $this->serieController->update($id, htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['id_img']));
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

        header('Location: /series');
    }
}
