<?php
class post{
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
	
}
?>