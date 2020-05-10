<?php 

$pdo = null;

/**
 * Функция соединения с базой данных
 */
function connection () {
    global $pdo;
    if (is_null($pdo)) {
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $host = '127.0.0.1';
        $db   = 'mybrand';
        $user = 'customer';
        $pass = 'customer';
        $charset = 'utf8';

        $dsn = "pgsql:host=$host;dbname=$db;";
        try {
            $pdo = new PDO($dsn, $user, $pass, $opt);
        } catch (PDOException $exception) {
            die('нету подключения к базе данных');
        }
        // $pdo = new PDO($dsn, $user, $pass, $opt);
    }
    return $pdo;
}