<?php

/**
 * MySQL操作类
 */
class Db
{
    /**
     * @var PDO
     */
    public $pdo = null;
    /**
     * @var PDOStatement
     */
    public $results = null;
    private static $instance;

    private $host;
    private $port = 3306;
    private $dbName;
    private $dbUser;
    private $dbPass;

    public function __construct($host, $dbName, $dbUser, $dbPass)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->connect();
    }

    public static function createDb($host, $dbName, $dbUser, $dbPass)
    {
        if (empty(self::$instance)) {
            self::$instance = new static($host, $dbName, $dbUser, $dbPass);
        }
    }

    /**
     * @return Db
     */
    public static function getDb()
    {
        return static::$instance;
    }

    public function findOne($sql, $array = array())
    {
        $ok = $this->process($sql, $array);
        if ($ok) {
            $this->results->setFetchMode(PDO::FETCH_ASSOC);
            $data = $this->results->fetch();
            return $data;
        } else {
            return false;
        }
    }

    public function findAll($sql, $array = array())
    {
        $ok = $this->process($sql, $array);
        if ($ok) {
            $this->results->setFetchMode(PDO::FETCH_ASSOC);
            $data = $this->results->fetchAll();
            return $data;
        } else {
            return array();
        }
    }

    public function update($sql, $array = array())
    {
        $ok = $this->process($sql, $array);
        if ($ok === false)
            return -1;//执行出错返回-1
        else if ($ok)
            return $this->results->rowCount();
        else
            return 0;
    }

    public function insert($sql, $array = array())
    {
        $ok = $this->process($sql, $array);
        if ($ok) {
            $id = $this->pdo->lastInsertId();
            $id = $id ? $id : 1;
            return $id;
        } else {
            return false;
        }
    }

    public function delete($sql, $array = array())
    {
        $ok = $this->process($sql, $array);
        if ($ok === false)
            return -1;//执行出错返回-1
        else if ($ok)
            return $this->results->rowCount();
        else
            return 0;
    }

    public function query($sql, $array = array())
    {
        return $this->process($sql, $array);
    }

    private function process($sql, $array)
    {
        if (is_null($this->pdo)) {
            $this->connect();
        }
        $this->results = $this->pdo->prepare($sql);
        return $this->results->execute($array);
    }

    private function connect()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbName . ';charset=utf8',
                $this->dbUser,
                $this->dbPass
            );
        } catch (PDOException $error) {
            exit($error->getMessage());
        }
    }
}