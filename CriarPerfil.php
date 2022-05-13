<?php 
    //Segunda etapa da criação de um usuário novo, após a criação de um usuário, é gerado nessa classe um perfil padrão que será o perfil principal do usuário e redireciona o mesmo para a página index, onde o usuário irá fazer sua autenticação pelo Login.   
    require_once("Conexao.php");
    session_start();
    $nome_perfil = $_SESSION["nome"];
    $email = $_SESSION["email"];

    $sql = "select id from usuarios where email = '$email'";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);

    $sql = "insert into perfil (nome_perfil,id_usuario) values (?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("si",$nome_perfil,$vetorUmregistro["id"]);
    if($sqlprep -> execute()){
        header("location:Index.php");
    }
?>