<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

use app\core\Router;
use app\controller\ProductController;
use app\core\Database;

$database = new Database();
$router = new Router($database);

$router->get('/', [ProductController::class, 'index']);
$router->get('/addproduct', [ProductController::class, 'create']);
$router->post('/addproduct', [ProductController::class, 'create']);
$router->post('/delete-product', [ProductController::class, 'delete']);

$router->get('/api/read-product', [ProductController::class, 'read']);

$router->resolve();
