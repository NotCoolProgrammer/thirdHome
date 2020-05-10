<?php

/**
 * Функция связанная с адресной строкой
 */
function startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

/**
 * Функция получения все товаров из базы данных
 */
function getProducts () {
    try {
        $products = getAllProductsToGenerateUniqueOne();
        return json_decode($products, true);
    } catch (InvalidArgumentException $exception) {
        die('Не удалось получить все товары из базы данных');
    }
}

/**
 * Функция получения товара по свойству singleView
 */
function getProductSingleView ($singleView) {
    foreach (getProducts() as $product) {
        if ($product['singleview'] == $singleView) {
            return $product;
        }
    }
    return null;
}

/**
 * Функция генерации товара
 */
function generateProduct ($product) {
    $handleRequest = function () use ($product) {
        include 'php/generateProduct.php';
    };

    include 'HTML/single.php';
    die();
}