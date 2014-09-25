<?php
class menu extends DB\SQL\Mapper {
	public $list;
	public function __construct(DB\SQL $db) {
        parent::__construct($db,'menu');
    }
	
	public function all( $parent_id ){
		//$this->load();
		if ( $parent_id == NULL ){
			$this->load(array('parent_id IS NULL'));
		}else{
			$this->load(array('parent_id=?', $parent_id));
		}
		foreach( $this->query as $key => $val ){
			echo $val->label;
		}
        return $this->query;
	}
	
	function getChild( $parent_id ){
        return $this->query;
	}
}
?>