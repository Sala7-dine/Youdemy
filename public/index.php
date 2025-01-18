<?php
session_start();

require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/controllers/TeacherController.php';
require_once '../app/config/db.php';



$router = new Router();
Route::setRouter($router);

// Home Routes

Route::get('/', [HomeController::class, 'showHome']);

// auth routes 
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'handleRegister']);
Route::get('/login', [AuthController::class, 'showleLogin']);
Route::post('/login', [AuthController::class, 'handleLogin']);

// Admin Routes 

Route::get('/dashboard', [AdminController::class, 'showDashboard']);
Route::get('/dashboard/users', [AdminController::class, 'showUsers']);
Route::get('/dashboard/categorie', [AdminController::class, 'showCategorie']);
Route::get('/dashboard/tags', [AdminController::class, 'showTags']);

Route::post('/delete-user', [AdminController::class, 'deleteUser']);
Route::post('/update-status', [AdminController::class, 'updateUserStatus']);
Route::post('/add-category', [AdminController::class, 'addCategory']);
Route::post('/delete-category', [AdminController::class, 'deleteCategory']);
Route::post('/add-tag', [AdminController::class, 'addTag']);
Route::post('/delete-tag', [AdminController::class, 'deleteTag']);


// Teacher Routes ---------------------------- 

Route::get('/dashboard/teacher' , [TeacherController::class , "showTeacherDashboard"]);
Route::get('/dashboard/teacher/cours' , [TeacherController::class , "showTeacherCours"]);
Route::post('/dashboard/teacher/cours/add-cours', [TeacherController::class, 'addCours']);




//Route::post('/logout', [AuthController::class, 'logout']);

// admin routers

// Route::get('/admin', [AdminController::class, 'index']);
// Route::get('/admin/users', [AdminController::class, 'handleUsers']);
// Route::get('/admin/categories', [AdminController::class, 'categories']);
// Route::get('/admin/testimonials', [AdminController::class, 'testimonials']);
// Route::get('/admin/projects', [AdminController::class, 'projects']);



// end admin routes 

// client Routes 
// Route::get('/client/dashboard', [ClientController::class, 'index']);



// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);





