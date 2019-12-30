<?php

session_start();

require_once (__DIR__ .'/vendor/autoload.php');
use App\Model\Router;

$router = new Router($_GET['url']);

$router->get('/home', 'Master#home');
$router->get('/', 'Master#home');


$router->get('/series', 'Master#series');
$router->get('/expos', 'Master#expos');
$router->get('/singleSerie/{id}/{slug}', 'Master#singleSerie');
$router->get('/singleImg/{id}', 'Master#singleImg');
$router->get('/Bio', "Master#bio");

$router->get('/adminHomePage', 'Master#AdminHomePage');

$router->get('/UploadImg', "Master#UploadImg");
$router->post('/addImg', 'Master#addImg');


$router->get('/serieAdd', 'Master#serieAdd');
$router->post('/addSerie', 'Master#addSerie');
$router->get('/serieUpdate/{id}', 'Master#serieUpdate');
$router->post('/updateSerie/{id}', 'Master#updateSerie');
$router->get('/deleteSerie/{id}', 'Master#deleteSerie');


$router->get('/addPost', 'Master#addPost');
$router->post('/newPost', 'Master#newPost');
$router->get('/postUpdate/{id}', 'Master#postUpdate');
$router->post('/updatePost/{id}', 'Master#updatePost');
$router->get('/singlepost/{id}', 'Master#getOnePost');


$router->get('/allImg', 'Master#getImages');
$router->get('/getOneImg/{id}', 'Master#getOneImg');
$router->get('/deleteImg/{id}', 'Master#deleteImage');


$router->get('/admin', 'Master#admin');
$router->get('/inscription', 'Master#inscription');
$router->post('/userinscription', 'Master#UserInscription');
$router->post('/connectuser', 'Master#connectUser');
$router->get('/disconnect', 'Master#userDeconnexion');


/*Comment Part*/
$router->post('/addComment/{id}', 'Master#addComment');


$router->get('/error404', 'Master#error');

$router->run();


// $router->get('/serieAdd', 'Master#serieAdd');
// $router->post('/addSerie', 'Master#addSerie');
// $router->get('/serieUpdate/{id}', 'Master#serieUpdate');
// $router->post('/updateSerie/{id}', 'Master#updateSerie');
//
//
//
// $router->get('/addPost', 'Master#addPost');
// $router->post('/newPost', 'Master#newPost');
// $router->get('/postUpdate/{id}', 'Master#postUpdate');
// $router->post('/updatePost/{id}', 'Master#updatePost');


// $router->get('/allImg', 'Master#getImages');
// $router->get('/getOneImg/{id}', 'Master#getOneImg');
// $router->get('/deleteImg/{id}', 'Master#deleteImage');
