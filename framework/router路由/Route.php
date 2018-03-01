<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-10-26
 * Time: 11:26
 */

class Route
{

    public function __construct($path,$where,$name)
    {
        $path=[
            'call'=>'function|indexController@index|indexController::index',
            'namespace'=>'app/Controller',
            'middle'=>[]
        ];
        $where=['$http'=>[],'$host'=>[],'$uri'=>'','$get'=>[],'$method'=>[],'$header','$cookie'];
        $name='home';
    }

    public function look($request)
    {
        if($this->validHttp($request->http)==false){
            return false;
        }

        if($this->validhost($request->host)==false){
            return false;
        }
        if($this->validuri($request->uri)==false){
            return false;
        }
        if($this->validget($request->get)==false){
            return false;
        }
        if ($this->validmethod($request->method) == false) {
            return false;
        }
        if ($this->validheader($request->header) == false) {
            return false;
        }
        if ($this->validcookie($request->cookie) == false) {
            return false;
        }



    }

}