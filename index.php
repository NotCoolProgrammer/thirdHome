<?php
session_start();
include 'CRUD.php';
define('PRODUCTSinBASKET', 'goods/productsInBasket.json');

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
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
    if ($requestMethod == 'POST' && isset($_SESSION['currentUser'])) {
        $products = json_decode(file_get_contents(PRODUCTSinBASKET), true);
        // $file = fopen('goods/productsInBasket.json', 'w+');
        $id = $_POST['id'];
        $price = $_POST['price'];
        $name = $_POST['name'];
        $singleView = $_POST['singleView'];
        $imgSrc = $_POST['img'];
        $product = ['id' => $id, 'price' => $price, 'name' => $name, 'imgSrc' => $imgSrc, 'singleView' => $singleView];
        $products[] = $product;
        // fwrite($file, json_encode($products));
        // fclose($file);
        file_put_contents(PRODUCTSinBASKET, json_encode($products));
        die();
    } 
    // else {
    //     $handleRequest = function () {
    //         echo 'Вы не авторизованы, пожалуйста пройдите по ссылке http://mybrand.com/account';
    //     };
    // }
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

    //если не существует такого значения у свойства singleView у продукта, то 404
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
    // session_start();
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
    // unset($_COOKIE);
    header('Location: /');
    die();
}

/**
 * Функция авторизации
 */
function authorize () {
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    foreach (getAllUsers() as $user) {
        if ($_SESSION['currentUser'] == $user) {
            header("Location: /");
            die();
        } else if ($user['active'] && $user['login'] == $login && password_verify($password, $user['password'])) {
            $_SESSION['currentUser'] = $user;
            // $user['products'] = [];     //добавляю свойство products, в которое можно было бы
            //в последствии добавлять товары у авторизованного пользователя и выводить их в корзине
            // file_put_contents(PRODUCTSinBASKET, json_encode($user));
            header('Location: /');
            die();
        } else {
            header('Location: /account');
        }
    }
    die();
}

/**
 * Функция получения всех данных с формы регистрации
 */
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