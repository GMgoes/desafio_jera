<!-- Essa será uma das nossas classes principais, contendo a listagem dos filmes provenientes da API. -->

<html>
    <head>
        <title>Zilften</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    </head>
    <body style="background-color:  #66CDAA;">
        <div class="container-fluid">
            <div>
            <?php 
            session_start();
            require_once("Conexao.php");
            $nome_perfil = $_POST["nome"];
            $id_usuario = $_POST["id_usuario"];
            ?>
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" style="color:#8B4513;" href="Perfil.php"><?php echo $nome_perfil; ?></a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link fw-bolder" style="color:#8B4513;" href="#">PARA ASSISTIR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" style="color:#8B4513;" href="#">FILMES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" style="color:#8B4513;" href="#">SÉRIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" style="color:#8B4513;"href="Deslogar.php">SAIR</a>
                    </li>
                </ul>
            </div>  
            <div class="mt-3 w-25">
                <form>      
                    <input class="form-control text-dark" style="opacity:0.7;" id="exampleInputEmail1" placeholder="Buscar">
                </form>
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
            <div class="row w-50">
                <div class="mt-4">
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