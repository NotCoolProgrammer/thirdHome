<?php
/**
 * Функция генерации uuid
 */
function generateUuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

/**
 * Функция связанная с адресной строкой
 */
function startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

/**
 * Функция получения все товаров из файла
 */
function getProducts () {
    $data = json_decode(file_get_contents('goods/goods.json'), true);
    return $data;
}

/**
 * Функция получения товара по свойству singleView
 */
function getProductSingleView ($singleView) {
    foreach (getProducts() as $product) {
        if ($product['singleView'] == $singleView) {
            return $product;
        }
    }
    return null;
}

/**
 * Функция генерации товара
 */
function generateProduct ($product) {
    $scriptAssets = ['../js/generationProducts.js'];
    $handleRequest = function () use ($product) {
        include 'php/generateProduct.php';
    };

    include 'HTML/single.php';
    die();
}