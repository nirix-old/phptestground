<?php
require 'Model.php';
require 'SecurePassword.php';

class User extends Model
{
    use SecurePassword;
}

$user = new User(array(
    'username' => "Tester",
    'password' => "hello1234test!@",
    'email'    => "hello@example.com",
    'group_id' => 1
));

$user->save();

echo $user->password;
