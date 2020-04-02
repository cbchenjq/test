<?php
namespace app\home\controller;

use app\home\controller\Common;

Class Company extends Common{
    public function index(){
        return $this->fetch('company_desc');
    }
}