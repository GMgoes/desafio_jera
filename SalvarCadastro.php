<?php
    /*Responsável por receber os dados da classe CriarConta.php e inserir no BD, após inserção dos dados a classe também cria um perfil vinculado ao usuário cadastrado.

    */
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    
    require_once("Conexao.php");
    session_start();
           
    $sql = "select * from usuarios where email = '$email'";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    if($vetorUmregistro == null){
        $sql = "insert into usuarios (email,nome,senha,data_nascimento) values (?,?,?,?)";
        $sqlprep = $conexao ->prepare($sql);
        $sqlprep -> bind_param("ssss",$email,$nome,$password,$nascimento);
        if($sqlprep -> execute()){
            $_SESSION["nome"] = $nome;
            $_SESSION["email"] = $email;
            $_SESSION["cadastrado"] = 1;
            header("location: CriarPerfil.php"); 
        }
    }else{
        $_SESSION["erro_cadastro"] = 1;
        header("location: CriarConta.php"); 
    }
    
