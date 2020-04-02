<?php
namespace app\home\controller;

use think\Controller;

use think\Db;

use app\home\model\Ad;

class Common extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->get_banana();
       $this-> head();
    }

    public function head(){
        $nav = Db::name('nav')->select();
        $nav_name = isset($_SERVER['PATH_INFO']) ? explode('/',$_SERVER['PATH_INFO'])[2] : 'index';
        
        // echo $nav_name;die;
        $this->assign('nav',$nav);
        $this->assign('nav_name',$nav_name);
        // dump($nav);die;
        // echo '<pre>';
        
        // var_dump(__FILE__);die;

    }

    public function get_banana(){
        $ad = new Ad();
        // $row = Ad::get(1);
        $row = Ad::get(1);
        $row2 = $ad->get(2);
        $row3 = $ad->find(3);
        $icon = $ad->get(['position_name'=>'icon']);
        $this->assign('icon',$icon);
        $this->assign('img1',$row->code);
        $this->assign('img2',$row2->code);
        $this->assign('img3',$row3->code);

        // dump($row3->code);die;
    }
}