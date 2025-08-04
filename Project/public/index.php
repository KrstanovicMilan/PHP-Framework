<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AdministrationController;
use app\controllers\CarParkController;
use app\controllers\ContactController;
use app\controllers\GalleryController;
use app\controllers\HomeController;
use app\controllers\LocationController;
use app\controllers\ProductController;
use app\controllers\RentController;
use app\controllers\StatsController;
use app\controllers\UserController;
use app\core\Application;

$app = new Application();

//---------------get----------------/administration/user/delete
$app->router->get("/",  [HomeController::class , 'index']);
$app->router->get("/home", [HomeController::class , 'index']);
$app->router->get("/login", [UserController::class, 'login']);
$app->router->get("/registration", [UserController::class, 'registration']);
$app->router->get("/gallery", [GalleryController::class, 'gallery']);
$app->router->get("/api/administration/pictures", [GalleryController::class, 'getAllPictures']); // => za json
$app->router->get("/carpark", [CarParkController::class, 'carpark']);
$app->router->get("/api/administration/products", [CarParkController::class, 'getAllProducts']); // => za json
$app->router->get("/administration/users/delete", [UserController::class, 'deleteUser']);
$app->router->get("/contact", [ContactController::class, 'contact']);
$app->router->get("/administration/users", [AdministrationController::class, 'users']);
$app->router->get("/api/administration/users", [AdministrationController::class, 'getAllUsers']); // => za json
$app->router->get("/product/create", [ProductController::class, 'create']);
$app->router->get("/logout",[UserController::class, 'logout']);
$app->router->get("/lokacija",[LocationController::class, 'lokacija']);
$app->router->get("/rentform",[RentController::class, 'rent']);
$app->router->get("/accessDenied",[UserController::class, 'accessDenied']);
$app->router->get("/admin",[StatsController::class, 'index']);
$app->router->get("/api/rents",[StatsController::class, 'rents']);
$app->router->get("/api/cars",[StatsController::class, 'cars']);
$app->router->get("/api/rez",[StatsController::class, 'rez']);




//-------------post--------------
$app->router->post("/registrationProcess", [UserController::class, 'registrationProcess']);
$app->router->post("/loginProcess", [UserController::class, 'loginProcess']);
$app->router->post("/createProductProcess", [ProductController::class, 'createProductProcess']);
$app->router->post("/contactProcess", [ContactController::class, 'contactProcess']);
$app->router->post("/rentProcess", [RentController::class, 'rentProcess']);



//echo "<pre>";
//var_dump($app->router->routes);
//echo "</pre>";
//exit;
$app->run();