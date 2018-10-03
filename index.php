<?php
//error_reporting(0);
require_once("config.php");
session_start();


if(!isset($_SESSION["__TOKEN"])){
	$_SESSION["__TOKEN"] = rand(100000,999999)."-".rand(100,999);
}

include(_site_route_.'routes.php');

$real_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$uri = str_replace(__BASE_URL,"",$real_url);

if(key_exists($uri,$route)){

	view($route[$uri]);

}else{
	view("app/404");
}

//función para cargar las vistas:
function view($name){
	if(file_exists(_site_route_."views/".$name.".php")){
		include _site_route_."views/".$name.".php";
	}
	else{
		echo '
		<!doctype html>
		<html lang="es">
		  <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>HelioPHP | Error</title>
			<link href="https://fonts.googleapis.com/css?family=Open+Sans|Source+Code+Pro" rel="stylesheet">
			<style>
			body{ margin:0 !important; padding:10px !important; }
			.box{
				position:absolute;
				left:50%;
				margin-left:-250px;
				width:500px;
				padding:15px;
				border:1px solid #777;
				background-color: #F3F3F3;
				color:#444;
				font-family: "Open Sans", sans-serif;
				font-size:15px;
				text-align:center;
			}
			.code{
				font-family:"Source Code Pro", monospace;
				text-align:left !important;
				color:rgb(0, 237, 166) !important;
				background-color:rgb(33, 33, 33);
				padding:15px;
				line-height: 1.6;
			}
			</style>
		  </head>
		  <body>
				<div class="box">
					<h2>Application error</h2>
					<hr>
					<p class="code">One or more system files could not be loaded.<br>
					Please check configuration file<p>
				</div>
		  </body>
		</html>
		';
	}
}

?>
