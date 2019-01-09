<?php

/*
 * 用户操作
 * */
namespace App\HttpController\Index;
use App\HttpController\BaseWithDb;
use App\Model\User\UserBean;
use App\Model\User\UserModel;
use App\Utility\Pool\MysqlObject;
use App\Utility\Pool\MysqlPool;
use EasySwoole\Component\Pool\Exception\PoolEmpty;
use EasySwoole\Component\Pool\Exception\PoolUnRegister;
use EasySwoole\Component\Pool\PoolManager;
use EasySwoole\Http\Message\Status;

use App\Model\Blog\BlogModel;

class User extends BaseWithDb
{
    public function getusers(){
        $model = new UserModel($this->getDbConnection());
        $data = $model->getAll(1);
        $this->writeJson(Status::CODE_OK, $data, 'success');
    }

    function getblog(){
        $blog_model = new BlogModel($this->getDbConnection());
        $data = $blog_model->getAll();
        $this->writeJson(Status::CODE_OK, $data, 'success');
    }


}


