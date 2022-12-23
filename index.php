<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller\DetailPageController;
use App\Controller\HomePageController;
use App\Foundation\Request;
use App\Foundation\Router;
use App\Foundation\ViewRenderer;

// debug settings
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// conf loading
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
$dotenv->load();
const TEMPLATES_PATH = __DIR__ . '/templates/';

$router = new Router;
$request = new Request($_GET, $_POST, $_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$viewRenderer = new ViewRenderer(TEMPLATES_PATH);

$homePageController = new HomePageController($viewRenderer);
$detailPageController = new DetailPageController($viewRenderer);

$router->get('/', function() use ($homePageController, $request) {
    echo $homePageController->execute($request);
});

$router->get('/app/detailpage.php', function() use ($detailPageController, $request) {
    echo $detailPageController->execute($request);
});

$router->dispatch($request);

// router should support 404 page
// if no routes match the request, we call the fallback callback.
// $router->fallaback(function() {
//     echo '404';
// });

// Routing
// $routes = [];

// route('/app/add.php', function () {
//     echo "Add User Page";
// });

// route('/404', function () {
//     echo "Page not found";
// });

// function route(string $path, callable $callback) {
//     global $routes;
//     $routes[$path] = $callback;
// }

// run();

// function run() {
//     global $routes;
// //    $uri = $_SERVER['REQUEST_URI'];
//     $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//     $found = false;
//     foreach ($routes as $path => $callback) {
//         if ($path !== $uri) continue;

//         $found = true;
//         $callback();
//     }

//     if (!$found) {
//         $notFoundCallback = $routes['/404'];
//         $notFoundCallback();
//     }
// }

//if ($route === '/' && $method === 'GET') {
//    echo $homePageController->execute($request);
//    echo var_dump($_ENV);
//
//} elseif ($route === '/detailpage' && $method === 'GET') {
//    echo "sds";
//}
//else {
//    echo "page not found";
//}

// TODO:
// 0- refactor the whole code to use new pattern.
// 1- load configurations from env
// 2- add routing to be able to have controllers per path (url)
// 3- write better tests for Database class