<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/9
 * Time: 20:57
 */
namespace App\Model\Api;

use App\Model\BaseModel;

class AdModel extends BaseModel
{
    protected $table = 'think_wxurls';

    function aeup(){
      $data =   $this->getDbConnection()->where('id',1)->update('jump_reads=jump_reads+1 ');
        return empty($data) ? null : $data;
    }

    function geturl(int $id){
        $url_postfix = $this->getDbConnection()->where('id',$id)->getOne($this->table);
//        $url_postfix = $url_postfix[0];
        if($url_postfix){
            $map = 'status = 1 AND type = 2 AND pid = '. $url_postfix['pid'];
            $url_domain = $this->getDbConnection()->where($map)->getOne($this->table);
            if($url_domain){
                // 自增访问量
                $this->getDbConnection()->where('id',$url_domain['id'])->update('jump_reads=jump_reads+1 ');


            }

            return [
                'url_postfix' => $url_postfix,
                'url_domain'  => $url_domain,
            ];
        }else{
            return empty($url_postfix) ? null : $url_postfix;
        }
//        return empty($data) ? nul : $data;
    }



    //
    function geturl1(int $id){
        $data = $this->getDbConnection()->where('id',$id)->getOne($this->table);
        return empty($data) ? null : $data;
    }

    function geturl2(int $id){
        $url_postfix = $this->getDbConnection()->where('id',$id)->getOne($this->table);
//        $url_postfix = $url_postfix[0];
        if($url_postfix){
            $map = 'status = 1 AND type = 2 AND pid = '. $url_postfix['pid'];
            $url_domain = $this->getDbConnection()->where($map)->getOne($this->table);
            return [
                'url_postfix' => $url_postfix,
                'url_domain'  => $url_domain,
            ];
        }else{
            return empty($url_postfix) ? null : $url_postfix;
        }
//        return empty($data) ? nul : $data;
    }
}