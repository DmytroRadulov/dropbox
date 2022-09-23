<?php

use Src\Models\User;

require __DIR__ . '/Src/Models/Model.php';
require __DIR__ . '/Src/Models/User.php';




$user = User::find(1);
var_dump($user); // SELECT * FROM user WHERE id = :id

$user = User::findAll();
var_dump($user);

$user = new User;
$user->name = 'John';
$result = $user->save();
var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id

$user = new User;
$result = $user->delete();
var_dump($result); // DELETE FROM user WHERE id = :id

$user = new User;
$user->id = 1;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)


