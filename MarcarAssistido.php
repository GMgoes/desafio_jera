<?php 
//Essa classe nos permite receber o id do filme/serie que o usuário marcar e atualizar o campo visto na nossa tabela filmes, o que irá encaixá-lo na questão de filmes/séries já vistos
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