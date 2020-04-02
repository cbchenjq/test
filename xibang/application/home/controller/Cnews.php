<?php 
namespace app\home\controller;

use app\home\controller\Common;

use app\home\model\News;

use think\Db;

class Cnews extends Common{

    public function index(){
        
        return $this->fetch('zixun_desc');
    }

    public function list(){
        $news = News::select();
        $new_category = Db::name('new_type')->select();
        // dump($new_category[0]);die;
        $this->assign('new_type',$new_category);
        $this->assign('news',$news);
        return $this->fetch('zixun_list');
    }
}