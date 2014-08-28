<?php

$f3=require('core/base.php');

$f3->set('DEBUG',1);
$f3->set('AUTOLOAD','model/');

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

$f3->config('config.ini');

$f3->route('GET /',
	function() {
        echo 'Hello, world!';
    }
);

$f3->route('GET /userref',
	function($f3) {
		$f3->set('content','userref.htm');
		echo View::instance()->render('layout.htm');
	}
);

$f3->run();
