<!-- Classe responsável por receber os dados fornecidos pelo usuário e redirecioná-los por método POST à classe ValidarCredenciais.php para validar no BD -->
<html>
	<head>
		<title>Zilften</title>
		<meta charset="utf-8">
		<link rel="icon" type="imagem/png" href="icone.png">
		<link href="CSS.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	</head>
	<body id="background">		
		<div class="container-fluid">
			<?php session_start(); 
			//Nessa parte mostramos ao usuário que deu certo a parte de cadastro de usuário, caso ele tenha vindo do processo de criar um novo usuário no site.
            if(isset($_SESSION["cadastrado"])){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Usuário cadastrado!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION["cadastrado"]);
            } ?>
            <!-- Nessa parte temos nosso formulário para Login, passamos todas as informações para a ValidarCredenciais.php fazer a validação conforme está no BD. -->
			<div class ="row justify-content-center">
				<div id="form-login" class="col-2">
					<form method="POST" action="ValidarCredenciais.php">
				        <div class="form-group">
					        <label><h5 style="color:#32CD32;">Email</h5></label>
					        <input type="text" class="form-control"name="email" required>
					    </div>
					    <div class="form-group">
					        <label><h5 style="color:#32CD32;">Senha</h5></label>
					        <input type="password" class="form-control" name="password" required>
					    </div>
					    <div class="d-grid gap-2 mt-2">
		                    <button type="submit" class="btn btn-outline-success mt-5">Entrar</button>
		                    <a class="btn btn-outline-primary mt-2" href="CriarConta.php">Cadastrar</a>  
		                </div>		        
			    	</form>
				</div>
			</div>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	</body>
</html>