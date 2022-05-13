<html>
	<head>
		<title>Series</title>

        <link href="CSS.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<?php session_start();
		require_once("Conexao.php");
	    ?>
		<div class="container-fluid">
			<div class="mt-2" style="border: solid 1px #8FBC8F;">
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Perfil.php"><?php echo $_SESSION["perfil_usuario"]; ?></a>
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
                    <?php
                    $serie_buscada = "a";
                    $url = "https://api.themoviedb.org/3/search/tv?api_key=ad6b74208be55f7885c94593518b9477&query=".($serie_buscada)."&language=pt-BR";
                    $json = file_get_contents($url);

                    $objeto = json_decode($json);
                    $total_paginas = $objeto->total_pages;

                    $auxiliar_paginacao = 0;

                    for($x=1; $x <= 2; $x++){
                        $url_pagina_atual = "https://api.themoviedb.org/3/search/tv?api_key=ad6b74208be55f7885c94593518b9477&query=".$serie_buscada."&page={$x}&language=pt-BR";
                        $json_pagina_atual = file_get_contents($url_pagina_atual);
                        $objeto_atual = json_decode($json_pagina_atual);
                        foreach($objeto_atual->results as $resultado){
                    ?>
                    <div class = "col-3 mt-2">
                    <?php    
                            if($resultado->poster_path == null){
                                $formato_imagem = "moldura.jpg";
                                }else{
                                    $formato_imagem = "https://image.tmdb.org/t/p/w300/".$resultado->poster_path;    
                                }                                         
                    ?>
                        <form action = "VisualizarSerie.php" method = "POST">
                            <input type="hidden" name="id_serie" value="<?php echo ($resultado->id) ?>">
                            <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo $formato_imagem ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                        </form>
                        <div class="row">
                            <div class="col-10">
                               <p class="d-flex justify-content-center "><?php echo($resultado->name); ?></p> 
                            </div>
                            <div class="col-2">
                                <form method="POST" action="SalvarFavorito.php">
                                    <input type="hidden" name="id_filme" value="<?php echo ($resultado->id) ?>">
                                    <input type="hidden" name="nome_filme" value="<?php echo ($resultado->name) ?>">
                                    <input type="hidden" name="descricao" value="<?php echo ($resultado->overview) ?>">
                                    <input type="hidden" name="data_lancamento" value="<?php echo ($resultado->first_air_date) ?>">
                                    <input type="hidden" name="imagem" value="<?php echo ($formato_imagem) ?>">
                                    <input type="hidden" name="tipo_cinematografico" value="serie">
                                    <button type ="submit" style="background:transparent; border:none;"><img src="favoritar.png" class="pl-4"></button>
                                </form>
                            </div>                         
                        </div>           
                    </div> 
                    <?php  
                        }
                    }
                    ?>                                                                                     
            </div>       
		</div>
	</body>
</html>