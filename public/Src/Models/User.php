<?php

namespace Src\Models;

final class User extends Model
{
    public $id;
    public $name;
    public $email;

    public static function getTableName(): string
    {
        return 'users';
    }
}