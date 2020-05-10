<?php

class IncorrectDeletionOfAllProducts extends Exception {};

/**
 * Удаление продукта из базы данных и получение всех остальных продуктов
 * @return array
 * @throws InvalidArgumentException invalid returned data array
 */
function deleteProduct () {
    try {
        $idProduct = json_decode($_POST['idProduct']);
        $idUser = json_decode($_POST['userSessionID']);
    
        $pdo = connection();                                    //запрос
        $query1 = $pdo -> prepare("delete from users_products where users_products.uniqueID = ? and users_products.user_id = ?");
        $query1 -> execute([$idProduct, $idUser]);
    
        $query2 = $pdo -> prepare("Select users_products.uniqueID, products.imgToDisplay, products.price, products.singleView,
            products.delivery, products.name, products.id
            from products
            left join users_products on products.id = users_products.product_id
            left join users on users_products.user_id = users.id
            where users.id = ?");
        $query2 -> execute([$idUser]);
        $allProducts = $query2 -> fetchAll();
        echo json_encode($allProducts);
        die();
    } catch (PDOException $exception) {
        throw new InvalidArgumentException ('invalid returned data array');
    }
};


/**
 * Получение всех продутов, чтобы все их сгенерировать
 * @return array 
 * @throws InvalidArgumentException invalid returned data array
 */
function getAllProductsToGenerateThem() {
    try {
        $pdo = connection();                                    //запрос
        $query = $pdo -> prepare('Select * from products');
        $query -> execute();
        $products = $query -> fetchAll();
        echo json_encode($products);
        die();
    } catch (PDOException $exception) {
        throw new InvalidArgumentException ('invalid returned data array');
    }
};


/**
 * Получение всех продуктов, чтобы сгенерировать один уникальный
 *
 * @return array
 * @throws InvalidArgumentException invalid returned data array
 */
function getAllProductsToGenerateUniqueOne () {
    try {
        $pdo = connection();                                    //запрос
        $query = $pdo -> prepare('Select * from products');
        $query -> execute();
        $products = $query -> fetchAll();
        return json_encode($products);
    } catch (PDOException $exception) {
        throw new InvalidArgumentException ('invalid returned data array');
    }
};


/**
 * Получение всех товаров конкретного пользователя
 *
 * @return array
 * @throws InvalidArgumentException invalid returned data array
 */
function getAllUserProductsFromDB () {
    try {
        $userSessionID = json_decode($_POST['userSessionID']);
        $pdo = connection();                                    //запрос
        $query = $pdo -> prepare("Select users_products.uniqueID, products.imgToDisplay, products.price, products.singleView,
            products.delivery, products.name, products.id
            from products
            left join users_products on products.id = users_products.product_id
            left join users on users_products.user_id = users.id
            where users.id = ?");
        $query -> execute([$userSessionID]);
        $allProducts = $query -> fetchAll();
        echo json_encode($allProducts);
        die();
    } catch (PDOException $exception) {
        throw new InvalidArgumentException ('invalid returned data array');
    }
}

/**
 * Функция получения сессии пользователя
 */
function getUserSession () {
    echo json_encode($_SESSION['currentUser'], JSON_UNESCAPED_UNICODE);
    // die();
}


/**
 * Функция добавления товара в корзину
 *
 * @param  mixed $idProduct
 * @param  mixed $idUser
 * @throws InvalidArgumentException can not return product to cart
 * 
 */
function addProductToCart ($idProduct, $idUser) {
    try {
        $pdo = connection();                                    //запрос
        $query = $pdo -> prepare("Insert into users_products (user_id, product_id) values (?, ?)");
        $query -> execute([$idUser, $idProduct]);
    } catch (PDOException $exception) {
        throw new InvalidArgumentException ('can not return product to cart');
    }
};


/**
 * Функция получения общей стоимости товара конкретного пользователя из базы данных
 * 
 * @throws InvalidArgumentException invalid sum of all products
 * @return void
 */
function getTotalPriceOfProducts () {
    try {
        $userSessionID = json_decode($_POST['userSessionID']);
        $pdo = connection();
        $query = $pdo -> prepare("select sum(products.price)
            from products
            left join users_products on products.id = users_products.product_id
            left join users on users_products.user_id = users.id
            where users.id = ?");
        $query -> execute([$userSessionID]);
        $totalPrice = $query -> fetch();
        echo json_encode($totalPrice);
        die();
    } catch (PDOException $exception) {
        throw new InvalidArgumentException ('invalid sum of all products');
    }
}

/**
 * Функция удаления всех товаров при выходе пользователя из его аккаунта
 *
 * @param  mixed $userId
 * @throws IncorrectDeletionOfAllProducts 
 */
function deleteAllProducts ($userId) {
    try {
        $pdo = connection();
        $query = $pdo -> prepare("delete from users_products where user_id = ?");
        $query -> execute([$userId]);
    } catch (PDOException $exception) {
        throw new IncorrectDeletionOfAllProducts ('Incorrect deletion of all products');
    }
}