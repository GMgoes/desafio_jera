<?php 
//Classe responsável por retirar o filme dos favoritos, para isso ele remove todas as informações do filme em especifico da nossa tabela filmes.
require_once("Conexao.php");

    session_start();
    $id_filme = $_POST["id_filme"];
    $id_perfil = $_SESSION["id_perfil"];

    $sql = "delete from filmes where id_perfil = ? AND id_filme=?";
    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("ii",$id_perfil,$id_filme);
    if($sqlprep->execute()){
        header("location:Inicio.php");
    }

?>