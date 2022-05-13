<html>
	<head>
		<title>Séries</title>
        <meta charset="utf-8">
        <link rel="icon" type="imagem/png" href="icone.png">
        <link href="CSS.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	</head>
	<body>
		<?php session_start();
        //Validação para detectarmos se o usuário está logado ou não.
        if($_SESSION["perfil_logado"] != "true"){
            header("location: Perfil.php");
        }
		require_once("Conexao.php");
	    ?>
		<div class="container-fluid">
            <!--Menu Navbar da nossa aplicação, contém os redirecionamentos possíveis enquanto o usuário está logado. -->
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
            <!--Aqui irá conter nossa row com todos as séres buscados na API com o query=a, divide cada série buscada em uma col de tamanho = 3, para dispor 4 séries por linha. TODO: Melhorar a exibição dessas séries, e corrigir a implementação de busca de todos as séries utilizando um parametro mais adequado -->  
			<div class="row">                                                      
                    <?php
                    $serie_buscada = "a";
                    $url = "https://api.themoviedb.org/3/search/tv?api_key=ad6b74208be55f7885c94593518b9477&query=".($serie_buscada)."&language=pt-BR";
                    $json = file_get_contents($url);

                    $objeto = json_decode($json);
                    $total_paginas = $objeto->total_pages;

                    $auxiliar_paginacao = 0;
                    //Com esse laço de repetição, iremos pegar apenas duas páginas de filme do nosso JSON.
                    for($x=1; $x <= 2; $x++){
                        $url_pagina_atual = "https://api.themoviedb.org/3/search/tv?api_key=ad6b74208be55f7885c94593518b9477&query=".$serie_buscada."&page={$x}&language=pt-BR";
                        $json_pagina_atual = file_get_contents($url_pagina_atual);
                        $objeto_atual = json_decode($json_pagina_atual);
                        foreach($objeto_atual->results as $resultado){
                    ?>
                    <div class = "col-3 mt-2">
                    <?php   
                            //Nessa comparação vemos se o filme possuí um poster ou não, se ele não tiver, colocamos uma imagem genérica de ausência de imagem (Imagem em cinza);
                            if($resultado->poster_path == null){
                                $formato_imagem = "moldura.jpg";
                                }else{
                                    $formato_imagem = "https://image.tmdb.org/t/p/w300/".$resultado->poster_path;    
                                }                                         
                    ?>
                        <!--Nesse formulário será apresentado cada poster, TODO: Ao clicar no post, será direcionado à uma página que irá mostrar as informações completas da série -->
                        <form action = "#" method = "POST">
                            <input type="hidden" name="id_serie" value="<?php echo ($resultado->id) ?>">
                            <button type ="submit" style="background:transparent; border:none;"><img src="<?php echo $formato_imagem ?>" class="img-fluid rounded" style="height:300px; width:600px;"></button>
                        </form>
                        <div class="row">
                            <div class="col-9">
                               <p class="d-flex justify-content-center "><?php echo($resultado->name); ?></p> 
                            </div>
                            <!--Nessa parte, será o nosso formulário para passarmos os valores à SalvarFavorito.php, onde salvamos uma série na nossa tabela filmes (Seria a nossa função para adicionar a série à lista) -->
                            <div class="col-2">
                                <form method="POST" action="SalvarFavorito.php">
                                    <input type="hidden" name="id_filme" value="<?php echo ($resultado->id) ?>">
                                    <input type="hidden" name="nome_filme" value="<?php echo ($resultado->name) ?>">
                                    <input type="hidden" name="descricao" value="<?php echo ($resultado->overview) ?>">
                                    <input type="hidden" name="data_lancamento" value="<?php echo ($resultado->first_air_date) ?>">
                                    <input type="hidden" name="imagem" value="<?php echo ($formato_imagem) ?>">
                                    <input type="hidden" name="tipo_cinematografico" value="serie">
                                    <button type ="submit" title="Adicionar à lista" style="background:transparent; border:none;"><img src="favoritar.jpg" class="pl-4"></button>
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	</body>
</html>