<?php    
    require_once("Conexao.php");
    session_start();
    $email_perfil = $_SESSION["email_perfil"];
    $nome_perfil = $_SESSION["nome_perfil"];

    $sql_id = "select id from usuarios where nome = '$nome_perfil'";
    $resultadoSql = mysqli_query($conexao, $sql_id);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);   

    $sql = "insert into perfil (nome_perfil,id_usuario) values (?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("si",$nome_perfil,$vetorUmregistro["id"]);
    if($sqlprep -> execute()){ 
        header("location:Inicio.php");
    }
?>