<?php 
    //Com essa classe atualizamos nossa tabela filmes, com o id do filme, colocamos ele como não assistido até o momento, para caso o usuário tenha marcado incorretamente o filme como assistido.
    require_once("Conexao.php");
    session_start();
    $id_filme = $_POST["id_filme"];
    $id_perfil = $_SESSION["id_perfil"];

    $sql = "delete from filmes where id_perfil = ? AND id_filme = ? ";
    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("ii",$id_perfil,$id_filme);
    if($sqlprep->execute()){
        header("location:Inicio.php");
    }

?>