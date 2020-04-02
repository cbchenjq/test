<?php 
namespace app\home\controller;

use app\home\controller\Common;

class Team extends Common{

    public function index(){
        return $this->fetch('team_desc');
    }

    public function list(){
        return $this->fetch('team_list');
    }
}