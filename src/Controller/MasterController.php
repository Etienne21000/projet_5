<?php
namespace App\Controller;

use App\Controller\PostController;
use App\Controller\ImageController;
use App\Controller\SerieController;
use App\Controller\UserController;
use App\Controller\CommentController;

class MasterController
{
    private $postController;
    private $imageController;
    private $serieController;
    private $userController;
    private $commentController;

    public function __construct()
    {
        $this->postController = new PostController();
        $this->imageController = new ImageController();
        $this->serieController = new SerieController();
        $this->userController = new UserController();
        $this->commentController = new CommentController();
    }


    /*----------------------------------------------------
    Front Master Controller
    ---------------------------------------------------- */
    public function home()
    {
/*        (int)$id = $param[0];*/
        $image = $this->imageController->imgSlider();
/*        $image = $this->imageController->getImgAcc($id);*/

        require 'src/view/front-end/indexView.php';
    }

    public function contact()
    {
        require 'src/view/front-end/contactView.php';
    }

    public function series()
    {
        $Series = $this->serieController->getAll();
        $Images = $this->imageController->getAllImages();

        require 'src/view/front-end/seriesView.php';
    }

    public function expos()
    {
        $Expos = $this->serieController->getAllExpos();
        $Images = $this->imageController->getAllImages();

        require 'src/view/front-end/ExpositionsView.php';
    }

    public function singleSerie($param)
    {
        (int)$id = $param[0];
        (int)$slug = $param[0];

        $Serie = $this->serieController->getOne($id, $slug);
        $Images = $this->imageController->getImagesBySeries($id);
        $image = $this->imageController->getOne($id);

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
        }
    }

    public function bio()
    {
        $Posts = $this->postController->getAllPost();

        require 'src/view/front-end/BiographieView.php';
    }

    /*---- Comment elements ----*/
