<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/10
 * Time: 14:00
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

use App\Model\Api\OrderModel;

// 订单分类操作
class Order extends BaseWithDb
{
    // ------------------------------  订单分类  ordertype ------------------------- //
    // 展示所有订单分类数据  http://es3.aeball.cn:9509/api/order/show_order_type
    function show_order_type(){
        $order_model = new OrderModel($this->getDbConnection());
        $data = $order_model->show_order_type(1,10);
        return $this->writeJson(Status::CODE_OK, $data, 'success');
    }

    //新增订单分类
    function add_order_type(){
        $params = $this->request()->getRequestParam();
        $order_model = new OrderModel($this->getDbConnection());
        if(empty($params['name'])){
            return $this->writeJson(Status::CODE_BAD_GATEWAY,'订单名称不能为空','error');
        }else{
            $data = $order_model->add_order_type($params);
            return  $this->writeJson(Status::CODE_OK,$data,'success');
        }
    }

    function add_order_type1(){
        $params = $this->request()->getRequestParam();
        $order_model = new OrderModel($this->getDbConnection());
        if(empty($params['name'])){
            return $this->writeJson(Status::CODE_BAD_GATEWAY,'订单名称不能为空','error');
        }else{
            $data = $order_model->add_order_type($params['name'],$params['stands']);
            return  $this->writeJson(Status::CODE_OK,$data,'success');
        }
    }

    //
    function apost(){
        $params = $this->request()->getRequestParam();
        return  $this->writeJson(Status::CODE_OK,$params,'success');
    }

    function bpost(){
        $params = $this->request()->getRequestParam();
        $data = [
            'name'=>$params['name'],'stands'=>$params['stands']
        ];
        return  $this->writeJson(Status::CODE_OK,$data,'success');
    }




}