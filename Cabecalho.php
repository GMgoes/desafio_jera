<!-- Classe que irá ser implementada em outras páginas, para evitar reescrita de código, possuí o menu principal da aplicação -->

<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	    
    </head>
	<body>
		<div>
			<?php 
			session_start();
			?>
			<ul class="nav justify-content-center mt-3">
				<li class="nav-item">
					<a class="nav-link active fw-bolder fw-bolder" style="color:#8B4513;" href="#"><?php echo $_SESSION["nome"] ?></a>
				</li>
				  <li class="nav-item">
				    <a class="nav-link fw-bolder" style="color:#8B4513;" href="#">FAVORITOS</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link fw-bolder" style="color:#8B4513;" href="#">FILMES</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link fw-bolder" style="color:#8B4513;" href="#">SÉRIES</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link fw-bolder" style="color:#8B4513;"href="Deslogar.php">SAIR</a>
				</li>
			</ul>
		</div>	
			<div class="mt-3 w-25">
				<form>		
					<input class="form-control text-dark" style="opacity:0.7;" id="exampleInputEmail1" placeholder="Buscar">
				</form>
			</div>
    </body>
</html>