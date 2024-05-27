<?php
class database
{
    var $sql, $pdo, $statement;
    function __construct()
    {
        try {
            $this->pdo =  new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';port=' . PORT, USERNAME, PASSWORD);
            $this->pdo->query('set names utf8');
        } catch (PDOException $e) {
            exit('Lỗi kết nối dữ liệu: ' . $e->getMessage());
        }
    }
    function setquery($sql)
    {
        $this->sql = $sql;
        return $this;
    }
    function loadrow($params = [])
    {
        try {
            return $this->exec($params)->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('Lỗi kết thực thi sql: ' . $e->getMessage());
        }
    }
    function loadrows($params = [])
    {
        try {
            return $this->exec($params)->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('Lỗi kết thực thi sql: ' . $e->getMessage());
        }
    }
    function save($params = [])
    {
        try {
            return $this->exec($params);
        } catch (PDOException $e) {
            exit('Lỗi kết thực thi sql: ' . $e->getMessage());
        }
    }
    private function exec($params = [])
    {
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute($params);
        return $this->statement;
    }
    function disconnect()
    {
        $this->pdo = $this->statement = null;
    }
}