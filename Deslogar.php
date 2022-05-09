<?php
    //Classe encerra nossa sessão e nos redireciona para a página de Login


    session_start();
    if(session_destroy()){
    	unset($_SESSION);
        header("location: Login.php");
    }

?>