<?php

namespace app\store\controller\wxapp;

use app\store\controller\Controller;
use app\store\model\WxappPage as WxappPageModel;
use app\store\model\Rexiaot as RexiaoModel;

/**
 * 小程序页面管理
 * Class Page
 * @package app\store\controller\wxapp
 */
class Page extends Controller
{
    /**
     * 首页设计
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function home()
    {
        $model = WxappPageModel::detail();
        if (!$this->request->isAjax()) {
            $jsonData = $model['page_data']['json'];
            return $this->fetch('home', compact('jsonData'));
        }
        $data = $this->postData('data');
        if (!$model->edit($data)) {
            return $this->renderError('更新失败');
        }
        return $this->renderSuccess('更新成功');
    }

    /**
     * 页面链接
     * @return mixed
     */
    public function links()
    {
        return $this->fetch('links');
    }
    public function rexiaolist()
    {
        return $this->fetch('links');
    }
    //热销图添加
    public function rexiao()
    {
        if ($this->request->isAjax()) {
            $data = $this->postData('rexiao');
            $rexiao= new RexiaoModel($data);
            $rexiao->allowField(true)->save();
            return $this->renderSuccess('更新成功');
        }else{

        return $this->fetch('rexiao');
        }
    }
}
