<?php

//Declare the routes for site and the file to be refered
//example:
//  $route["about-us"] = "about"
//  NOTE: file extension .php will be added automatically to every view file.
//  result: http://devslw.com/about-us  will load the view: views/about.php in system folder

$route["/"] = "inicio";
$route["/contacto"] = "contacto";
$route["/productos"] = "productos/portada";
$route["/productos/producto1"] = "productos/p1";
$route["/about-us"] = "about";

?>
