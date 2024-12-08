<?php

require_once __DIR__ . '/../helpers.php';

// Виносимо даних із $_POST в окремі змінні

$avatarPath = null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

// Виконуємо валідацію отриманих даних із форми

if (empty($name)) {
    setValidationError('name', 'Неправильне Ім\'я');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Вказана не правильна пошта');
}

if (empty($password)) {
    setValidationError('password', 'Пароль пустий');
}

if ($password !== $passwordConfirmation) {
    setValidationError('password', 'Паролі не співпадають');
}

if (!empty($avatar)) {
    $types = ['image/jpeg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        setValidationError('avatar', 'Зображення профілю має неправильний тип');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        setValidationError('avatar', 'Зображення має бути менше 1 мб');
    }
}

// Якщо список з помилками валідації не порожній, то виконуємо редирект назад на форму
if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);
    redirect('/register.php');
}

// Завантажуємо аватарку, якщо вона була відправлена ​​у формі

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (name, email, avatar, password) VALUES (:name, :email, :avatar, :password)";

$params = [
    'name' => $name,
    'email' => $email,
    'avatar' => $avatarPath,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (\Exception $e) {
    die($e->getMessage());
}

redirect('/');