/*
    public function addComment($param)
    {
        (int)$id = $param[0];
        (int)$slug = $param[0];

        $serie = $this->serieController->getOne($id, $slug);

        if(isset($id) && $id > 0)
        {
            if(isset($_SESSION['identifiant']) && isset($_SESSION['id']))
            {
                if(!empty($_POST['comment']))
                {
                    $pseudo = $_SESSION['identifiant'];
                    $user_id = $_SESSION['id'];

                    $this->commentController->addCom($user_id, htmlspecialchars($_POST['comment']), $id);
                }

            }

            header('Location: /singleSerie/' . $id . '/' . $slug);
        }

        else
        {
            throw new \Exception('Aucun identifiant de billet ne correspond');
        }
    }

    public function reportComment($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            $ReportedCom = $this->commentController->reportCom($id);
        }

        header('Location: /series');
    }*/

    /*----------------------------------------------------
    Back-office Master Controller
    ---------------------------------------------------- */

    public function AdminHomePage()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $Images = $this->imageController->getAllimg();
            // $Imgs = $this->imageController->getAllImages();
            $ImgAcc = $this->imageController->getImgHome();

            $Posts = $this->postController->getPostAdmin();
            $Series = $this->serieController->getSerieAdmin();
            $series = $this->serieController->getAll();
            $Expos = $this->serieController->getExpoAdmin();
            $Comments = $this->commentController->getAllC();
            $Reported = $this->commentController->getAllReportedComments();

            require 'src/view/back-end/adminHomeView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }

    }

    public function chooseSerieSlider($param)
    {
        (int)$id = $param[0];

        $this->serieController->unChoose();

        if(isset($id) && $id > 0)
        {
            $this->serieController->serieChoose($id);
        }
        else
        {
            throw new \Exception('Aucun identifiant de série ne correspond');
        }

        header('Location: /adminHomePage');
    }

    public function chooseImgHome($param)
    {
        (int)$id = $param[0];

        $this->imageController->unchooseImage();

        if(isset($id) && $id > 0)
        {
            $this->imageController->chooseImage($id);
        }
        else
        {
            throw new \Exception('Aucun identifiant d\'image ne correspond');
        }

        header('Location: /home');
    }

    public function allSeries()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $Series = $this->serieController->getAll();
            $Images = $this->imageController->getAllImages();

            require 'src/view/back-end/adminAllSeries.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function getOneSerie($param)
    {
        (int)$id = $param[0];
        (int)$slug = $param[0];

        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {

            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $serie = $this->serieController->getOne($id, $slug);
            $Images = $this->imageController->getImagesBySeries($id);
            $image = $this->imageController->getOne($id);
            $Comments = $this->commentController->allComAdmin($id);

            require 'src/view/back-end/serieView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function allExpos()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {

            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $Expos = $this->serieController->getAllExpos();
            $Images = $this->imageController->getAllImages();

            require 'src/view/back-end/adminAllExpos.php';

        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function getOneExpo($param)
    {
        (int)$id = $param[0];
        (int)$slug = $param[0];

        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $serie = $this->serieController->getOne($id, $slug);
            $Images = $this->imageController->getImagesBySeries($id);
            $image = $this->imageController->getOne($id);
            $Comments = $this->commentController->allComAdmin($id);

            require 'src/view/back-end/serieView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function allComments()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $Comments = $this->commentController->getAllComments();

            require 'src/view/back-end/adminAllCom.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function allReportedComments()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $Reported = $this->commentController->getAllReportedComments();

            require 'src/view/back-end/adminReportedCom.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function validateComment($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            $this->commentController->validateCom($id);
        }

        else
        {
            throw new \Exception("Aucun identifiant");
        }

        header('Location: /reportedComments');

    }

    public function deleteComment($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            $Comments = $this->commentController->deleteCom($id);

            header('Location: /reportedComments');
        }

        else
        {
            throw new \Exception("Aucun identifiant");

        }
    }

    public function getOnePost($param)
    {
        if(isset($_SESSION['id']))
        {

            (int)$id = $param[0];

            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            $post = $this->postController->getPost($id);

            require 'src/view/back-end/adminSinglePost.php';
        }

        else
        {
            header('Location: /home');
        }

    }

    public function UploadImg()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            if(isset($_SESSION['id']))
            {
                $error = null;
                $Series = $this->serieController->getAll();
                $Expos = $this->serieController->getAllExpos();
                // $image = $this->imageController->getAllImages();
                $countPost = $this->postController->nbPosts();
                $countImg = $this->imageController->countedImg();
                $countSerie = $this->serieController->countS();
                $countExpo = $this->serieController->countE();
                $countCom = $this->commentController->countCom();
                $reportedCom = $this->commentController->reportedCom();

                require 'src/view/back-end/uploadViewForm.php';
            }

            else
            {
                header('Location: /home');
            }
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function addImg()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['image']['name']) && !empty($_POST['id_serie']) && !empty($_POST['img_acc']))
        {
            $this->imageController->addImg(htmlspecialchars($_POST['title']), htmlspecialchars($_FILES['image']['name']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['id_serie']), htmlspecialchars($_POST['img_acc']));
        }

        else
        {
            throw new \Exception("Impossible de charger l'image (router)");
        }

        header('Location: /adminHomePage');
    }

    public function getImages()
    {
        $Images = $this->imageController->getAllImages();
        require 'src/view/back-end/adminAllImgView.php';

    }

    public function getOneImg($param)
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            if(isset($_SESSION['id']))
            {
                (int)$id = $param[0];

                $countPost = $this->postController->nbPosts();
                $countImg = $this->imageController->countedImg();
                $countSerie = $this->serieController->countS();
                $countExpo = $this->serieController->countE();
                $countCom = $this->commentController->countCom();
                $reportedCom = $this->commentController->reportedCom();

                $image = $this->imageController->getOne($id);

                require 'src/view/back-end/singleImageView.php';
            }

            else
            {
                header('Location: /home');
            }
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function deleteImage($param)
    {
        if(isset($_SESSION['id']))
        {
            (int)$id = $param[0];

            $this->imageController->delete($id);

            header('Location: /adminHomePage');
        }
        else
        {
            echo 'Vous ne pouvez pas effectuer cette action';
        }
    }

    public function imgUpdate($param)
    {
        (int)$id = $param[0];

        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            if(isset($_SESSION['id']))
            {
                $image = $this->imageController->getOne($id);


                $countPost = $this->postController->nbPosts();
                $countImg = $this->imageController->countedImg();
                $countSerie = $this->serieController->countS();
                $countExpo = $this->serieController->countE();
                $countCom = $this->commentController->countCom();
                $reportedCom = $this->commentController->reportedCom();


                require 'src/view/back-end/adminImgUpdate.php';
            }
            else
            {
                header('Location: /home');
            }
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function updateImage($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            if(!empty($_POST['title']) && !empty($_POST['description']))
            {
                $this->imageController->updateImg($id, htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['description']));
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

        header('Location: /adminHomePage');

    }

    public function addPost()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            if(isset($_SESSION['id']))
            {
                $countPost = $this->postController->nbPosts();
                $countImg = $this->imageController->countedImg();
                $countSerie = $this->serieController->countS();
                $countExpo = $this->serieController->countE();
                $countCom = $this->commentController->countCom();
                $reportedCom = $this->commentController->reportedCom();

                require 'src/view/back-end/adminAddPost.php';
            }
            else
            {
                header('Location: /home');
            }
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
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

        header('Location: /adminHomePage');
    }

    public function getAllPostsAdmin()
    {
        $countPost = $this->postController->nbPosts();
        $countImg = $this->imageController->countedImg();
        $countSerie = $this->serieController->countS();
        $countExpo = $this->serieController->countE();
        $countCom = $this->commentController->countCom();
        $reportedCom = $this->commentController->reportedCom();

        $Posts = $this->postController->getAllPost();

        require 'src/view/back-end/allPost.php';
    }

    public function postUpdate($param)
    {
        (int)$id = $param[0];

        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {

            $post = $this->postController->getPost($id);
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            require 'src/view/back-end/updatePostView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function updatePost($param)
    {
        (int)$id = $param[0];
        $post = $this->postController->getPost($id);

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

        header('Location: /singlepost/' . $id);
    }

    public function deletePost($param)
    {
        (int)$id = $param[0];

        if(isset($id) && $id > 0)
        {
            $this->postController->deleteP($id);
        }

        else
        {
            throw new \Exception("Aucun identifiant envoyé");
        }

        header('Location: /allposts');
    }

    public function serieAdd()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $Images = $this->imageController->getAllImages();
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            require 'src/view/back-end/AddSerieView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function addSerie()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech']) && !empty($_POST['created_at']))
        {
            $this->serieController->newSerie(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['created_at']));
        }

        else
        {
            throw new \Exception("Impossible d'ajouter cette série");
        }

        header('Location: /adminHomePage');
    }

    public function expoAdd()
    {
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $Images = $this->imageController->getAllImages();
            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            require 'src/view/back-end/addExpoView.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function addExpo()
    {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech']) && !empty($_POST['created_at']))
        {
            $this->serieController->newExpo(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['created_at']));
        }

        else
        {
            throw new \Exception("Impossible d'ajouter cette série");
        }

        header('Location: /adminHomePage');
    }

    public function serieUpdate($param)
    {
        (int)$id = $param[0];
        (int)$id_serie = $param[0];
        if(isset($_SESSION['id']) && $_SESSION['role'] = 1)
        {
            $serie = $this->serieController->getOne($id);
            $Images = $this->imageController->getImagesBySeries($id);
            $Image = $this->imageController->getFirstImg($id_serie);

            $countPost = $this->postController->nbPosts();
            $countImg = $this->imageController->countedImg();
            $countSerie = $this->serieController->countS();
            $countExpo = $this->serieController->countE();
            $countCom = $this->commentController->countCom();
            $reportedCom = $this->commentController->reportedCom();

            require 'src/view/back-end/updateSerie.php';
        }
        else
        {
            echo 'vous n\'avez pas accès à cette partie du site';
            header('Refresh: 2; /home');
        }
    }

    public function updateSerie($param)
    {
        (int)$id = $param[0];
        (int)$slug = $param[0];

        $serie = $this->serieController->getOne($id, $slug);

        if(isset($id) && $id > 0)
        {
            if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech']) && !empty($_POST['created_at']))
            {
                $this->serieController->update($id, htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']), htmlspecialchars($_POST['id_img']), htmlspecialchars($_POST['created_at']));
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

        header('Location: /getOneSerie/' . $id . '/' . $slug);
    }

    public function deleteSerie($param)
    {
        if(isset($_SESSION['id']))
        {
            (int)$id = $param[0];
            $this->serieController->deleteOneSerie($id);

            header('Location: /adminHomePage');
        }
        else
        {
            header('Location: /allSeries');
        }
    }

    public function admin()
    {
        $error = null;
        require 'src/view/front-end/adminConnectView.php';
    }

    public function inscription()
    {
        $error = null;
        require 'src/view/front-end/inscriptionView.php';
    }

    public function UserInscription()
    {
        $error = null;

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
                $error = 1;
            }

            //Verity mail
            if(empty($_POST['mail']) || strlen($_POST['mail']) > 255 || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            {
                $validate = false;
                $error = 2;
            }

            //Verity pass
            if(empty($_POST['pass']) || strlen($_POST['pass']) > 100 || !preg_match("#^[a-zA-Z0-9_-]+.{8,}$#", $_POST['pass']))
            {
                $validate = false;
                $error = 3;
            }

            //Confirm password
            if(empty($_POST['confirmePass']) || ($_POST['pass'] !== $_POST['confirmePass']))
            {
                $validate = false;
                $error = 4;
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

                else
                {
                    $error = 5;
                }

            }
        }

        switch ($error)
        {
            case 5:
            $error = '* Pseudo invalide';
            break;

            case 6:
            $error = '* Mail invalide';
            break;

            case 7:
            $error = '* Le mot de passe doit contenir au moins 8 caractères';
            break;

            case 8:
            $error = '* Confirmez à nouveau votre mot de passe';
            break;

            case 9:
            $error = '* Ce pseudo ou cette adresse mail est déjà utilisé(e)';
            break;
        }

        header('Location: /admin');
    }

    public function changePassword()
    {

    }

    public function connectUser()
    {
        $error = null;

        if (!empty($_POST))
        {
            $validate = true;
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
                }

                else
                {
                    $passVerify = password_verify($_POST['pass'], $user['pass']);

                    if($passVerify)
                    {
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['identifiant'] = $user['identifiant'];
                        $_SESSION['role'] = $user['role'];

                        if($user['role'] = 1){
                            header('Location: /adminHomePage/');
                            exit();
                        }
                        elseif ($user['role'] = 0)
                        {
                            header('Location: /home');
                        }
                    }

                    else
                    {
                        $error = 4;
                    }
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

        require 'src/view/front-end/adminConnectView.php';
    }

    public function resetPass()
    {
        $error = null;
        require 'src/view/front-end/forgetPassView.php';
    }

    public function test()
    {
        require 'src/view/front-end/test.php';
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
