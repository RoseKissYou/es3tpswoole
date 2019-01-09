<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019/1/9
 * Time: 18:12
 */

namespace App\Model\Blog;

use App\Model\BaseModel;

class BlogModel extends BaseModel
{
    protected $table = 'think_blog';
    //
    function getAll(){
        $data = $this->getDbConnection()->get($this->table);
    }
}
