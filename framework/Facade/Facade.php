<?php


abstract class Facade
{
    protected static $di;
    protected static $diGetServiceMethod = '';
    protected static $resolvedInstance;

    protected static function init()
    {
        
    }
    /**
     * @param mixed $di
     */
    protected static function setDi($di)
    {
        self::$di = $di;
    }

    /**
     * @param string $diGetServiceMethod
     */
    protected static function setDiGetServiceMethod($diGetServiceMethod)
    {
        self::$diGetServiceMethod = $diGetServiceMethod;
    }

    protected static function getFacadeAccessor()
    {
        return '';
    }

    protected static function resolveFacadeInstance($name)
    {
        if (is_object($name)) {
            return $name;
        }
        if (isset(static::$resolvedInstance[$name])) {
            return static::$resolvedInstance[$name];
        }
        $diGetServiceMethod = static::$diGetServiceMethod;
        if (empty($diGetServiceMethod)) {
            $instance = static::$di[$name];
        } else {
            $instance = static::$di->$diGetServiceMethod($name);
        }
        return static::$resolvedInstance[$name] = $instance;
    }

    protected static function getFacadeRoot()
    {
        return static::resolveFacadeInstance(static::getFacadeAccessor());
    }
    public static function __callStatic($method, $args)
    {
        static::init();
        $instance = static::getFacadeRoot();
        if (!$instance) {
            throw new \Exception('A facade root has not been set.');
        }
        return $instance->$method(...$args);
    }
}