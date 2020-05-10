<?php

include 'optionalFunctions.php';


class InvalidLoginException extends Exception {};

/**
 * Функция создания нового пользователя
 *
 * @param  mixed $firstName
 * @param  mixed $lastName
 * @param  mixed $login
 * @param  mixed $password1
 * @param  mixed $password2
 * @param  mixed $number
 * @throws InvalidArgumentException passwords must be the same
 * @throws LengthException password length must be >= 5
 * @throws InvalidLoginException login is not unique
 */
function createUser($firstName, $lastName, $login, $password1, $password2, $number) {
    if (mb_strlen($password1) < 5  || mb_strlen($password2) < 5) {
        throw new LengthException ('password length < 5');
    }

    try {
        if ($password1 === $password2) {
            $password = password_hash($password1, PASSWORD_BCRYPT);
            $pdo = connection();                                    //запрос
            $query = $pdo -> prepare("Insert into users (firstname, lastname, login, password, 
            active, number) values (?, ?, ?, ?, ?, ?)");
            $query -> execute([$firstName, $lastName, $login, $password, true, $number]);
        } else {
            throw new InvalidArgumentException ("passwords are not equal");
            die();
        }
    } catch (PDOException $exception) {
        throw new InvalidLoginException('invalid login');
    }
}



/**
 * Функция получения всех пользователей
 *
 * @return array
 * @throws InvalidArgumentException invalid returned array
 */
function getAllUsers() {
    try {
        $pdo = connection();                                    //запрос
        $query = $pdo -> prepare('Select * from users');
        $query -> execute();
        $result = $query -> fetchAll();
        return $result;
    } catch (PDOException $exception) {
        throw new InvalidArgumentException('invalid returned array');
    }
}




//на сайте нету страницы с редактированием и удалением пользователя, поэтому
//нижние функции пока закомментировал

// /**
//  * Функция изменения полей у пользователя
//  */
// function editUser($uuid, $attributes) {
//     $users = array_map(function ($user) use ($uuid, $attributes) {  // в данном контесте изменяет атрибуты у конкретного пользователя с уникальным uuid
//         if ($user['uuid'] == $uuid) {
//             return array_merge($user, $attributes);
//         } else {
//             return $user;
//         }
//     }, getAllUsers());

//     // file_put_contents(ALL_USERS, json_encode($users));
// }

// /**
//  *  Функция удаления пользоватеня (делая его неактивным)
//  */
// function deleteUser ($uuid) {
//     editUser($uuid, ['active' => false]);
// }

// /**
//  *  Функция получения одного пользователя
//  */
// function getUser ($uuid) {
//     foreach (getAllUsers() as $user) {
//         if ($user['uuid'] == $uuid) {
//             return $user;
//         }
//     }
//     return null;
// }