<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-09
 * Time: 16:36
 */

namespace Model;


use Container\Container;

class ModelInterface
{
    public function __construct()
    {

    }

    /*模型对应的表名*/
    public function tableName()
    {

        return get_called_class();
    }

    public function fields()
    {
        return get_class_vars(get_called_class());
    }

    public function db()
    {
        return Container::class;
    }

    /**
     * 验证
     */
    public  static  function rules()
    {
    }

    /**
     * 输入元素
     */
    public function element()
    {
        
    }



    public function query()
    {
        
    }
    
    

}