<?php
namespace app\home\controller;

use think\Controller;

use think\Db;

use app\home\controller\Common;

use app\home\model\User;

use app\home\model\Article;

use app\home\model\Category;

use app\home\model\Cases;

use app\home\model\Team;

class Index extends Common{

	public function index(){
		// echo phpinfo();die;
		$user = new User();
		// $user_info = $user->where(1)->select(1);
		$user_info = Db::name('user')->select();
		$case_id = Category::where('parent_id',3)->column('id');
		$news_id = Category::where('parent_id',1)->column('id');
		$team_id = Category::where('parent_id = 2 or id=2')->column('id');
		//  dump($team_id);die;
		$case_title = Article::where('cat_id','in',$case_id)->find();
		$news_title = Article::where('cat_id','in',$news_id)->find();
		$team_title = Article::where('cat_id','in',$team_id)->find();
		// dump(time());die;
		$case = Cases::limit(1)->order('pubtime','desc')->select();
		$team = Team::limit(5)->order('tid')->select();
		$new_type = Db::name('new_type')->select();
		$news = Article::limit(3)->select();
		// dump(time('2016-03-18'));die;
		$this->assign('case_title',$case_title);
		$this->assign('news_title',$news_title);
		$this->assign('team_title',$team_title);
		$this->assign('case',$case);
		$this->assign('team',$team);
		$this->assign('new_type',$new_type);
		$this->assign('news',$news);
		// foreach($case as $v){
		// 	dump($v->id);
		// }
		// die;
		return $this->fetch();
	}
}
