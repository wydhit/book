<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-22
 * Time: 11:45
 */

namespace Db;


class Connection
{
    private $dsn;
    private $username;
    private $password;
    private $charset;
    private $driverName;
    private $executeClass = 'Db\Execute';
    private $tablePrefix = '';
    private $schema;

    public function __construct($config = [])
    {
        isset($config['dsn']) && $this->dsn = $config['dsn'];
        isset($config['username']) && $this->username = $config['username'];
        isset($config['password']) && $this->password = $config['password'];
        isset($config['charset']) && $this->charset = $config['charset'];
        isset($config['driverName']) && $this->driverName = $config['driverName'];
        if (isset($config['executeClass']) && class_exists($config['executeClass'])) {
            $this->executeClass = $config['executeClass'];/*执行器*/
        }
    }

    /**
     * 执行一条sql
     * @param string $sql
     * @param array $params
     */
    public function execute($sql = "", $params = [])
    {
        /** @var Execute $execute */
        $execute = new $this->executeClass([
            'db' => $this,
            'sql' => $sql,
        ]);
        return $execute->bindValues($params);
    }

    /*处理特殊表名 把表名用引号包起来*/
    public function quoteTableName($name)
    {
        //Todo
        return $this->getSchema()->quoteTableName($name);
    }

    /*处理特殊字段名  把字段名用引号包起来*/
    public function quoteColumnName($name)
    {//Todo
        return $this->getSchema()->quoteColumnName($name);
    }

    /**
     * 处理sql 把 [[columnName]] {{tableName}}转为各种数据库对应的写法
     * @param $sql
     * @return null|string|string[]
     */
    public function quoteSql($sql)
    {
        return preg_replace_callback(
            '/(\\{\\{(%?[\w\-\. ]+%?)\\}\\}|\\[\\[([\w\-\. ]+)\\]\\])/',
            function ($matches) {
                if (isset($matches[3])) {
                    return $this->quoteColumnName($matches[3]);
                } else {
                    return str_replace('%', $this->tablePrefix, $this->quoteTableName($matches[2]));
                }
            },
            $sql
        );
    }

    public function getSchema()
    {
        if ($this->schema !== null) {
            return $this->schema;
        } else {
            $driver = $this->getDriverName();
            if (isset($this->schemaMap[$driver])) {
                $config = !is_array($this->schemaMap[$driver]) ? ['class' => $this->schemaMap[$driver]] : $this->schemaMap[$driver];
                $config['db'] = $this;

                return $this->_schema = Yii::createObject($config);
            } else {
                throw new NotSupportedException("Connection does not support reading schema information for '$driver' DBMS.");
            }
        }
    }
}