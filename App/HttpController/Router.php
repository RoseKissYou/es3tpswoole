<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/9
 * Time: 11:24
 */

namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\AbstractRouter;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use FastRoute\RouteCollector;

class Router extends AbstractRouter
{

    function initialize(RouteCollector $routeCollector)
    {
//        $this->setGlobalMode(true);
//        $this->setGlobalMode(false);
//        $this->setMethodNotAllowCallBack(function (Request $request,Response $response){
//            $response->write('未找到处理方法');
//        });
//        $this->setRouterNotFoundCallBack(function (Request $request,Response $response){
//            $response->write('未找到路由匹配');
//        });
        // TODO: Implement initialize() method.
        $routeCollector->get('/user','/index.html');
        $routeCollector->get('/test','/Index/test');
        $routeCollector->get('/rpc','/Rpc/test');
        $routeCollector->get('/FastCache','/FastCache/index');
    }
}