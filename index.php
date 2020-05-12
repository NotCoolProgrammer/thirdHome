<?php
session_start();

include 'CRUD.php';
include 'config.php';
include 'php/workWithDataOfDatabase.php';
include 'php/registration&AuthFormData.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];


if ($requestUri == "/") {
    // connection();
    // die();

    include 'HTML/main.php';
    die();
}

if ($requestUri == "/account") {
    include 'HTML/account.php';
    die();
}

if ($requestUri == "/checkout") {
    if ($requestMethod == "POST" && isset($_SESSION['currentUser'])) {
        $idProduct = $_POST['id'];
        $idUser = $_SESSION['currentUser']['id'];
        try {
            addProductToCart($idProduct, $idUser);
        } catch (InvalidArgumentException $exception) {
            die ('Не удалось добавить товар в корзину');
        }
    }
    include 'HTML/checkout.php';
    die();
}

if ($requestUri == "/cart") {
    try {
        getAllUserProductsFromDB();
        die();
    } catch (InvalidArgumentException $exception) {
        die ('Не удалось получить товары пользователя из базы данных');
    }
    // getAllUserProductsFromDB();
    // die();
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
    authorize();
    die();
}

if ($requestUri == '/allUsers') {       //все зарегистрировнные пользователи
    try {
        var_dump(getAllUsers());
        die();
    } catch (InvalidArgumentException $exception) {
        die('Не валидный массив данных всех пользователей');
    }
}


if ($requestUri == '/session') {       //все зарегистрировнные пользователи
    getUserSession();
    die();
}

if ($requestUri == '/authorizedUser') {     //Вывод авторизованного пользователя
    header('Content-Type: application/json');
    foreach (getAllUsers() as $user) {
        if (isset($_SESSION['currentUser']) && $_SESSION['currentUser'] == $user) {
            echo $user['firstname']." ".$user['lastname'];
        }
    }
    die();
}

if ($requestUri == '/registeredUser') {     //Регистрация пользователя
    if ($requestMethod == "POST") {
        try {
            createUser(getAllData()[0], getAllData()[1], getAllData()[2], getAllData()[3], getAllData()[4], getAllData()[5]);
            header('Location: /');
        } catch (LengthException $exception) {
            die('Слишком короткий пароль');
        } catch (InvalidLoginException $exception) {
            die('Логин уже существует');
        } catch (InvalidArgumentException $exception) {
            die('Не одинаковые пароли');
        };
        die();
    }
}

if ($requestUri == '/logout') {
    $userId = $_SESSION['currentUser']['id'];
    try {
        deleteAllProducts($userId);
        session_destroy();    
        header('Location: /');
        die();
    } catch (IncorrectDeletionOfAllProducts $exception) {
        die ('Не получилось удалить все товары после выхода из аккаунта');
    }
}

if ($requestUri == '/productsFromPostgres') {
    try {
        getAllProductsToGenerateThem();
        die();
    } catch (InvalidArgumentException $exception) {
        die('Не удалось получить все товары из базы данных');
    };
}

if ($requestUri == '/deleteProduct') {
    try {
        deleteProduct();
    } catch (InvalidArgumentException $exception) {
        die('Не получилось удалить продукт');
    }
}

if ($requestUri == '/totalPrice') {
    try {
        getTotalPriceOfProducts();
        die();
    } catch (InvalidArgumentException $exception) {
        die ('Не удалось получить общую стоимость товара');
    }
}

http_response_code(404);
die();
?>