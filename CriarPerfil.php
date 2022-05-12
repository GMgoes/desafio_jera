<?php 
    //Segunda etapa da criação de um usuário novo, após a criação de um usuário, é gerado nessa classe um perfil padrão que será o principal do usuário.   
    require_once("Conexao.php");
    session_start();
    $nome_perfil = $_SESSION["nome_perfil"];

    $sql_id = "select id from usuarios where nome = '$nome_perfil'";
    $resultadoSql = mysqli_query($conexao, $sql_id);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);   

    $sql = "insert into perfil (nome_perfil,id_usuario) values (?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("si",$nome_perfil,$vetorUmregistro["id"]);
    if($sqlprep -> execute()){
        $_SESSION["id_usuario"] = $vetorUmregistro["id"];
        $_SESSION["cadastrado"] = $nome_perfil;
        header("location:CriarConta.php");
    }
?>