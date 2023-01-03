<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller\AddPageController;
use App\Controller\DetailPageController;
use App\Controller\HomePageController;
use App\Foundation\Request;
use App\Foundation\Router;
use App\Foundation\ViewRenderer;
use App\dbconnect\DbConnect;

//// debug settings
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

// conf loading
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
$dotenv->load();
const TEMPLATES_PATH = __DIR__ . '/templates/';

$router = new Router;
$request = new Request($_GET, $_POST, $_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$viewRenderer = new ViewRenderer(TEMPLATES_PATH);
$pdo = (new DbConnect())->createConnection();

$homePageController = new HomePageController($viewRenderer);
$detailPageController = new DetailPageController($viewRenderer, $pdo);
$addPageController = new AddPageController($viewRenderer, $pdo);

$router->get('/', function() use ($homePageController, $request) {
    echo $homePageController->execute($request);
});

$router->get('/app/detailpage.php', function() use ($detailPageController, $request) {
    echo $detailPageController->execute($request);
});

$router->post('/app/detailpage.php', function() use ($detailPageController, $request) {
    echo $detailPageController->deleteUser($request);
});

$router->get('/app/add.php', function() use ($addPageController, $request) {
    echo $addPageController->execute($request);
});

$router->post('/app/add.php', function() use ($addPageController, $request) {
    echo $addPageController->submittUserDataByPost($request);
});


$router->dispatch($request);















// TODO:
// 0- refactor the whole code to use new pattern.
// 1- load configurations from env
// 2- add routing to be able to have controllers per path (url)
// 3- write better tests for Database class