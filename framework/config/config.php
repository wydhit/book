<?php


interface Config{

    public function get($path,$default='');/*获取一个配置项*/
    public function set($key,$value);/*设置一个配置项*/
    public function setFromFile($filePath,$fileType='php');/*从文件加载配置*/
    public function cache($cacheFile);/*缓存配置文件*/
}