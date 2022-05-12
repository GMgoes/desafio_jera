<!-- Essa classe será responsável pela visualização e para o usuário escolher em qual perfil ele deseja logar -->
<html>
	<head>
		<title>Perfil</title>
		<style type="text/css">
			#background{
			}
		</style>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	    
		
	</head>
		<?php 
		session_start();
		$contador = 0;
	    require_once("Conexao.php");    
	    $id_usuario = $_SESSION["id_usuario"];
	    $sql = "select id,nome_perfil from perfil where id_usuario = '$id_usuario'";
	    $resultadoSql = mysqli_query($conexao, $sql);
	    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
	    $vetorTodosregistro = array();
	    while($vetorUmregistro != null){
	        array_push($vetorTodosregistro, $vetorUmregistro);
	        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
	    }
	    ?>
	<body id="background">
		<div class="container">
			<div class="row justify-content-center">

		<?php		
	    foreach ($vetorTodosregistro as $umRegistro){
			$auxiliar_nome = $umRegistro["nome_perfil"];
			$auxiliar_id_perfil = $umRegistro["id"];
	    
		?>
	            <div class="col-3" style="margin-top: 200px;">
	            	<img src="usuario.png" class="card-img-top border border-success" alt="imagem de usuário png">	
	            	<form method="POST" action="Inicio.php">
	            		<input type="hidden" name="nome" value="<?php echo ($auxiliar_nome) ?>">
	            		<input type="hidden" name="id_usuario" value="<?php echo ($auxiliar_id_perfil) ?>">
	            		<button type="submit" style="display:flex; margin:auto;border: solid 1px #8FBC8F;" class="btn mt-5"><?php echo $umRegistro["nome_perfil"];?></button>
	            	</form>
	            </div>
	           
	    <?php
	    $contador = $contador+1;
	    }
	    ?>
	    	</div> 
	    <?php
	    if($contador < 4){
	    ?>
	        <!--TODO: Fazer o cadastro de novos perfis para o usuário. -->
	        <div class="row justify-content-center">
	        	<div class="col-1 mt-2">
	        		<!-- TODO: Fazer a funcionalidade de cadastro de um novo perfil, a questão da quantidade máxima de perfil existentes já está sendo possível de validar (Limite = 4) -->
		            <a class="btn btn-outline-dark" style="margin:auto;" href="#">Cadastrar</a>
	        	</div>
	        </div>			
		<?php
		}
		?>
		</div>
	</body>
</html>