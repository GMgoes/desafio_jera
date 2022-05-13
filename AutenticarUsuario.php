<?php 
session_start();
$_SESSION["id_perfil"] = $_POST["id_perfil"];  
$_SESSION["perfil_usuario"] = $_POST["nome_perfil"]; 
header("location:Inicio.php");
 ?>