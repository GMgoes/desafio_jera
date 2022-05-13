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
    //Validação para detectarmos se o usuário está logado ou não.
    if($_SESSION["perfil_logado"] != "true"){
        header("location: Perfil.php");
    }
    require_once("Conexao.php"); 
    $nome_usuario = $_SESSION["perfil_usuario"];
    $id_perfil = $_SESSION["id_perfil"];
    ?>
    <body id="background">
        <div class="container-fluid">
            <!--Menu Navbar da nossa aplicação, contém os redirecionamentos possíveis enquanto o usuário está logado. -->
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
            <!--Menu para buscar os filmes que estão pertencentes à nossa tabela filmes, utilizando JS, ele retorna uma espécie de "lista de comprar", para sabermos os filmes/séries que temos até o momento, e se o usuário já assistiu ou não. -->
            <div class="row mt-4">
                <div class="col-1">
                    <p style="font-family: Andale Mono, monospace; font-size:20px; color:#32CD32;">Buscar</p>                   
                </div> 
                <div class="col-4">
                    <form method="POST" action="">      
                        <input id="busca" placeholder="">
                    </form>
                </div> 
            </div>  
            <!-- Aqui está puxando do nosso BD todos os filmes que o usuário favoritou até o momento (Lista para assistir) -->              
            <div id="resultados" class="row"></div>           
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
             <!-- Utilização para estética do site (Linha verde) TODO: Melhorar para deixar mais elegante esse código -->
            <div class="row"><div class="col-10 mt-4" style="border: solid 1px #8FBC8F;display:flex; margin:auto;"></div></div>
            <div class="row mt-2 mb-2">             
                <div class="col-12">
                    <p style="font-family: Andale Mono, monospace; font-size:50px; color:#32CD32; text-align: center;">Minha Lista</p>
                </div>
            </div> 
            <div class="row">
                
                <?php foreach($vetorTodosregistro as $registro){
                    //Fazendo essa verificação para saber se o filme já foi visto pelo usuário, caso não ele ficará na lista para assistir
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
                 <!-- Fazendo essa verificação para saber se a série já foi visto pelo usuário, caso não ele ficará na lista para assistir -->
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
                 <!-- Utilização para estética do site (Linha verde) TODO: Melhorar para deixar mais elegante esse código -->
                <div class="row"><div class="col-10 mt-4" style="border: solid 1px #8FBC8F;display:flex; margin:auto;"></div></div>
                <div class="row mt-2 mb-2">
                    <p style="font-family: Andale Mono, monospace; font-size:50px; color:#32CD32;text-align: center;">Filmes já assistidos</p>
                </div> 
                <?php foreach($vetorTodosregistro as $registro){
                    //Com essa verificação conseguimos ver se o usuário já viu esse filme ou série, e listar somente os que já foram vistos
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
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>
            $('#busca').keyup(function(){
                var busca = $("#busca").val();
                $.post('BuscarFilme.php',{busca:busca},function(data){
                    $("#resultados").html(data);
                });
            });
        </script>
    </body>
</html>