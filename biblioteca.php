<?php

// -------------------------------------------------CONECTAR-----------------------------------------------------

function conectarBD(){	
	if(explode(":",$_SERVER["HTTP_HOST"])[0]=="localhost" || explode(":",$_SERVER["HTTP_HOST"])[0]=="192.168.15.118" ){
	    $dbh = new PDO("mysql:host=localhost;dbname=bracepharma_memoria","root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	else{
		$dbh = new PDO("mysql:host=mysql.hostinger.com.br;dbname=u931475462_bracepharma_quiz", "u931475462_bracepharma_quiz", "@Brasil01",
	    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    // $dbh->exec("SET time_zone = 'America/Sao_Paulo'");
	}
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
// ------------------------------------------------ Cadastro -----------------------------------------------
function consultarBaseCadastrados(){
	$dbh = conectarBD();
	$sql = "SELECT crm FROM usuario";
	@$temp = $dbh->query($sql)->fetchAll();
	if($temp)
		return $temp;
	else
		return 0;
}

function salvarUsuarioMemoria($nome,$email,$crm){
	$dbh = conectarBD();
	$dataAtual = date('Y-m-d H:i:s');
	$sql = "INSERT INTO usuario(name,email,crm,gameScore,gameTheme,userGameTime,userEndTime,dataLog) VALUES('$nome', '$email','$crm',0,'0',0,'0','$dataAtual') ";
	$cod = $dbh->prepare($sql);
	$cod = $cod->execute();
	$temp= $dbh->lastInsertId() ;
	if ($cod) {
		return $temp;
	} else {
		return false;
	}
}

// --------------------------------------------MEMORIA-----------------------------------------------
function atualizarDadosUsario($idJogador,$pontosJogador,$temaJogador,$tempoJogador){
	$dbh = conectarBD();
	$dataAtual = date('Y-m-d H:i:s');
	$sql = "UPDATE usuario SET userEndTime='$dataAtual',gameScore=$pontosJogador, gameTheme='$temaJogador',userGameTime=$tempoJogador WHERE idUser=$idJogador";
	$cod = $dbh->prepare($sql);
	$cod->execute();
	
}
