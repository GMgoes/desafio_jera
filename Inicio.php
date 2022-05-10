<!-- Essa será uma das nossas classes principais, contendo a listagem dos filmes provenientes da API e o menu principal para o usuário, bem como o aceso aos perfis do usuário. -->

<html>
    <head>
        <title>Zilften</title>
        <style type="text/css">
            #letras-navbar{
                color:#8B4513;
            }
            #background{
               background-color:  #66CDAA; 
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
            <div>
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Perfil.php"><?php echo $nome_perfil; ?></a>
                    </li>
                      <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="#">MINHA LISTA</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="#">FILMES</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="#">SÉRIES</a>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Deslogar.php">SAIR</a>
                    </li>
                </ul>
            </div>  
            <div class="row">
                <div class="mt-2 col-4">
                    <form>      
                        <input id="pesquisa" class="form-control text-dark" style="opacity:0.7;" placeholder="Buscar">
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
                <div class="mt-2 col-6">
                    <div class="card">
                        <div class="card-body" id="resultado">
                            <table class="table">
                                <tr>
                                    <th style="text-align:left;">Filme</th>
                                    <th style="text-align:left;">Descricao</th>
                                    <th style="text-align:center;">Data de Lancamento</th>
                                </tr>
                                <?php foreach ($vetorTodosregistro as $umRegistro){ ?>
                                <tr>
                                    <td style="text-align:left;"><?php echo $umRegistro["nome"];?></td>
                                    <td style="text-align:left;"><?php echo $umRegistro["descricao"];?></td>
                                    <td style="text-align:center;"><?php echo date('Y', strtotime($umRegistro["data_lancamento"])); ?></td>
                                </tr>
                                <?php } ?>
                            </table>                 
                        </div>
                    </div>
                </div>  
                <div class="mt-2 col-6">
                    <div class="card">
                        <div class="card-body" id="resultado">
                            <table class="table">
                                <tr>
                                    <th style="text-align:left;">Filme</th>
                                    <th style="text-align:left;">Descricao</th>
                                    <th style="text-align:center;">Data de Lancamento</th>
                                </tr>
                                <?php foreach ($vetorTodosregistro as $umRegistro){ ?>
                                <tr>
                                    <td style="text-align:left;"><?php echo $umRegistro["nome"];?></td>
                                    <td style="text-align:left;"><?php echo $umRegistro["descricao"];?></td>
                                    <td style="text-align:center;"><?php echo date('Y', strtotime($umRegistro["data_lancamento"])); ?></td>
                                </tr>
                                <?php } ?>
                            </table>                 
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>