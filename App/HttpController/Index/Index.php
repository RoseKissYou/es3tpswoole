<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/9
 * Time: 11:25
 */

namespace  App\HttpController\Index;

use EasySwoole\EasySwoole\Logger;
use EasySwoole\EasySwoole\ServerManager;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;
// add  for json
use EasySwoole\Core\Http\Request;
use EasySwoole\Core\Http\Response;


class Index extends Controller
{

    function index()
    {
        $ip = ServerManager::getInstance()->getSwooleServer()->connection_info($this->request()->getSwooleRequest()->fd);
//        var_dump($ip);
        $this->response()->write('your ip:'.$ip['remote_ip']);
        $this->response()->write('Index Controller is run');
        // TODO: Implement index() method.
    }

    function home(){

    }

    // 微信检查



}