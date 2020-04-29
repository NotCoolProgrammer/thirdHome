<?php
session_start();

include 'CRUD.php';

$requestUri = $_SERVER['REQUEST_URI'];
$scriptAssets = [];

if ($requestUri == "/") {
    include 'HTML/main.php';
    die();
}

if ($requestUri == "/account") {
    include 'HTML/account.php';
    die();
}

if ($requestUri == "/checkout") {
    include 'HTML/checkout.php';
    die();
}

if ($requestUri == "/products") {
    include 'HTML/products.php';
    die();
}

if ($requestUri == "/contact") {
    include 'HTML/contact.php';
    die();
}


if (startsWith($requestUri, '/single/')) {
    // $scriptAssets = ['js/generationProducts.js'];
    $path = explode('/', $requestUri);
    $productSingleView = $path[2];
    $product = getProductSingleView($productSingleView);

    if (is_null($product)) {
        http_response_code(404);
        die();
    } else {
        generateProduct($product);
    }
}

if ($requestUri == "/register") {
    include 'HTML/register.php';
    die();
}

if ($requestUri == '/auth') {
    authorize();
    die();
}

if ($requestUri == '/allUsers') {       //все зарегистрировнные пользователи
    var_dump(getAllUsers());
    die();
}

if ($requestUri == '/authorizedUser') {     //Вывод авторизованного пользователя
    header('Content-Type: application/json');
    foreach (getAllUsers() as $user) {
        if (isset($_SESSION['currentUser']) && $_SESSION['currentUser'] == $user) {
            echo $user['firstName']." ".$user['lastName'];
        }
    }
    die();
}

if ($requestUri == '/registeredUser') {     //Регистрация пользователя
    createUser(getAllData()[0], getAllData()[1], getAllData()[2], getAllData()[3], getAllData()[4], getAllData()[5]);
    header('Location: /');
    die();
}

if ($requestUri == '/logout') {
    session_destroy();
    header('Location: /');
    die();
}

function authorize () {
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    foreach (getAllUsers() as $user) {
        if ($_SESSION['currentUser'] == $user) {
            header("Location: /");
            die();
        } else if ($user['active'] && $user['login'] == $login && password_verify($password, $user['password'])) {
            $_SESSION['currentUser'] = $user;
            header('Location: /');
        } else {
            header('Location: /account');
        }
    }
    die();
}

function getAllData () {
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $password1 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
    $password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
    return array($firstName, $lastName, $login, $number, $password1, $password2);
}

http_response_code(404);
die();
?>