<?php 

require __DIR__ . '/vendor/autoload.php';

use App\Controller\HomePageController;
use App\Foundation\Request;
use App\Foundation\Database;
use App\Foundation\ViewRenderer;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

// configurations
const DSN = 'mysql:host=db;dbname=php_db'; // todo: load them from env
const USERNAME = 'php_user';
const PASSWORD = 'password';
const TEMPLATES_PATH = __DIR__ . '/templates/';

// wiring instantiate dependencies
$database = new Database(DSN, USERNAME, PASSWORD);
$viewRenderer = new ViewRenderer(TEMPLATES_PATH);
$request = new Request($_GET, $_POST);

$homePageController = new HomePageController($database, $viewRenderer);

// the idea of router => Router::get('/', HomePageController::class, 'execute');

$route = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET'; // GET, POST

if ($route === '/' && $method === 'GET') {
    echo $homePageController->execute($request);
} else {
    echo "page not found";
}

// TODO:
// 0- refactor the whole code to use new pattern.
// 1- load configurations from env
// 2- add routing to be able to have controllers per path (url)
// 3- write better tests for Database class