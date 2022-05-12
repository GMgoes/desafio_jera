<html>
	<head>
		<title>Filmes</title>

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
        ?>
	<body>
		<div class="container-fluid">
			<div class="mt-2" style="border: solid 1px #8FBC8F;">
                <ul class="nav justify-content-center mt-3">
                    <li class="nav-item">
                        <form method="POST" action="Perfil.php">
                            <input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">
                            <button id="letras-navbar" type="submit" class="nav-link fw-bolder"><?php echo($nome_perfil); ?></button>
                        </form>
                    </li>
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
                        <form method="POST" action="Series.php">
                            <input type="hidden" name="nome" value="<?php echo ($nome_perfil) ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">
                            <button id="letras-navbar" type="submit" class="nav-link fw-bolder">SERIES</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a id="letras-navbar" class="nav-link fw-bolder" href="Deslogar.php">SAIR</a>
                    </li>
                </ul>
            </div> 
			<div class="row">                                                      
                    <?php
                    $filme_buscado = "a";
                    $url = "https://api.themoviedb.org/3/search/movie?api_key=ad6b74208be55f7885c94593518b9477&query=".($filme_buscado)."&language=pt-BR";
                    $json = file_get_contents($url);

                    $objeto = json_decode($json);
                    $total_paginas = $objeto->total_pages;

                    $auxiliar_paginacao = 0;

                    for($x=1; $x <= 5; $x++){
                        $url_pagina_atual = "https://api.themoviedb.org/3/search/movie?api_key=ad6b74208be55f7885c94593518b9477&query=".$filme_buscado."&page={$x}&language=pt-BR";
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
                        <form action = "VisualizarFilme.php" method = "POST">
                            <input type="hidden" name="id_filme" value="<?php echo ($resultado->id) ?>">
                            <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo $formato_imagem ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                        </form>         
                        <div class="row">
                            <div class="col-10">
                               <p class="d-flex justify-content-center "><?php echo($resultado->title); ?></p> 
                            </div>
                            <div class="col-2">
                                <form method="POST" action="SalvarFavorito.php">
                                    <input type="hidden" name="id_filme" value="<?php echo ($resultado->id) ?>">
                                    <input type="hidden" name="nome_filme" value="<?php echo ($resultado->title) ?>">
                                    <input type="hidden" name="descricao" value="<?php echo ($resultado->overview) ?>">
                                    <input type="hidden" name="data_lancamento" value="<?php echo ($resultado->release_date) ?>">
                                    <input type="hidden" name="id_perfil" value="<?php echo ($id_usuario) ?>">
                                    <input type="hidden" name="imagem" value="<?php echo ($formato_imagem) ?>">
                                    <input type="hidden" name="nome" value="<?php echo ($nome_perfil) ?>">
                                    <input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">
                                    <button type ="submit" style="background:transparent; border:none;"><img src="computador.png" class="pl-4"></button>
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