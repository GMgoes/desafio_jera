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
    $nome_usuario = $_SESSION["perfil_usuario"];
    $id_perfil = $_SESSION["id_perfil"];
    ?>
    <body id="background">
        <div class="container-fluid">
            <div class="mt-2" style="border: solid 1px #8FBC8F;">
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Perfil.php"><?php echo $_SESSION["perfil_usuario"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Inicio.php">Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Filmes.php">Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Series.php">Séries</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Deslogar.php">Sair</a>
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
    $sql = "select * from filmes where id_perfil = '$id_perfil'";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    $vetorTodosregistro = array();
    while($vetorUmregistro != null){
        array_push($vetorTodosregistro, $vetorUmregistro);
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    }
    ?> 
            <div class="row">
                
                <?php foreach($vetorTodosregistro as $registro){
                    if($registro["tipo_cinematografico"] == "filme"){ ?>

                <div class = "col-3 mt-2">
                    <form action = "Visualizar.php" method = "POST">
                        <input type="hidden" name="id_filme" value="<?php echo ($registro["id_filme"]) ?>">
                        <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo ($registro["poster_filme"]) ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                    </form>         
                    <div class="row">
                        <div class="col-7">
                            <p class="d-flex justify-content-center "><?php echo($registro["nome"]) ?></p> 
                        </div>
                        <div class="col-2">
                            <button type ="submit" title="Desfavoritar Filme" style="background:transparent; border:none;"><img src="desfavoritar.png"></button>                           
                        </div>      
                        <div class="col-3">
                            <button type ="submit" title="Marcar como assistido" style="background:transparent; border:none;"><img src="visto.png"></button>
                        </div>                  
                    </div>  
                </div> 
                 
                <?php }else{ ?>
                    
                <div class = "col-3 mt-2">
                    <form action = "Visualizar.php" method = "POST">
                        <input type="hidden" name="id_filme" value="<?php echo ($registro["id_filme"]) ?>">
                        <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo ($registro["poster_filme"]) ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                    </form>         
                    <div class="row">
                        <div class="col-7">
                            <p class="d-flex justify-content-center "><?php echo($registro["nome"]) ?></p> 
                        </div>
                        <div class="col-2">
                            <button type ="submit" title="Desfavoritar Filme" style="background:transparent; border:none;"><img src="desfavoritar.png"></button>                           
                        </div>      
                        <div class="col-3">
                            <button type ="submit" title="Marcar como assistido" style="background:transparent; border:none;"><img src="visto.png"></button>
                        </div>              
                    </div>   
                </div>
                
                <?php }    
                } ?>              
            </div>            
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>