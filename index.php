<?php

$f3=require('core/base.php');

$f3->set('DEBUG',1);

// MySql settings
$f3->set("DB", new DB\SQL(
    'mysql:host=localhost;port=3306;dbname=mhap',
    'root',
    ''
)); 

$f3->set('AUTOLOAD','model/');

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

$f3->config('config.ini');

$f3->route('GET /*', function($f3){
	$f3->reroute("/dashboard");
});

// REST request by id
$f3->route('GET /rest/@controller/@action/@id', '@controller->@action');
// REST request per request
$f3->route('GET /rest/@controller/@action/@offset/@page_size', '@controller->@action');
// REST request all
$f3->route('GET /rest/@controller/@action', '@controller->@action');
// REST update
$f3->route('POST /rest/@controller/@action/@id', '@controller->@action');
// REST create
$f3->route('POST /rest/@controller/@action', '@controller->@action');

// general route
$f3->route('GET /post', 'post->view');
$f3->route('GET /post/@id', 'post->view');
$f3->route('GET /dashboard', 'webpage->dashboard');
$f3->route('GET /events', 'webpage->events');
$f3->route('GET /admin-panel', 'webpage->adminpanel');
$f3->route('GET /login', 'webpage->login');



$f3->run();
