<?php 

require_once("Conexao.php");
session_start();
$id_filme = $_POST["id_filme"];
$nome_filme = $_POST["nome_filme"];
$descricao = $_POST["descricao"];
$data_lancamento = $_POST["data_lancamento"];
$id_perfil = $_POST["id_perfil"];
$poster_filme = $_POST["imagem"];
$nome_perfil = $_POST["nome"];
$id_usuario = $_POST["id_usuario"];

$sql = "insert into filmes (id_filme,nome,descricao,data_lancamento,id_perfil,poster_filme) values (?,?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("ssssss",$id_filme,$nome_filme,$descricao,$data_lancamento,$id_perfil,$poster_filme);
    if($sqlprep -> execute()){
    	$_SESSION["nome"] = $nome_perfil;
    	$_SESSION["id_usuario"] = $id_usuario;
        header("location: Inicio.php"); 
    }
 ?>