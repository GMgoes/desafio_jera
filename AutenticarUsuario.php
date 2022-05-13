<?php 
//Classe responsável por fazer a autenticação de qual perfil o usuário está utilizando no momento, ela recebe o id selecionado no button, na classe Perfil, e direciona o usuário já para a tela de Filmes/Séries favoritas.
session_start();
$_SESSION["id_perfil"] = $_POST["id_perfil"];  
$_SESSION["perfil_usuario"] = $_POST["nome_perfil"]; 
$_SESSION["perfil_logado"] = true;
header("location:Inicio.php");
 ?>