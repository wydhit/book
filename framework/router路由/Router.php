<?php


/**
 * Class Router
 * 路由条件     协议[http|https]
 *             Host [*.a.com|3.*.d.com]
 *             uri
 *             get参数
 *             请求方法 post
 *             header参数
 *             cookie
 * 路由参数
 * 1、匿名函数 function
 * 2、一个可执行函数名   'function'
 * 3、一个类+一个方法 'class@function实例方法' 'class::function静态方法'
 * 4、'命名空间'
 * 5、参数 params
 */


class Router{
    /**
     * @var Route[]
     */
    public $allRoute=[];
    public $routerWheres=[];
    public $routerName=[];
    private $i=0;

    public function url($name,$param=[],$get=[])
    {

    }
    public function add($path,$where,$name='')
    {
        $name=empty($name)?$this->i:$name;/*md5(join(array_merge($path,$where,$name)))*/
        $this->allRoute[$name]=new Route($path);
        $this->routerWheres[$name]=$where;
        $this->i++;
    }

    public function aas()
    {

    }

/*$path=[
'type'=>'redirect|function|view';
'call'=>'function|indexController@index|indexController::index',
'namespace'=>'app/Controller',
'middle'=>[]
];
$where=['$uri'=>'','$method'=>[],'$http'=>[],'$host'=>[],'$get'=>[],'$header','$cookie'];
$name='home';*/

    public function method($method='get',$uri='/',$path)
    {
        $where['method']=$method;
        $paths['call']=$path;
        $num=$this->add($paths,$where);
        return$this->allRouter[$num];
    }

    public function group($path,$where,$callable)
    {
        

    }

    public static function aa()
    {
        (new static())->group([],[],function (){

        });

    }


    public function look($request)
    {
//        $requestHash=md5(json_encode($request));
        foreach ($this->routerWheres as $k=>$routerWhere) {
            if($this->valid($request,$routerWhere)){
//                $this->cache($requestHash,$k);
                return $this->allRoute[$k];
            }
        }
        return false;
    }
    public function valid($request,$where){
        foreach ($where as $k=>$item) {
            $validName='valid'.$k;
            $res=$this->$validName($request,$item);
            if($res===false){
                return false;
            }
        }
        return true;
    }

    public function handle($request)
    {
        $route=$this->look($request);
        $route->preAction();/*预处理*/
    }

    public function cache($requestHash,$num)
    {
        
    }

    public function getCache($requestHash)
    {
        return 11;
    }


}