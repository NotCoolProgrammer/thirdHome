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


        $dsn = getenv('DATABASE_URL');
        // $dsn = 'postgres://rdffffyfvllvuz:c79972b43175b4125bbc7966d043583fd2953246c6b07594624cb6f8f07e348c@ec2-52-71-55-81.compute-1.amazonaws.com:5432/dt95cukms8q31';
        $database_connection = parse_url($dsn);

        $host = $database_connection['host'];
        $port = $database_connection['port'];
        $user = $database_connection['user'];
        $pass = $database_connection['pass'];
        $database = ltrim($database_connection['path'], '/');


        try {
            $pdo_dsn = 'pgsql:host='.$host.';port='.$port.';dbname='.$database; 
            $pdo = new PDO($pdo_dsn, $user, $pass, $opt);
        } catch (PDOException $exception) {
            die('нету подключения к базе данных');
        }
        // $pdo = new PDO($dsn, $user, $pass, $opt);
    }
    return $pdo;
}



/**
 * Connect к локальной базе (работающий)
 */
// $pdo = null;

// /**
//  * Функция соединения с базой данных
//  */
// function connection () {
//     global $pdo;
//     if (is_null($pdo)) {
//         $opt = [
//             PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//             PDO::ATTR_EMULATE_PREPARES   => false,
//         ];
//         $host = '127.0.0.1';
//         $db   = 'mybrand';
//         $user = 'customer';
//         $pass = 'customer';
//         $charset = 'utf8';

//         $dsn = "pgsql:host=$host;dbname=$db;";
//         try {
//             $pdo = new PDO($dsn, $user, $pass, $opt);
//         } catch (PDOException $exception) {
//             die('нету подключения к базе данных');
//         }
//         // $pdo = new PDO($dsn, $user, $pass, $opt);
//     }
//     return $pdo;
// }