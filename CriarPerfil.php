<?php 
    //Segunda etapa da criação de um usuário novo, após a criação de um usuário, é gerado nessa classe um perfil padrão que será o principal do usuário.   
    require_once("Conexao.php");
    session_start();
    $email = $_SESSION["email"];

    $sql_id = "select id,nome from usuarios where email = '$email'";
    $resultadoSql = mysqli_query($conexao, $sql_id);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);   

    $sql = "insert into perfil (nome_perfil,id_usuario) values (?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("si",$vetorUmregistro["nome"],$vetorUmregistro["id"]);
    if($sqlprep -> execute()){
        $_SESSION["cadastrado"] = $vetorUmregistro["nome"];
        header("location:Index.php");
    }
?>