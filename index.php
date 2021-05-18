<?php
  //Redireccion al public
  $host= $_SERVER["HTTP_HOST"];
  $url= $_SERVER["REQUEST_URI"];
  
  echo $url.'public';
	header('Location:'.$url.'public');
?>