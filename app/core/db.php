<?php

namespace mvc\core;

use PDO;
use PDOException;

class db
{
    private  $connection;
    private $table;
    private $statement;
    function __construct()
    {
        $this->connection_db();
        $this->get_class_name();
    }
    private function get_class_name()
    {
        $this->table = substr(static::class, 11, -5);
    }
    private function connection_db()
    {
        try {
            $this->connection = new PDO(dsn, DB_USER . DB_PASS);
        } catch (PDOException $e) {
            echo "connect to database failed" . $e->getMessage();
            die;
        }
    }
    private function prepare($query)
    {
        $this->statement = $this->connection->prepare($query);
    }
    private function execute($data)
    {
        if ($this->statement->execute($data)) {
            return true;
        }
        return false;
    }
    protected function insert($data)
    {
        $fields = '';
        $values = '';
        foreach ($data as $k => $v) {
            $fields .= "$k ,";
            $values .= ":$k ,";
        }
        $fields = substr($fields, 0, -1);
        $values =  substr($values, 0, -1);
        $query = "INSERT INTO  $this->table ($fields) VALUES($values)";
        $this->prepare($query);
        return $this->execute($data);
    }
    protected function update($data, $id)
    {

        $sup_query = '';
        foreach ($data as $k => $v) {
            $sup_query .= "$k=:$k,";
        }
        $sup_query = substr($sup_query, 0, -1);
        $query = "UPDATE $this->table SET $sup_query Where id=$id";
        $this->prepare($query);
        return $this->execute($data);
    }
    protected function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->prepare($query);
        $data = ['id' => $id];
        return $this->execute($data);
    }
    protected function all($query)
    {
        $q = $this->connection->query($query);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function count_row()
    {
        $query = "SELECT COUNT(*) FROM $this->table";
        $num = $this->connection->query($query);
        return $num->fetchColumn();
    }


    function __destruct()
    {
    }
}
