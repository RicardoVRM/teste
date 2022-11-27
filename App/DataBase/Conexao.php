<?php

namespace App\DataBase;

use PDO;

class Conexao
{

    private static $host = "localhost";
    private static $dbName = "SisCad";
    private static $user = "root";
    private static $password = "";
    private $table;

    public static $instance;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->get_instance();
    }

    //Inicia conexão com o DB
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";", self::$user, self::$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;

    }

    /**
     *
     */
    public static function destroy_conexao()
    {

    }

}
