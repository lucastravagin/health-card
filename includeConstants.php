<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require('vendor/autoload.php');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};



	spl_autoload_register($autoload);


	//define('INCLUDE_PATH','http://localhost/devweb/');
	define('INCLUDE_PATH','http://www.cartaofacaobem.com.br/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	//define('HOST','localhost');
	define('HOST','67.205.146.43');
	define('USER','health-user');
	define('PASSWORD','z8Iz4oqy');
	define('DATABASE','billing');

	//Constantes para o painel de controle
	define('NOME_EMPRESA','Spacenapse');
?>