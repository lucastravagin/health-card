<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){

			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);


	//define('INCLUDE_PATH','http://localhost/devweb_pt_01/');
	define('INCLUDE_PATH','http://www.cartaofacaobem.com.br/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');


	//Conectar com banco de dados!
	//define('HOST','localhost');
	define('HOST','67.205.146.43');
	define('USER','health-user');
	define('PASSWORD','z8Iz4oqy');
	define('DATABASE','billing');

	//Constantes para o painel de controle
	define('NOME_EMPRESA','Spacenpase');

	//Funções do painel
	function pegaCargo($indice){
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		/*<i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}

	function recoverPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
		}
	}
?>