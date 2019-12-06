<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use model\router\Router;

$router = new Router::getInstance();

// try
// {

$router->register('/', 'home', function()
{
    require 'src/views/front-end/indexView.php';
});

$router->register('Accueil', 'Accueil', function()
{
    require 'src/views/front-end/indexView.php';
});

$router->start();

// }

// catch (Exception $e)
// {
//     echo '<strong>Erreur</strong> : une erreur s\'est produite : ' . $e->getMessage();
//     require 'src/view/front_end/errorView.php';
//
// }

// try
// {
//     if (isset($_GET['action']))
//     {
//
//         if ($_GET['action'] == 'Accueil')
//         {
//             require 'src/views/front-end/indexView.php';
//         }
//     }
//
//     else
//     {
//         require 'src/views/front-end/indexView.php';
//     }
// }
//
// catch (Exception $e)
// {
//     echo '<strong>Erreur</strong> : une erreur s\'est produite : ' . $e->getMessage();
//     require 'src/view/front_end/errorView.php';
//
// }
