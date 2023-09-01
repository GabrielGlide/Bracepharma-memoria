<?php

session_start();

include 'mvc.php';
include 'biblioteca.php';
date_default_timezone_set('America/Sao_Paulo');
$is_page = true;
$jogou =0;

switch ($page) {
	case 'home':
		unset($_SESSION["idJogador"]);
		break;
	case 'cadastro':
		$crms_cadastrados = consultarBaseCadastrados();
		$crms_cadastrados = json_encode($crms_cadastrados);
		// var_dump($crms_cadastrados);
		break;
	case 'save-user-ajax':
		$_SESSION['idJogador'] = salvarUsuarioMemoria($_POST['nome'],$_POST['email'],$_POST['crm']   );
		$is_page = false;
		break;
	case 'memoria':
		$numeros = [1,2,3,4,5,6];
		$tema = rand(1,6);
		shuffle($numeros);
		break;
	case 'save-pontuation-ajax':
		atualizarDadosUsario($_SESSION['idJogador'],$_POST['pontos'],$_POST['tema'],$_POST['tempo']);
		break;
	
}

if ($is_page) {
	include 'core/header.php';
	include 'view/' . $page . '.php';
	include 'core/footer.php';
}
