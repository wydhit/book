<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-05
 * Time: 8:02
 */

namespace Container;


class Model
{
    /**
     * @var string
     */
    private $tableName = "";
    private $connect = null;


    public function create()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @return null
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * @param null $connect
     */
    public function setConnect($connect)
    {
        $this->connect = $connect;
    }


}