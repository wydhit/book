<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-04
 * Time: 9:26
 */

namespace Container;


interface ContainerInterface
{
    /**
     * @param $abstract string 别名|接口|类名
     * @param null|mixed $concrete
     * 匿名函数：类名字符串（推荐 自动实例 自动注入 延迟加载）| 返回值作为获取的实例 无法自动注入 可延迟加载 |已经实例化好的类 无法延迟加载 无法自动注入
     * @param bool $shared
     * @return mixed
     */
    public function bind(string $abstract, $concrete = null, bool $shared = false);

    public function singleton(string $abstract, $concrete = null);

    /**
     * 获取实例
     * @param $abstract string 别名 | 接口 | 类名
     * @param array $parameters
     * @return mixed
     */
    public function make( string $abstract, array $parameters = []);


    /**
     * @param $callback mixed 匿名函数|字符串 class@method  class::method | array [$object, method]
     * @param array $parameters
     * @param null $defaultMethod
     * @return mixed
     */
    public function call($callback, array $parameters = [], $defaultMethod = null);


}