<?php 
    //Segunda etapa da criação de um perfil novo, após a criação de um novo perfil, é redirecionado à parte de listagem dos perfis existentes para aquele usuário.
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