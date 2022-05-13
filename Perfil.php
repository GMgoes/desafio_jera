<!-- Essa classe será responsável pela visualização e para o usuário escolher em qual perfil ele deseja logar -->
<html>
	<head>
		<title>Perfil</title>
		<meta charset="utf-8">
		<link rel="icon" type="imagem/png" href="icone.png">
		<link href="CSS.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		
	</head>
		<?php 
		session_start();
		if($_SESSION["logado"] != true){
        	header("location: Index.php");
    	}
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
	            	<img src="usuario.png" class="card-img-top" style="border: solid 1px #7a297a" alt="imagem de usuário png">	        	
	            	<div class="row justify-content-center mt-5">
	            		<div class="col-8">
	            			<form method="POST" action="AutenticarUsuario.php">
			            		<input type="hidden" name="nome_perfil" value="<?php echo ($auxiliar_nome) ?>">
			            		<input type="hidden" name="id_perfil" value="<?php echo ($auxiliar_id_perfil) ?>">
		            			<button type="submit" style="border: solid 1px #3065ac;" class="btn"><?php echo ($auxiliar_nome) ;?></button>
		            		</form>
	            		</div>	            			            		
		            	<div class="col-4">
		            		<form method="POST" action="DeletarPerfil.php">
		            			<input type="hidden" name="id_perfil" value="<?php echo ($auxiliar_id_perfil) ?>">
	            				<button type="submit" style="border: solid 1px #CD5C5C;" class="btn">Excluir</button>
	            			</form>
		            	</div>
	            	</div>
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
	        	<div class="col-2 mt-2">
	        		<!-- TODO: Fazer a funcionalidade de cadastro de um novo perfil, a questão da quantidade máxima de perfil existentes já está sendo possível de validar (Limite = 4) -->
		            <a class="btn btn-outline-success" style="margin:auto;" href="CadastrarNovoPerfil.php">Cadastrar</a>
		            <a class="btn btn-outline-danger" style="margin:auto;" href="Deslogar.php">Sair</a>
	        	</div>
	        </div>			
		<?php
		}
		?>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	</body>
</html>