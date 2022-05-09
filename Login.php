<!-- Classe responsável por receber os dados fornecidos pelo usuário e redirecioná-los por método POST à classe ValidarCredenciais.php para validar no BD -->
<html>
	<head>
		<title>Zilften</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	
	</head>
	<body style="background-color: 	#66CDAA;">
		<div class="position-absolute top-50 start-50 translate-middle">
			<form method="POST" action="ValidarCredenciais.php">
		        <div class="form-group">
			        <label for="validationServer01"><h5 style="color:	#8B4513;">Email</h5></label>
			        <input type="text" class="form-control"name="email" required>
			    </div>
			    <div class="form-group mt-2">
			        <label for="validationServer02"><h5 style="color:	#8B4513;">Senha</h5></label>
			        <input type="password" class="form-control" name="password" required>
			    </div>
			    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success mt-2" style="color: white;">Entrar</button>
                    <a class="btn btn-outline-primary mt-5" style="color: white;" href="CriarConta.php">Cadastrar</a>  
                </div>		        
	    	</form>
		</div>
	</body>
</html>