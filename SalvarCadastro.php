<?php
    /*Responsável por receber os dados da classe CriarConta.php e inserir no BD, após inserção dos dados, retorna à própria página, com uma sessão, pode ser uma sessão de sucesso ou de falha, dependendo de como foi a tentativa de inserção no BD. Além disso essa classe agora está fazendo também a criação de um perfil vinculado ao usuário cadastrado.

    */
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    
    require_once("Conexao.php");
    session_start();
           
    $sql = "insert into usuarios (email,nome,senha,data_nascimento) values (?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("ssss",$email,$nome,$password,$nascimento);
    if($sqlprep -> execute()){
        $_SESSION["nome_perfil"] = $nome;
        header("location: CriarPerfil.php"); 
    }
    /*
    TODO: implementar quando o usuário tentar criar com um e-mail que já existe no BD.
    else{
        $_SESSION["erroCadastro"]="Erro de cadastro do usuário";
        header("location: CriarConta.php"); 
    }
    */
    
 
?>