<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/1
 * Time: 13:46
 */
class Indeximage extends Controller
{
    public function index()
    {

    }
    public function xianshiadd()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        $model = new GoodsModel;
        if ($model->add($this->postData('goods'))) {
            return $this->renderSuccess('添加成功', url('goods/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }
}