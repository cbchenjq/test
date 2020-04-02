<?php
namespace app\home\controller;

use app\home\controller\Common;

class Cases extends Common{

    public function case_desc(){
        return $this->fetch('cases/case_desc');
    }

    public function case_list(){
        return $this->fetch('case_list');
    }
}