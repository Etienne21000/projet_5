<?php

session_start();

require_once (__DIR__ .'/vendor/autoload.php');
use App\Model\Router;
use App\Controller\MasterController;

$router = new Router($_GET['url']);
$controller = new MasterController();

$router->get('/home', 'Master#home');
$router->get('/', 'Master#home');
$router->get('/contact', 'Master#contact');


$router->get('/series', 'Master#series');
$router->get('/expos', 'Master#expos');
$router->get('/singleSerie/{id}/{slug}', 'Master#singleSerie');
$router->get('/singleImg/{id}', 'Master#singleImg');
$router->get('/Bio', "Master#bio");

$router->get('/adminHomePage', 'Master#AdminHomePage');

$router->get('/UploadImg', "Master#UploadImg");
$router->post('/addImg', 'Master#addImg');


$router->get('/allSeries', 'Master#allSeries');
$router->get('/getOneSerie/{id}/{slug}', 'Master#getOneSerie');
$router->get('/allExpos', 'Master#allExpos');
$router->get('/serieAdd', 'Master#serieAdd');
$router->get('/expoAdd', 'Master#expoAdd');
$router->post('/addSerie', 'Master#addSerie');
$router->post('/addExpo', 'Master#addExpo');
$router->get('/serieUpdate/{id}', 'Master#serieUpdate');
$router->post('/updateSerie/{id}', 'Master#updateSerie');
$router->get('/deleteSerie/{id}', 'Master#deleteSerie');


$router->get('/addPost', 'Master#addPost');
$router->post('/newPost', 'Master#newPost');
$router->get('/postUpdate/{id}', 'Master#postUpdate');
$router->post('/updatePost/{id}', 'Master#updatePost');
$router->get('/singlepost/{id}', 'Master#getOnePost');
$router->get('/deletePost/{id}', 'Master#deletePost');
$router->get('/allPosts', 'Master#getAllPostsAdmin');


$router->get('/allImg', 'Master#getImages');
$router->get('/getOneImg/{id}', 'Master#getOneImg');
$router->get('/deleteImg/{id}', 'Master#deleteImage');
$router->get('/imgUpdate/{id}', 'Master#imgUpdate');
$router->post('/updateImage/{id}', 'Master#updateImage');

$router->get('/admin', 'Master#admin');
$router->get('/inscription', 'Master#inscription');
$router->post('/userinscription', 'Master#UserInscription');
$router->post('/connectuser', 'Master#connectUser');
$router->get('/disconnect', 'Master#userDeconnexion');


/*Comment Part*/
$router->post('/addComment/{id}', 'Master#addComment');
$router->get('/reportCom/{id}', 'Master#reportComment');
$router->get('/allComments', 'Master#allComments');
$router->get('/reportedComments', 'Master#allReportedComments');
$router->get('/deleteComment/{id}', 'Master#deleteComment');
$router->get('/validateComment/{id}', 'Master#validateComment');


/*Slider part*/
$router->post('/chooseSerie/{id}', 'Master#chooseSerieSlider');


$router->get('/error404', 'Master#error');

$router->run();
