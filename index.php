<?php
session_start();

require_once (__DIR__ .'/vendor/autoload.php');

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
            require 'src/view/front-end/seriesView.php';
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

            // header('Location: index.php?action=postAdmin');
        }

        elseif ($_GET['action'] == 'homeAdmin')
        {
            require 'src/view/back-end/adminAddPost.php';
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
    require 'src/view/front_end/errorView.php';

}
