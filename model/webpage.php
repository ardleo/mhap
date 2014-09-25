<?php
	class webpage{
		protected $config;
		public function __construct($f3) {
			$this->config = new config(  $f3->get("DB")  );
			$this->config->getConfig();
		}
		
		function dashboard($f3){
			$f3->set('title','Dashboard');
			$f3->set('mainPanel', './front/' . $this->config->read( 'dashboard', 'dashboard_main_panel' )->value);
			$menu = new menu( $f3->get("DB") );
			$f3->set('menus', $menu->all(NULL));	
			echo Template::instance()->render('/front/dashboard.php');
		}
		
		function events($f3){
			$f3->set('title','Events');
			$f3->set('mainPanel', './front/calender.php');
			$menu = new menu( $f3->get("DB") );
			
			$f3->set('menus', $menu->all());
			
			echo Template::instance()->render('/front/events.php');
		}
		
		function adminpanel($f3){
			$f3->set('content','userref.htm');
			echo View::instance()->render('/admin/layout.htm');
		}
		
		function login($f3){
			$f3->set('title','Login');	
			
			echo Template::instance()->render('/front/login.php');
		}
		
	}
?>