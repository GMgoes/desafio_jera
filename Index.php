<!-- Classe responsável por receber os dados fornecidos pelo usuário e redirecioná-los por método POST à classe ValidarCredenciais.php para validar no BD -->
<html>
	<head>
		<title>Zilften</title>

		<link href="CSS.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	
	</head>
	<body id="background">
		<div class="container-fluid">
			<div class="row">
                <?php
                session_start();
                if(isset($_SESSION["cadastrado"])):
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuário:<strong><?php echo $_SESSION["nome"]; ?></strong> Cadastrado!
                    <button type="button" class="btn-close" btn-data-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    unset($_SESSION["cadastrado"]);
                    unset($_SESSION["nome"]);
			        unset($_SESSION["email"]);
                endif
                ?>
            </div>
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