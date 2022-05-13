<?php 
require_once("Conexao.php");

    $id_perfil = $_POST["id_perfil"];

    $sql = "delete from perfil where id = ?";
    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("i",$id_perfil);
    if($sqlprep->execute()){
        header("location:Perfil.php");
    }

?>