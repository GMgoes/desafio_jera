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
			<div class="row justify-content-center">
			<?php 
			$contador = 0;
			$auxiliar_nome = 0;
			$auxiliar_id = 0;
	        require_once("Conexao.php");
	        session_start();
	        $id_usuario = $_SESSION["id_usuario"];
	        $sql = "select id,nome_perfil from perfil where id_usuario = '$id_usuario'";
	        $resultadoSql = mysqli_query($conexao, $sql);
	        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
	        $vetorTodosregistro = array();
	        while($vetorUmregistro != null){
	            array_push($vetorTodosregistro, $vetorUmregistro);
	            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
	        }
	        foreach ($vetorTodosregistro as $umRegistro){
				$auxiliar_nome = $umRegistro["nome_perfil"];
				$auxiliar_id = $umRegistro["id"];
	        ?>
	            <div class="col-3" style="margin-top: 200px;">
	            	<img src="usuario.jpg" class="card-img-top" alt="usuario formato jpg">	
	            	<form method="POST" action="Inicio.php">
	            		<input type="hidden" name="nome" value="<?php echo ($auxiliar_nome) ?>">
	            		<input type="hidden" name="id_usuario" value="<?php echo ($auxiliar_id) ?>">
	            		<button type="submit" style="display:flex; margin:auto;" class="btn btn-outline-dark mt-5"><?php echo $umRegistro["nome_perfil"];?></button>
	            	</form>
	            </div>
	        <?php
	        $contador = $contador+1;
	        }
	        if($contador < 4){
	        ?>
	        <!--TODO: Fazer o cadastro de novos perfis para o usuário. -->
	        	<div class="col-12">
		            	<a class="btn btn-outline-dark" href="#">Cadastrar</a>
	        	</div>
			</div>
			<?php
			}
			?>
		</div>
	</body>
</html>