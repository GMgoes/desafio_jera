<html>
    <head>
        <title>Zilften</title>
    </head>
    <body style="background-color:  #66CDAA;">
        <div class="container-fluid">
            <?php 
            require_once("Cabecalho.php");
            require_once("Conexao.php");
            $id_per = $_SESSION["id_perfil"];
            $sql = "select * from filmes where id_perfil = $id_per";
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