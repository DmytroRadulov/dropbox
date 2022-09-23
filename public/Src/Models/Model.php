<?php

namespace Src\Models;

abstract class Model
{
    abstract public static function getTableName(): string;

    public static function find($id)
    {
        $nameTable = static::class::getTableName();
        $sql = ' SELECT * FROM ' . $nameTable . ' WHERE id = :id; ';
        return $sql;
    }

    public static function findAll()
    {
        $nameTable = static::class::getTableName();
        $sql = ' SELECT * FROM ' . $nameTable . ';';
        return $sql;
    }

    public function delete()
    {
        $nameTable = static::class::getTableName();
        $sql = ' DELETE FROM ' . $nameTable . ' WHERE id = :id; ';
        return $sql;
    }

    public function create()
    {
        $nameTable = static::class::getTableName();
        $data = get_object_vars($this);
        $property = array_keys($data);
        $property2 = array_map(function ($item) {
            return ':' . $item;
        }, $property);
        $sql = 'INSERT ' . $nameTable . '(' . implode(', ', $property) . ') VALUE (' . implode(', ', $property2) . ');';
        return $sql;
    }

    public function update()
    {
        $nameTable = static::class::getTableName();
        $data = get_object_vars($this);
        $property = array_keys($data);
        $property2 = array_map(function ($item) {
            return $item . ' = :' . $item;
        }, $property);
        $sql = 'UPDATE ' . $nameTable . ' SET ' . implode(', ', $property2) . ' WHERE id = :id;';
        return $sql;
    }

    public function save()
    {
        if (is_null($this->id)) {
            return $this->create();
        }
        return $this->update();
    }
}

