<?php


/**
 * Функция получения всех данных с формы регистрации
 *
 * @return array
 */
function getAllData () {
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $password1 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
    $password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    return array($firstName, $lastName, $login, $password1, $password2, $number);
};


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
            header('Location: /');
            die();
        } else {
            header('Location: /account');
        }
    }
    die();
}



?>