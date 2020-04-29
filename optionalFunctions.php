<?php

function generateUuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

function startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function getProducts () {
    $data = json_decode(file_get_contents('goods/goods.json'), true);
    return $data;
    // var_dump($data);
}

function getProductSingleView ($singleView) {
    foreach (getProducts() as $product) {
        if ($product['singleView'] == $singleView) {
            return $product;
        }
    }
    return null;
}

function generateProduct ($product) {
    $scriptAssets = ['../js/generationProducts.js'];
    $handleRequest = function () use ($product) {
        include 'php/generateProduct.php';
    };

    include 'HTML/single.php';
    die();
}