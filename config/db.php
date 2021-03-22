<?php

class Database{
    public  static function connect(){
        $db = new mysqli('localhost', 'root', '', 'farmacia');
        $db->query("SET NAMES 'uft8'");
        return $db;
    }
}