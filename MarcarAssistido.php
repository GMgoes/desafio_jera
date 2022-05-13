<?php 
	require_once("Conexao.php");
	session_start();
    $id_filme = $_POST["id_filme"];
    $id_perfil = $_SESSION["id_perfil"];

	$sql = "update filmes set watched = 'true' where id_filme = ? AND id_perfil = ? ";
	$sqlprep = $conexao->prepare($sql);
	$sqlprep->bind_param("ii",$id_filme,$id_perfil);
	if($sqlprep->execute()){
	    header("location:Inicio.php");
	}
?>