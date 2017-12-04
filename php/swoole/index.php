<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-12-01
 * Time: 9:11
 */
require "aoutload.php";
require "bootstrap.php";
$app=new App(__DIR__);
$app->start();
class App
{

    private $http_server;
    private $tcp_server;
    private $app_dir;

    public function __construct($appDir)
    {
        $this->app_dir=$appDir;
        $config=$this->getConfig();
        $di->set("config",$config);
        $di->registerProviders($config['provider']);
        $di->registerProvider(\Swoole\Server::class);
    }

    public function getConfig()
    {
        return [];
    }

    public function start()
    {
        $this->startHttpServer();
        $this->startTcpServer();
    }

    public function startHttpServer()
    {
        $this->http_server = new Swoole\Http\Server("127.0.0.1");
    }

    public function startTcpServer()
    {
        $this->tcp_server = new Swoole\Server("127.0.0.1", '8989');
    }

}