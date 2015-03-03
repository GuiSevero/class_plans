<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
if(!getenv("DATABASE_URL"))
	putenv("DATABASE_URL=postgres://postgres:gorder@localhost:5432/planos");

$url = parse_url(getenv("DATABASE_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => "pgsql:host={$host};dbname={$database}",
			//'emulatePrepare' => true,
			'username' => "{$username}",
			'password' => "{$password}",
			'charset' => 'utf8',
		),		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);