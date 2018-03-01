<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-22
 * Time: 11:53
 */

namespace Db;


class Execute
{
    /**
     * @var Connection
     */
    private $db;
    private $sql;
    private $pdoStatement;

    public function __construct($db='',$sql='')
    {
        $this->setDb($db);
        $this->setSql($sql);
    }

    public function bindValues($params=[])
    {
        if (empty($params)) {
            return $this;
        }

        $schema = $this->db->getSchema();
        foreach ($params as $name => $value) {
            if (is_array($value)) {
                $this->_pendingParams[$name] = $value;
                $this->params[$name] = $value[0];
            } else {
                $type = $schema->getPdoType($value);
                $this->_pendingParams[$name] = [$value, $type];
                $this->params[$name] = $value;
            }
        }

        return $this;
        
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * @param mixed $sql
     */
    public function setSql($sql)
    {
        if ($sql !== $this->sql) {
            $this->cancelPdoStatement();
            $this->sql= $this->db->quoteSql($sql);
            //Todo
//            $this->_pendingParams = [];
//            $this->params = [];
//            $this->_refreshTableName = null;
        }
    }
    public function cancelPdoStatement()
    {
        $this->pdoStatement = null;
    }


}