<?php 

require_once("Conexao.php");
session_start();
$id_filme = $_POST["id_filme"];
$nome_filme = $_POST["nome_filme"];
$descricao = $_POST["descricao"];
$data_lancamento = $_POST["data_lancamento"];
$poster_filme = $_POST["imagem"];
$id_perfil = $_SESSION["id_perfil"];
$tipo = $_POST["tipo_cinematografico"];

$sql = "insert into filmes (id_perfil,id_filme,nome,descricao,data_lancamento,poster_filme,tipo_cinematografico) values (?,?,?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("iisssss",$id_perfil,$id_filme,$nome_filme,$descricao,$data_lancamento,$poster_filme,$tipo);
    if($sqlprep -> execute()){
        header("location: Inicio.php"); 
    }
 ?>