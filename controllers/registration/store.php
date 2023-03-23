<?php

use Core\App;
use Core\Validator;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$errors = [];

if (! Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($password, 7, 255)){
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::container()->resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user){

    header('location: /');
    exit();

} else {
    $db->query('insert into users(email, password) values(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}