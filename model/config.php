<?php 
class config extends DB\SQL\Mapper{
	public function __construct(DB\SQL $db) {
        parent::__construct($db,'settings');
    }
	
	public function read($module, $code){
		$this->load(array(
			'module = :module and code = :code',
			':module'=>$module,':code'=>$code
		));
		return $this;
	}
	
	public function getConfig(){
		$f3 = \Base::instance();
		$f3->set('base', $this->read( 'web', 'web_domain' )->value . $this->read( 'web', 'web_base_path' )->value);
		$f3->set('header','/front/header.php');
		$f3->set('nav','/front/nav.php');
		$f3->set('content','/front/content.php');
		$f3->set('footer','/front/footer.php');			
		$f3->set('webname', $this->read( 'web', 'web_name' )->value);
		$f3->set('front_theme', '/themes/' . $this->read( 'web', 'front_themes' )->value);
	}

}
?>