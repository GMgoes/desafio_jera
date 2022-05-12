<!-- Essa será uma das nossas classes principais, contendo a listagem dos filmes provenientes da API e o menu principal para o usuário, bem como o aceso aos perfis do usuário. -->

<html>
    <head>
        <title>Zilften</title>

        <link href="CSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    </head>
    <?php 
    session_start();
    require_once("Conexao.php"); 
    if(isset($_SESSION["nome"])){
        $nome_perfil = $_SESSION["nome"];
        $id_usuario = $_SESSION["id_usuario"];
    }else{
        $nome_perfil = $_POST["nome"];
        $id_usuario = $_POST["id_usuario"]; 
    }   
    require_once("Conexao.php");    
    ?>
    <body id="background">
        <div class="container-fluid">
            <div class="mt-2" style="border: solid 1px #8FBC8F;">
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <?php echo('<a id="letras-navbar" href="Perfil.php">'.($nome_perfil).'</a>') ?>
                    <li class="nav-item">
                        <form method="POST" action="Inicio.php">
                            <input type="hidden" name="nome" value="<?php echo ($nome_perfil) ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">
                            <button id="letras-navbar" type="submit" class="nav-link fw-bolder">FAVORITOS</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="Filmes.php">
                            <input type="hidden" name="nome" value="<?php echo ($nome_perfil) ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">
                            <button id="letras-navbar" type="submit" class="nav-link fw-bolder">FILMES</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" type="submit" class="nav-link fw-bolder" href="Series.php">SÉRIES</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Deslogar.php">SAIR</a>
                    </li>
                </ul>
            </div>  
            <div class="row">
                <div class="mt-2 col-4">
                    <form>      
                        <input id="filme_buscado" placeholder="">
                    </form>
                </div>
            </div>
    <?php 
    $sql = "select * from filmes where id_perfil = '$id_usuario'";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    $vetorTodosregistro = array();
    while($vetorUmregistro != null){
        array_push($vetorTodosregistro, $vetorUmregistro);
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    }
    ?> 

            <div class="row">
                <?php
                foreach($vetorTodosregistro as $registro){
                ?>
                <div class = "col-3 mt-2">
                        <form action = "VisualizarFilme.php" method = "POST">
                            <input type="hidden" name="id_filme" value="<?php echo ($registro["id"]) ?>">
                            <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo ($registro["poster_filme"]) ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                        </form>         
                        <div>
                            <p class="d-flex justify-content-center "><?php echo($registro["nome"]) ?></p>     
                        </div>   
                    </div> 
                <?php  
                }
                ?>
            </div>
            
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>