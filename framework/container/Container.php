<?php

/**
 * 容器
 *
 * 绑定
 *  类名绑定
 *  接口名绑定
 *  别名绑定
 *
 *  ServiceProvider绑定
 *  json绑定
 *  yaml绑定
 *
 * 绑定方式
 *  单例绑定
 *  非单例绑定
 * 获取
 *  别名获取
 *  接口名获取
 *  类名获取一般无需绑定
 *
 * 注入
 *  构造函数注入
 *  属性注入
 *  方法参数注入Call()
 *
 *
 *
 *
 *
 */

namespace Container;


use Container\Exception\ContainerException;

class Container implements ContainerInterface
{
    private $bind = [];/*最初始的绑定*/
    private $resolved = [];/*解析完的实例*/

    /**
     * @param string $abstract
     * @param null $concrete
     * @param bool $isShare
     * @return mixed|void
     * @throws ContainerException
     */
    public function bind(string $abstract, $concrete = null, bool $isShare = false)
    {
        if (!is_string($abstract) || empty($abstract)) {
            throw new ContainerException("abstract 不可用");
        }
        $concrete = is_null($concrete) ? $abstract : $concrete;

        /*绑定过的怎么办？？ 没有直接绑定*/
        /*是否被解析过？？删除解析 覆盖绑定*/
        $this->bind[$abstract] = [
            'concrete' => $concrete,
            'isShare' => (bool)$isShare
        ];
    }

    public function bindFromJson()
    {/*$this->bind()*/
    }

    public function bindFromYaml()
    {/*$this->bind()*/
    }

    public function bindFromIni()
    {/*$this->bind()*/
    }

    public function bindFromArray(array $array)
    {/*$this->bind()*/
    }

    public function bindFromProvider($provider)
    {/*new $provider();*/
    }


    /**
     * @param string $abstract
     * @param array $parameters
     * @return mixed
     * @throws ContainerException
     */
    public function make(string $abstract, array $parameters = [])
    {
        $trueAbstract = $this->getAlias($abstract);
        $isBind = $this->isBind($trueAbstract);

        if ($isBind) {
            $type = $this->getType($this->bind[$trueAbstract]);
            $concrete = $this->bind[$trueAbstract];
            switch ($type) {
                case 'string':/*类名字符串*/
                    return $this->resolved[$trueAbstract] = $this->resolveString($concrete, $parameters);
                    break;
                case 'function':/*匿名函数*/
                    return $this->resolved[$trueAbstract] = $this->resolveString($concrete, $parameters);
                    break;
                case 'object':/*实例*/
                    return $this->resolved[$trueAbstract] = $concrete;
                    break;
                case 'value':/*实例*/
                    return $this->resolved[$trueAbstract] = $concrete;
                    break;
                default:
                    throw new ContainerException("no Find");
                    break;
            }

        } else {
            return new $trueAbstract();
        }

    }

    private function resolveString($className,array $parameters=[])
    {
        $object = new $className($parameters);
        try {
            $ReflectionClass=new \ReflectionClass($className);
            foreach ($ReflectionClass->getConstructor() as $reflectionClass) {
                $reflectionClass->a;
            }
        } catch (\Exception $e) {

        }
        return $object;

    }

    private function getType($concrete)
    {
        if (is_string($concrete)) {
            return 'string';
        }


        return '';
    }

    /**
     * 是否绑定
     * @param string $abstract
     * @return bool
     */
    private function isBind(string $abstract)
    {
        return isset($this->bind[$abstract]);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getAlias(string $name)
    {
        return $name;
    }

    public function singleton(string $abstract, $concrete = null)
    {

    }

    /**
     * @param $callback mixed 匿名函数|字符串 class@method  class::method | array [$object, method]
     * @param array $parameters
     * @param null $defaultMethod
     * @return mixed
     */
    public function call($callback, array $parameters = [], $defaultMethod = null)
    {
        return "";
    }
}