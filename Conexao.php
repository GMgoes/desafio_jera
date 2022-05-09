<?php 
    //Classe responsável por fazer nossa conexão com o BD.

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "zilften";

    $conexao = mysqli_connect($host,$usuario,$senha,$bd);
?>