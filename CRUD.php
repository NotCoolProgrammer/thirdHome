<?php

define('ALL_USERS', 'allUsers.json');

include 'optionalFunctions.php';

/**
 *! Функция создания пользователя
 */
function createUser($firstName, $lastName, $login, $number, $password1, $password2) {
    if ($password1 == $password2) {
        $uuid = generateUuid();
        $users = getAllUsers();
        $user = [
            'uuid' => $uuid,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'login' => $login,
            'number' => $number,
            'password' => password_hash($password1, PASSWORD_BCRYPT),
            'active' => true
        ];
        $users[] = $user;           //!краткая запить добавления элемента в конец массива
        file_put_contents(ALL_USERS, json_encode($users));
        return $user;
    } else {
        throw new Exception ("passwords don't match");
        header('Location: /register');
    }
}



/**
 *! Функция получения всех пользователей 
 */
function getAllUsers() {
    if (file_exists(ALL_USERS)) {       //! Проверяет существует ли файл
        $allUsers = json_decode(file_get_contents(ALL_USERS), true);
        return $allUsers;
    } else {
        throw new Exception ('File with users not found');
    }
}




/**
 *! Функция изменения полей у пользователя
 */
function editUser($uuid, $attributes) {
    $users = array_map(function ($user) use ($uuid, $attributes) {  //! в данном контесте изменяет атрибуты у конкретного пользователя с уникальным uuid
        if ($user['uuid'] == $uuid) {
            return array_merge($user, $attributes);
        } else {
            return $user;
        }
    }, getAllUsers());

    file_put_contents(ALL_USERS, json_encode($users));
}


/**
 *!  Функция удаления пользоватеня (делая его неактивным)
 */
function deleteUser ($uuid) {
    editUser($uuid, ['active' => false]);
}

/**
 *!  Функция получения одного пользователя
 */
function getUser ($uuid) {
    foreach (getAllUsers() as $user) {
        if ($user['uuid'] == $uuid) {
            return $user;
        }
    }
    return null;
}