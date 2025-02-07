<?php
session_start();
require_once '../App/core/autoloader.php';
Autoloader::register();
require_once '../App/core/routere.php';

$router = new Router();

$router->add('home', 'HomeController', 'index');
$router->add('about', 'AboutController', 'index');
$router->add('course/vedios', 'VideoController', 'afficher');
$router->add('users', 'UserController', 'listUsers');
$router->add('authentification/register', 'UserController', 'register');
$router->add('authentification/login', 'UserController', 'login');
$router->add('authentification/choose_role', 'UserController', 'chooseRole');
$router->add('login', 'UserController', 'register');
$router->add('teacher/dashboard', 'UserController', 'register');
$router->add('login', 'UserController', 'register');
$router->add('logout', 'UserController', 'logout');
$router->add('student/dashboard', 'UserController', 'profile');
$router->add('admin/dashboard','AdminController', 'getDachebored');
$router->add('admin/dashboard/addtags', 'TagController', 'createTag');
$router->add('admin/dashboard/get_tags', 'TagController', 'getAllTags');
$router->add('admin/dashboard/addcategorie', 'CategorieController', 'addCategorie');
$router->add('admin/dashboard/get_categories', 'CategorieController', 'showCategories');
$router->add('teacher/dashboard', 'UserController', 'profile');
$router->add('teacher/dashboard/addvedio', 'VideoController', 'addVideo');
$router->add('teacher/dashboard/adddocs', 'DocumentController', 'addDocument');
$route = $_GET['route'] ?? 'home';
$router->dispatch($route);
?>
