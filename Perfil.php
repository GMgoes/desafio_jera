<!-- Essa classe será responsável pela visualização e para o usuário escolher em qual perfil ele deseja logar -->
<html>
	<head>
		<title>Perfil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	    
		
	</head>
	<body style="background-color:  #66CDAA;">
		<div class="container">
			<div class="row">
    		<div class="col-sm">
			<?php 
	        require_once("Conexao.php");

	        $sql = "select nome_perfil from perfil ";
	        $resultadoSql = mysqli_query($conexao, $sql);
	        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
	        $vetorTodosregistro = array();
	        while($vetorUmregistro != null){
	            array_push($vetorTodosregistro, $vetorUmregistro);
	            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
	        }
	        foreach ($vetorTodosregistro as $umRegistro){ ?>
	            <div style="float:left;">
	            	<img src="usuario.jpg" style ="width:150px;"class="card-img-top" alt="...">	
	            	<a href="Index.php"><?php echo $umRegistro["nome_perfil"]; ?></a>
	            </div>
	        <?php
	        }?>
		</div>
		
	</body>
</html>