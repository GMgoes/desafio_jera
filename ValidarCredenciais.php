<?php 
    //Classe responsável por validar se as credenciais inseradas na Login.php são registradas no BD.

    require_once("Conexao.php");
    session_start();
    $login = $_POST["email"];
    $password = $_POST["password"];

    $sql = "select * from usuarios where email=? and senha=?";
    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("ss",$login,$password);
    $sqlprep->execute();
    $resultadoSql = $sqlprep->get_result();
    $registro= mysqli_fetch_assoc($resultadoSql);
    $vetorRegistros = array();
    while($registro !=null){
        array_push($vetorRegistros,$registro);
        $registro = mysqli_fetch_assoc($resultadoSql);
        $validacao = 0;
    }
    foreach($vetorRegistros as $valor):
        $id = $valor["id"];
        $nome =$valor["nome"];
        $email =$valor["email"];

    endforeach;

    if(isset($validacao)){
        $_SESSION["id_usuario"] = $id;
        $_SESSION["nome_usuario"]=$nome;
        $_SESSION["email"]=$email;
        header("location: Perfil.php");
    }
    /*
    TODO: implementar quando o usuário digitar credenciais que não existem no BD.
    else{    
        $_SESSION["erro"]="Erro, usuário ou senha invalidos";
        header("location: Login.php");
    }
    */
?>