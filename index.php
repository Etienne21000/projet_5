<?php
session_start();

require_once (__DIR__ .'/vendor/autoload.php');

// use App\Controller\MasterController;
// use App\Controller\PostController;
// use App\Controller\ImageController;
// use App\Controller\SerieController;
use App\Model\Router;

$router = new Router($_GET['url']);
// $masterController = new MasterController();

$router->get('/home', 'Master#home');

$router->get('/', 'Master#home');


$router->get('/series', 'Master#series');

$router->get('/singleSerie/:id', 'Master#singleSerie');

$router->get('/singleImg/:id', 'Master#singleImg');

//AJAX request no working so far
// $router->get('/singleImg/:id', function($id) use($router)
// {
//     echo $router->url('Master#singleImg')->with('id', '[0-9]+');
// });


$router->get('/Bio', "Master#bio");

$router->get('/UploadImg', "Master#UploadImg");

$router->post('/addImg', 'Master#addImg');


$router->get('/serieAdd', 'Master#serieAdd');

$router->post('/addSerie', 'Master#addSerie');

$router->get('/serieUpdate/:id', 'Master#serieUpdate');

$router->post('/updateSerie/:id', 'Master#updateSerie');



$router->get('/addPost', 'Master#addPost');

$router->post('/newPost', 'Master#newPost');

$router->get('/postUpdate/:id', 'Master#postUpdate');

$router->post('/updatePost/:id', 'Master#updatePost');


$router->get('/allImg', 'Master#getImages');
$router->get('/getOneImg/:id', 'Master#getOneImg');
$router->get('/deleteImg/:id', 'Master#deleteImage');


$router->run();


// $router->get('/singleSerie/:id', 'Master#singleSerie');

// $router->get('/singleSerie/:id', function($id)
// {
//     $imageController = new ImageController();
//     $serieController = new SerieController();
//
//     $serie = $serieController->getOne($_GET['id']);
//     $Images = $imageController->getImagesBySeries($_GET['id_serie']);
//     $image = $imageController->getOne($_GET['id_img']);
// });

// $router->get('/singleSerie/:id', function($id) use($router)
// {
//     echo $router->url('Master#singleSerie', ['id_serie' => 1, 'id_img' => 1]);
// });

// $router->get('/singleSerie/{id}/{id}', function($id) use($router)
// {
//     // echo $router->url('Master#singleSerie', ['id' => 1]);
// });

// $router->get('/singleSerie/:id', 'Master#singleSerie');



// {
//     echo 'Serie n° '
//     // $masterController = new MasterController();
//     // $masterController->singleSerie();
// // echo $router->url('src/view/front-end/singleSerieView.php');
//
//
// // $imageController = new ImageController();
// // $serieController = new SerieController();
// //
// // $serie = $serieController->getOne($_GET['id']);
// // $Images = $imageController->getImgBySeries($id);
// // $image = $imageController->getOne($id);
// // require 'src/view/front-end/singleSerieView.php';
// // echo 'Série n° ' . $id;
// });

// $router->get('/singleImg/{id}', function($id)
// {
//     $imageController = new ImageController();
//     $image = $imageController->getOne($_GET['id']);
//
//     if(isset($_GET['id']) && $_GET['id'] > 0)
//     {
//         $img = [
//             'id' => $image->id(),
//             'title' => $image->title(),
//             'date' => $image->image_date(),
//             'image' => $image->image(),
//             'description' => strip_tags(html_entity_decode($image->description())),
//         ];
//
//         header('Content-Type: application/json');
//
//         echo json_encode($img);
//     }
// });
//
// $router->post('/addSerie/{id}', function($id)
// {
//     echo 'ajouter la série n° ' . $id;
// });
//
// $router->get('/', function()
// {
//     require 'src/view/front-end/indexView.php';
//     // echo 'Bonjour';
// });


// $router = Router::getInstance();

// $router->register('/', 'Accueil', function()
// {
//     require 'src/view/front-end/indexView.php';
//
//     echo 'home';
// });
//
// $router->register('/series', 'series', function()
// {
//     $Series = $serieController->getAll();
//     $Images = $imageController->getAllImages();
//
//     echo 'src/view/front-end/indexView.php';
//
//     // echo '/series';
// });
//
// $router->register('/singleSerie', 'singleSerie', function()
// {
//     $serie = $serieController->getOne($_GET['id']);
//     $Images = $imageController->getImgBySeries($_GET['id']);
//     $image = $imageController->getOne($_GET['id']);
//
//     require 'src/view/front-end/singleSerieView.php';
//
//     echo '/singleSerie';
// });
//
// $router->register('/singleImg', 'singleImg', function()
// {
//     $image = $imageController->getOne($_GET['id']);
//
//     if(isset($_GET['id']) && $_GET['id'] > 0)
//     {
//         $img = [
//             'id' => $image->id(),
//             'title' => $image->title(),
//             'date' => $image->image_date(),
//             'image' => $image->image(),
//             'description' => strip_tags(html_entity_decode($image->description())),
//         ];
//
//         header('Content-Type: application/json');
//
//         echo json_encode($img);
//     }
// });
//
// $router->register('/Bio', 'Bio', function()
// {
//     $Posts = $postController->getAllPost();
//
//     echo 'src/view/front-end/BiographieView.php';
// });

// use App\Controller\MasterController;
//
// $controller = new MasterController();
//
// try
// {
//     if (isset($_GET['action']))
//     {
//
//         if ($_GET['action'] == 'Accueil')
//         {
//             $controller->home();
//         }
//
//         elseif ($_GET['action'] == 'series')
//         {
//             $controller->series();
//         }
//
//         elseif ($_GET['action'] == 'singleSerie')
//         {
//             $controller->singleSerie();
//         }
//
//     }
//
//     else
//     {
//         require 'src/view/front-end/indexView.php';
//     }
// }

// catch (Exception $e)
// {
//     echo '<strong>Erreur</strong> : une erreur s\'est produite : ' . $e->getMessage();
//     // require 'src/view/front_end/errorView.php';
//
// }
