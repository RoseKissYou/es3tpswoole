<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/9
 * Time: 20:53
 */
namespace App\HttpController\Api;

use App\HttpController\BaseWithDb;
use App\Model\User\UserBean;
use App\Model\User\UserModel;
use App\Utility\Pool\MysqlObject;
use App\Utility\Pool\MysqlPool;
use EasySwoole\Component\Pool\Exception\PoolEmpty;
use EasySwoole\Component\Pool\Exception\PoolUnRegister;
use EasySwoole\Component\Pool\PoolManager;
use EasySwoole\Http\Message\Status;
// ad model
use App\Model\Api\AdModel;

class Ad extends BaseWithDb
{
    // 模板消息跳转链接API
    function manyurls(){
        $params = $this->request()->getRequestParam();
        $model = new AdModel($this->getDbConnection());
        $data = $model->geturl($params['id']);
        return $this->writeJson(Status::CODE_OK, $data, 'success');
    }

}