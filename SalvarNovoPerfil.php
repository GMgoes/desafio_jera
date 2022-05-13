<?php 
    //Segunda etapa da criação de um usuário novo, após a criação de um usuário, é gerado nessa classe um perfil padrão que será o principal do usuário.   
    require_once("Conexao.php");
    session_start();
    $nome_perfil = $_POST["nome"];
    $id_usuario = $_SESSION["id_usuario"];

    $sql = "insert into perfil (nome_perfil,id_usuario) values (?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("si",$nome_perfil,$id_usuario);
    if($sqlprep -> execute()){
        header("location:Perfil.php");
    }
?>