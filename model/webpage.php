<?php
	class webpage{
		function settings($f3){
			$settings=new DB\SQL\Mapper( $f3->get("DB") ,"settings");
			$settings->load();
			return $settings;
		}
		
		function dashboard($f3){
		}
		
		function adminpanel($f3){
			$f3->set('content','userref.htm');
			echo View::instance()->render('/admin/layout.htm');
		}
		
		function login($f3){
			$f3->set('title','Login');
			$f3->set('content','/front/welcome.htm');
			$f3->set('front_theme', '/themes/' + $this->settings( $f3 )->front_themes);
			$f3->set('admin_theme', '/themes/' + $this->settings( $f3 )->admin_themes);
			$f3->set('fruits',array('apple','orange ',' banana'));
			echo Template::instance()->render('/front/login.php');
		}
		
	}
?>