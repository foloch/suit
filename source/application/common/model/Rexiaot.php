<?php

namespace app\common\model;

use think\Cache;

/**
 * 商品分类模型
 * Class Category
 * @package app\common\model
 */
class Rexiaot extends BaseModel
{
    public function getList()
    {
        return $this->order(['id' => 'desc'])->select();
    }

}
