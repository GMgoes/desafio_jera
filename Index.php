<!-- Classe responsável por receber os dados fornecidos pelo usuário e redirecioná-los por método POST à classe ValidarCredenciais.php para validar no BD -->
<html>
	<head>
		<title>Zilften</title>
		<style type="text/css">
			#background{
			}
			#form-login{
				margin-top: 200px;
			}	
			#letras{
				color:#32CD32
			}		
		</style>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	
	</head>
	<body id="background">
		<?php session_start(); ?>
		<div class="container-fluid">
			<div class ="row justify-content-center">
				<div id="form-login" class="col-2">
					<form method="POST" action="ValidarCredenciais.php">
				        <div class="form-group">
					        <label><h5 id="letras">Email</h5></label>
					        <input type="text" class="form-control"name="email" required>
					    </div>
					    <div class="form-group mt-2">
					        <label><h5 id="letras">Senha</h5></label>
					        <input type="password" class="form-control" name="password" required>
					    </div>
					    <div class="d-grid gap-2">
		                    <button id="letras" type="submit" class="btn btn-outline-success mt-2">Entrar</button>
		                    <a id="letras" class="btn btn-outline-primary mt-5" href="CriarConta.php">Cadastrar</a>  
		                </div>		        
			    	</form>
				</div>
			</div>
		</div>
	</body>
</html>