<?php
session_start();

require_once (__DIR__ .'/vendor/autoload.php');

use App\Controller\PostController;
use App\Controller\ImageController;

$postController = new PostController();
$imageController = new ImageController();

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
            $Images = $imageController->getAllImages();
            
            require 'src/view/front-end/seriesView.php';
        }

        elseif ($_GET['action'] == 'Bio')
        {
            $Posts = $postController->getAllPost();

            require 'src/view/front-end/BiographieView.php';
        }

        elseif ($_GET['action'] == 'UploadImg')
        {
            require 'src/view/back-end/uploadViewForm.php';
        }

        elseif ($_GET['action'] == 'addImage')
        {
            if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image']))
            {
                $postController->addPost(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['image']));
            }

            else
            {
                // $postController->errors();
            }

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
