<?php 

/*============================================================*/
/*=======================MINI MVC GLIDE=======================*/
/*============================================================*/

$page = "home";
$url = explode('/', $_GET['url'] ? $_GET['url'] : $page);
$page = file_exists('view/'.$url[0].'.php') || strpos($url[0], "ajax") ? $url[0] : $page;
$parametros = $url ? array_values($url) : [];