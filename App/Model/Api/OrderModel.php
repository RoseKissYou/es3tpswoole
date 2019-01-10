<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/10
 * Time: 14:02
 */
namespace App\Model\Api;

use App\Model\BaseModel;
class OrderModel extends BaseModel
{
    protected $table = 'think_ordertype';
    // 展示所有订单类型数据
    function show_order_type(int $page = 1, int $pageSize = 10){
        $data = $this->getDbConnection()->withTotalCount()->orderBy('id', 'DESC')->get($this->table, [($page - 1) * $pageSize, $page * $pageSize]);
        $total = $this->getDbConnection()->getTotalCount();
        return ['data' => $data, 'total' => $total];
    }

    //新增订单分类
    function add_order_type($params){
        // 检查名字是否重复
        $dbConnect = $this->getDbConnection();
        $has_name = $dbConnect->where('name',$params['name'])->get($this->table);
        if($has_name){
            return 0;
        }else{
            $data =  $dbConnect->rawQuery("INSERT INTO think_ordertype ( name, stands) VALUES ('".$params['name']."', '".$params['stands']."')");
//            $data = ['name'=>$params['name'],'stands'=>$params['stands'],'create_time'=>time()];
//            $dbConnect->insert($this->table,$data);
            return $data;
        }
    }




}