<?php 
namespace app\home\controller;

use app\home\controller\Common;

class Contact extends Common{
    public function index(){
        return $this->fetch('contact_desc');
    }
}