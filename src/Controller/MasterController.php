<?php
namespace App\Controller;

use App\Controller\PostController;
use App\Controller\ImageController;
use App\Controller\SerieController;
use App\Controller\UserController;

class MasterController
{
    private $postController;
    private $imageController;
    private $serieController;
    private $userController;

    public function __construct()
    {
        $this->postController = new PostController();
        $this->imageController = new ImageController();
        $this->serieController = new SerieController();
        $this->userController = new UserController();
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
            // echo json_encode(array('success'=>'true'));
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

    public function AdminHomePage()
    {
        if(isset($_SESSION['id']))
        {
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();

            // $Images = $this->imageController->getAllImages();
            $Images = $this->imageController->getAllimg();
            $Posts = $this->postController->getAllPost();
            $Series = $this->serieController->getAll();

            require 'src/view/back-end/adminHomeView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }

    }

    public function getOnePost($param)
    {
        (int)$id = $param[0];

        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();
        $countSerie = $this->serieController->countS();

        $post = $this->postController->getPost($id);

        require 'src/view/back-end/adminSinglePost.php';

    }

    public function UploadImg()
    {
        $error = null;
        $Series = $this->serieController->getAll();
        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();
        $countSerie = $this->serieController->countS();

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

    public function getImages()
    {
        $Images = $this->imageController->getAllImages();
        require 'src/view/back-end/adminAllImgView.php';

        // if(isset($id) && $id > 0)
        // {
        // foreach($Images as $image)
        // {
            // $image->image();
            // var_dump($image);
            // $img = [
            //     'id' => $image->id(),
            //     'title' => $image->title(),
            //     'date' => $image->image_date(),
            //     'image' => $image->image(),
            //     'description' => html_entity_decode($image->description()),
            // ];
            //
            // header('Content-Type: application/json');
            //
            // echo json_encode($img);
        // }
            // echo $image->image();
            // echo json_encode(array('success'=>'true'));
        // }
        // $countPost = $this->postController->nbPosts();
        // $countImg = $this->imageController->countedImg();
        // $countSerie = $this->serieController->countS();

    }

    public function getOneImg($param)
    {
        (int)$id = $param[0];

        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();
        $countSerie = $this->serieController->countS();

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
        $countSerie = $this->serieController->countS();

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
        $countSerie = $this->serieController->countS();

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
        $countSerie = $this->serieController->countS();

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
        $countSerie = $this->serieController->countS();

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
        $countSerie = $this->serieController->countS();

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

    public function admin()
    {
        require 'src/view/front-end/adminConnectView.php';
    }

    public function inscription()
    {
        require 'src/view/front-end/inscriptionView.php';
    }

    public function UserInscription()
    {
        // $error = null;

        if (!empty($_POST))
        {
            $validate = true;

            $_POST['identifiant'] = htmlspecialchars($_POST['identifiant']);
            $_POST['mail'] = htmlspecialchars($_POST['mail']);
            $_POST['pass'] = htmlspecialchars($_POST['pass']);
            $_POST['confirmePass'] = htmlspecialchars($_POST['confirmePass']);


            //Verify pseudo
            if(empty($_POST['identifiant']) || strlen($_POST['identifiant']) > 100 || !preg_match("#^[a-zà-ùA-Z0-9-\s_-]+$#", $_POST['identifiant']))
            {
                $validate = false;
                // $error = 1;
            }

            //Verity mail
            if(empty($_POST['mail']) || strlen($_POST['mail']) > 255 || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            {
                $validate = false;
                // $error = 2;
            }

            //Verity pass
            if(empty($_POST['pass']) || strlen($_POST['pass']) > 100 || !preg_match("#^[a-zA-Z0-9_-]+.{8,}$#", $_POST['pass']))
            {
                $validate = false;
                // $error = 3;
            }

            //Confirm password
            if(empty($_POST['confirmePass']) || ($_POST['pass'] !== $_POST['confirmePass']))
            {
                $validate = false;
                // $error = 4;
            }

            if($validate)
            {
                if(empty($this->userController->checkIdentifiant($_POST['identifiant'])) && empty($this->userController->checkMail($_POST['mail'])))
                {
                    $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                    $this->userController->newUser(htmlspecialchars($_POST['identifiant']),
                    htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['pass']));

                    header('Location: /admin');
                }

                // else
                // {
                //     $error = 5;
                // }

            }
        }

        // switch ($error)
        // {
        //     case 5:
        //     $error = '* Pseudo invalide';
        //     break;
        //
        //     case 6:
        //     $error = '* Mail invalide';
        //     break;
        //
        //     case 7:
        //     $error = '* Mot de passe invalide';
        //     break;
        //
        //     case 8:
        //     $error = '* Confirmez à nouveau votre mot de passe';
        //     break;
        //
        //     case 9:
        //     $error = '* Ce pseudo ou cette adresse mail est déjà utilisé(e)';
        //     break;
        // }
        //
        // header('Location: /inscription');
    }

    public function connectUser()
    {
        // $identifiant = $param[0];
        // (int)$id = $param[0];

        if (!empty($_POST))
        {
            $validate = true;
            $error = null;

            //verify if empty fields
            if (empty($_POST['identifiant']) || empty($_POST['pass']))
            {
                $erreur = 1;
                $validate = false;
            }

            //Verify length of strings
            if (strlen($_POST['identifiant']) > 100 || strlen($_POST['pass']) > 255)
            {
                $error = 2;
                $validate = false;
            }

            if ($validate === true)
            {
                $user = $this->userController->userConnect($_POST['identifiant']);

                if (!$user)
                {
                    $error = 3;
                    echo 'impossible de vous connecter';
                }

                else
                {
                    $passVerify = password_verify($_POST['pass'], $user['pass']);

                    if($passVerify)
                    {
                        // session_start();
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['identifiant'] = $user['identifiant'];

                        header('Location: /adminHomePage/');
                        exit();
                        // require 'src/view/back-end/adminHomeView.php';
                    }

                    else
                    {
                        echo 'Mauvais mot de passe';
                        $error = 4;
                    }
                }
            }

            switch ($error)
            {
                case 1:
                $error = '* Veuillez renseigner votre pseudo';
                break;

                case 2:
                $error = '* Veuillez renseigner votre mot de passe';
                break;

                case 3:
                $error = '* Pseudo invalide';
                break;

                case 4:
                $error = '* Mot de passe invalide';
                break;
            }
        }
    }

    public function userDeconnexion()
    {
        $this->userController->disconnectUser();

        header('Location: /home');
    }

    public function error()
    {
        require 'src/view/front-end/errorView.php';
    }
}


// switch ($error)
// {
//     case 1:
//     $error = '* Veuillez renseigner votre pseudo';
//     break;
//
//     case 2:
//     $error = '* Veuillez renseigner votre mot de passe';
//     break;
//
//     case 3:
//     $error = '* Pseudo invalide';
//     break;
//
//     case 4:
//     $error = '* Mot de passe invalide';
//     break;
// }
//
// require 'src/view/front-end/adminConnectView.php';
