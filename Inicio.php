<!-- Essa será uma das nossas classes principais, contendo a listagem dos filmes provenientes da API e o menu principal para o usuário, bem como o aceso aos perfis do usuário. -->

<html>
    <head>
        <title>Meus Filmes</title>
        <link rel="icon" type="imagem/png" href="icone.png">
        <meta charset="utf-8">
        <link href="CSS.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 
    </head>
    <?php 
    session_start();
    if($_SESSION["perfil_logado"] != "true"){
        header("location: Perfil.php");
    }
    require_once("Conexao.php"); 
    $nome_usuario = $_SESSION["perfil_usuario"];
    $id_perfil = $_SESSION["id_perfil"];
    ?>
    <body id="background">
        <div class="container-fluid">
            <div class="mt-2" style="border: solid 1px #8FBC8F;">
                <ul class="nav justify-content-center mt-2">
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Perfil.php"><?php echo $_SESSION["perfil_usuario"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Inicio.php">Minha Lista</a>
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
        <div class="row mt-2 mb-2">
                <p style="font-family: Andale Mono, monospace; font-size:50px; color:#32CD32;">Minha Lista</p>
                <div class="col-12 justify-content-center">
                    
                </div>
            </div> 
            <div class="row">
                
                <?php foreach($vetorTodosregistro as $registro){
                    if($registro["tipo_cinematografico"] == "filme" && $registro["watched"] != "true"){ ?>

                <div class = "col-3 mt-2">
                    <form action = "Visualizar.php" method = "POST">
                        <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                        <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo ($registro["poster_filme"]) ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                    </form>         
                    <div class="row">
                        <div class="col-9">
                            <p class="d-flex justify-content-center "><?php echo($registro["nome"]) ?></p> 
                        </div>   
                        <div class="col-1">
                            <form method="POST" action="DesfavoritarFilme.php">
                                <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                                <button type ="submit" title="Desfavoritar Filme" style="background:transparent; border:none;"><img src="retirar.jpg"></button>   
                            </form>                        
                        </div>      
                        <div class="col-1">
                            <form method="POST" action="MarcarAssistido.php">
                                <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                                <button type ="submit" title="Marcar como assistido" style="background:transparent; border:none;"><img src="watched.png"></button>
                            </form> 
                        </div>                 
                    </div>  
                </div> 
                 
                <?php }else if($registro["tipo_cinematografico"] == "serie" && $registro["watched"] != "true"){ ?>
                    
                <div class = "col-3 mt-2">
                    <form action = "Visualizar.php" method = "POST">
                        <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                        <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo ($registro["poster_filme"]) ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                    </form>         
                    <div class="row">
                        <div class="col-7">
                            <p class="d-flex justify-content-center "><?php echo($registro["nome"]) ?></p> 
                        </div>
                        <div class="col-2">
                            <form method="POST" action="DesfavoritarFilme.php">
                                <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                                <button type ="submit" title="Desfavoritar Filme" style="background:transparent; border:none;"><img src="retirar.jpg"></button>   
                            </form>                        
                        </div>      
                        <div class="col-3">
                            <form method="POST" action="MarcarAssistido.php">
                                <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                                <button type ="submit" title="Marcar como assistido" style="background:transparent; border:none;"><img src="watched.png"></button>
                            </form> 
                        </div>              
                    </div>   
                </div>
                
                <?php }    
                } ?>
                <div class="row"><div class="col-10 mt-4" style="border: solid 1px #8FBC8F;display:flex; margin:auto;"></div></div>
                <div class="row mt-2 mb-2">
                    <p style="font-family: Andale Mono, monospace; font-size:50px; color:#32CD32;">Filmes já assistidos</p>
                </div> 
                <?php foreach($vetorTodosregistro as $registro){
                    if($registro["watched"] == "true"){ ?>

                <div class = "col-3 mt-2">
                    <form action = "Visualizar.php" method = "POST">
                        <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                        <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo ($registro['poster_filme']) ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                    </form>         
                    <div class="row">
                        <div class="col-10">
                            <p class="d-flex justify-content-center "><?php echo($registro["nome"]) ?></p> 
                        </div>      
                        <div class="col-1">
                            <form method="POST" action="RetirarAssistido.php">
                                <input type="hidden" name="id_filme" value="<?php echo ($registro['id_filme']) ?>">
                                <button type ="submit" title="Remover dos Assistidos" style="background:transparent; border:none;"><img src="retirar.jpg"></button>   
                            </form>    
                        </div>        
                    </div>   
                </div>
                <?php }
                }
                 ?>   
            </div> 
                      
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>