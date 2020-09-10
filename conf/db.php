<?php

//класс конфигурации базы данных

class DB {
    const USER = 'root';
    const PASS = '';
    const HOST = 'localhost';
    const DB = 'mvc';

    public static function db_connect() {

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $connect = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);
        return $connect;
    }
}