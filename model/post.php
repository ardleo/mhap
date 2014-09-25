<?php
class post{
	protected $config;
	public function __construct($f3) {
		$this->config = new config(  $f3->get("DB")  );
		$this->config->getConfig();
    }
	
		
	function create( $f3 ){
	
	}
	
	function read( $f3, $params ){	
		
		header('Content-Type: application/json');
		if ( isset($params['id']) ) {
			$data= $f3->get("DB")->exec("call getPost(". $params['id'] . ")");			
			echo json_encode($data);
		}else if ( isset($params['offset']) ){
			$data= $f3->get("DB")->exec("call getAllUsers(". $params['offset'] . ", ". $params['page_size'] . ")");
			echo json_encode($data);
		}else{
			$data= $f3->get("DB")->exec("SELECT * FROM getPosts");
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
	}	
	
	function update( $f3 ){
	
	}
	
	function delete( $f3, $params ){
	
	}
	
	function view( $f3, $params ){
		if ( isset($params['id']) ) {
			$f3->set('data', $f3->get("DB")->exec("call getPost(". $params['id'] . ")") );	
		}else{
			$f3->set('data', $f3->get("DB")->exec("call getAllPost(0,22)") );	
			
		}
		$f3->set('title','Article');
		$f3->set('mainPanel', './front/article.php');
		echo Template::instance()->render('/front/dashboard.php');
	}
}
?>