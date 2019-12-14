<?php
session_start();

require_once (__DIR__ .'/vendor/autoload.php');

use App\Controller\PostController;
use App\Controller\ImageController;
use App\Controller\SerieController;

$postController = new PostController();
$imageController = new ImageController();
$serieController = new SerieController();


try
{
    if (isset($_GET['action']))
    {

        if ($_GET['action'] == 'Accueil')
        {
            require 'src/view/front-end/indexView.php';
        }

        elseif ($_GET['action'] == 'series')
        {
            $Series = $serieController->getAll();
            $Images = $imageController->getAllImages();
            // $Image = $imageController->getFirstImg($_GET['id']);

            require 'src/view/front-end/seriesView.php';
        }

        elseif ($_GET['action'] == 'singleSerie')
        {
            $serie = $serieController->getOne($_GET['id']);
            $Images = $imageController->getImgBySeries($_GET['id']);
            $image = $imageController->getOne($_GET['id']);

            require 'src/view/front-end/singleSerieView.php';
        }

        elseif ($_GET['action'] == 'singleImg')
        {
            $image = $imageController->getOne($_GET['id']);
            // var_dump($image);
            // return $image;
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                $img = [
                    'id' => $image->id(),
                    'title' => $image->title(),
                    'date' => $image->image_date(),
                    'image' => $image->image(),
                    'description' => strip_tags($image->description()),
                ];

                header('Content-Type: application/json');

                echo json_encode($img);

                // return $result;
            }

            // header('Location: /?action=displayImg');
        }

        elseif ($_GET['action'] == 'displayImg')
        {
            $imgage = json_decode($result, true);

            echo '<p>' . $image['title'] . '</p>';

        }

        elseif ($_GET['action'] == 'Bio')
        {
            $Posts = $postController->getAllPost();

            require 'src/view/front-end/BiographieView.php';
        }

        elseif ($_GET['action'] == 'UploadImg')
        {
            $error = null;
            $Series = $serieController->getAll();
            require 'src/view/back-end/uploadViewForm.php';
        }

        elseif ($_GET['action'] == 'addImage')
        {
            // $id_serie = $_POST['id_serie']
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

        elseif ($_GET['action'] == 'addPost')
        {
            require 'src/view/back-end/adminAddPost.php';
        }

        elseif ($_GET['action'] == 'newPost')
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

        elseif ($_GET['action'] == 'postUpdate')
        {
            $post = $postController->getPost($_GET['id']);

            require 'src/view/back-end/updatePostView.php';
        }

        elseif ($_GET['action'] == 'updatePost')
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

        elseif ($_GET['action'] == 'serieAdd')
        {
            $Images = $imageController->getAllImages();
            // $image = $imageController->getOneImg($_GET['id']);
            require 'src/view/back-end/AddSerieView.php';
        }

        elseif ($_GET['action'] == 'addSerie')
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

        elseif ($_GET['action'] == 'serieUpdate')
        {
            $serie = $serieController->getOne($_GET['id']);

            require 'src/view/back-end/updateSerie.php';
        }

        elseif ($_GET['action'] == 'updateSerie')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tech']))
                {
                    $serieController->update($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['tech']));
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

    else
    {
        require 'src/view/front-end/indexView.php';
    }
}

catch (Exception $e)
{
    echo '<strong>Erreur</strong> : une erreur s\'est produite : ' . $e->getMessage();
    // require 'src/view/front_end/errorView.php';

}

// require ('vendor/autoload.php');

// use App\Model\Router;

// $router = new Router($_GET['url']);
// // $router = Router::getInstance();
//
// $router->get('/', function()
// {
//     require 'src/view/front-end/indexView.php';
// });
//
// $router->get('/home', function()
// {
//     require 'src/view/front-end/indexView.php';
// });


// // try
// // {
//

// $router->register('/', 'home', function()
// {
//     require 'src/view/front-end/indexView.php';
// });

// $router->get('/', function()
// {
//     require 'src/view/front-end/indexView.php';
// });
//
// $router->get('/Accueil', function()
// {
//     require 'src/view/front-end/indexView.php';
// });
//
// $router->get('/series', function()
// {
//     require 'src/view/front-end/seriesView.php';
// });
//
// $router->run();

// }

// catch (Exception $e)
// {
//     echo '<strong>Erreur</strong> : une erreur s\'est produite : ' . $e->getMessage();
//     require 'src/view/front_end/errorView.php';
//
// }
