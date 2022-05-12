<!-- Essa será uma das nossas classes principais, contendo a listagem dos filmes provenientes da API e o menu principal para o usuário, bem como o aceso aos perfis do usuário. -->

<html>
    <head>
        <title>Zilften</title>
        <style type="text/css">
            #background{
            }
            #letras-navbar{
                background-color: transparent;
                color:#32CD32;
                border: none;
            }      
            #filme_buscado{
                background: url(iconelupa.png) no-repeat center right;
                paddin: 5px;
                border: none;
                width: 20px;
                height: 45px;
                transition: all 0.5s linear;
            }#filme_buscado:focus{
                width: 200px;
                height: 45px;
                border-bottom: solid 1px black;
                outline: none;
            }          
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    </head>
    <?php 
    session_start();
    require_once("Conexao.php");
    $nome_perfil = $_POST["nome"];
    $id_usuario = $_POST["id_usuario"];
    ?>
    <body id="background">
        <div class="container-fluid">
            <div class="mt-2" style="border: solid 1px #8FBC8F;">
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Perfil.php"><?php echo($nome_perfil); ?></a>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Inicio.php">FAVORITOS</a>
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
                <div class="mt-2 col-12">
                    <div style="border: solid 1px #8FBC8F;">
                        <table class="table">
                            <?php foreach ($vetorTodosregistro as $registro) { 
                            ?>
                            <tr>
                                <td><img src="moldura.jpg" class="img-fluid"></td>
                                <td style="text-align:center;"><?php echo $registro["nome"]; ?></td>
                                <td style="text-align:left; text-align: justify; width:400px; "><?php echo $registro["descricao"]?></td>      
                                <td style="text-align:center; width:200px;"><?php echo date('Y',strtotime($registro["data_lancamento"]));?></td>
                                <td style="text-align:center; width:200px;">
                                    <form method="POST" action="Inicio.php" style="margin-top: 10px;">
                                        <input type="hidden" name="nome" value="<?php echo ($nome_perfil) ?>">
                                        <input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">
                                        <button id="favoritar" type="submit"><img src="iconesetinha.png" style="height:10px;width:10px; padding:auto;"></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>