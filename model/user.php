<?php
class user{
	function getUser($f3,$params){
		
		//echo $params['id'];
	}
	
	function listUser($f3, $params){
		$data= $f3->get("DB")->exec("call getAllUsers(". $params['page'] . ")");
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
	function create( $f3 ){
		
	}
	
	function read( $f3, $params ){		
		if ( isset($params['id']) ) {
			$data= $f3->get("DB")->exec("call getUser(". $params['id'] . ")");			
			echo json_encode($data);
		}else if ( isset($params['offset']) ){
			$data= $f3->get("DB")->exec("call getAllUsers(". $params['offset'] . ", ". $params['page_size'] . ")");
			echo json_encode($data);
		}else{
			$data= $f3->get("DB")->exec("call getAllUsers(0, 100)");
			echo json_encode($data);
		}
	}	
	
	function update( $f3, $params ){
	
	}
	
	function delete( $f3, $params ){
	
	}
}
?>