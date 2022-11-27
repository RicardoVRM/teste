<?php

namespace App\Models\ModelBase;

use App\DataBase\Conexao;
use PDO;
use PDOException;

class ClienteModel extends Conexao
{
    /**
     * Metodo para criar o Cliente
     */
    public function createClient($table, $data)
    {
        try {

            #
            $arrayObj = get_object_vars($data);

            #
            $pdo = parent::get_instance();
            $fields = implode(", ", array_keys($arrayObj)); //campos via array
            $values = ":" . implode(", :", array_keys($arrayObj)); //valores via array

            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            $statement = $pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $statement->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            return $statement->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Método para listar
     */
    public static function listClient($table)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table ORDER BY name ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método para deletar
     */
    public function deleteClient($table, $id)
    {
        try {
            $pdo = parent::get_instance();
            $sql = "DELETE FROM $table WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);

            return $statement->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Método para carregar formulário
     */
    public static function getInfo($table, $id)
    {
        try {
            $pdo = parent::get_instance();
            $sql = "SELECT * FROM $table WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Método para atualizar
     */
    public function updateClient($table, $data, $id)
    {
        try {
            $pdo = parent::get_instance();
            $new_values = "";
            foreach ($data as $key => $value) {
                $new_values .= "$key=:$key, ";
            }
            $new_values = substr($new_values, 0, -2);
            $sql = "UPDATE $table SET $new_values WHERE id = :id";
            $statement = $pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $statement->bindValue(":$key", $value, PDO::PARAM_STR);
            }

            return $statement->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
