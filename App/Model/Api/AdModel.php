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
        $dbConnect = $this->getDbConnection();
        $database = $dbConnect->rawQuery('UPDATE think_wxurls set jump_reads=jump_reads+1 WHERE id ='. 1);
        return $this->writeJson(Status::CODE_OK, $database, 'success');
    }

    function geturl(int $id){
        $dbConnect = $this->getDbConnection();
        $url_postfix = $dbConnect->where('id',$id)->getOne($this->table);
        if($url_postfix){
            $map = 'status = 1 AND type = 2 AND pid = '. $url_postfix['pid'];
            $url_domain = $dbConnect->where($map)->getOne($this->table);
            if($url_domain){
                // 自增访问量
                $dbConnect->rawQuery('UPDATE think_wxurls set jump_reads=jump_reads+1 WHERE id ='. $url_domain['id']);
                $dbConnect->rawQuery('UPDATE think_wxurls set jump_reads=jump_reads+1 WHERE id = ' . $id);
                return $url_domain['domain'].'/'.$url_postfix['postfix'] .'/index.html' ;
            }else{
                return $url_postfix['domain'].'/'.$url_postfix['postfix'].'/index.html';
            }
        }else{
            return empty($url_postfix) ? null : $url_postfix;
        }
    }

}