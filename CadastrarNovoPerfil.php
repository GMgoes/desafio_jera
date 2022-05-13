<!-- Classe responsável pelo formulário para criação de um novo usuário quando a conta já é existente, utilizando método POST para envio das informações, classe destino: SalvarNovoPerfil.php -->
<html>
    <head>
        <title>Cadastro de Perfil</title>
        <link rel="icon" type="imagem/png" href="icone.png">
        <meta charset="utf-8">
        <link href="CSS.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    </head>
    <body id="background">
        <?php session_start();
        if($_SESSION["logado"] != "true"){
            header("location: Perfil.php");
        }
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div id ="form-criar-conta" class="col-2">
                    <div class="form-group mt-1">
                        <label><h5 id="letras">Olá: <?php echo $_SESSION["nome"]; ?></h5></label>
                    </div>
                    <form method="POST" action="SalvarNovoPerfil.php">
                        <div class="form-group mt-1">
                            <label><h5 id="letras">Nome do novo perfil</h5></label>
                            <input type="text" class="form-control" name="nome" required>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button type="submit" id="letras" class="btn btn-outline-success mt-2">Cadastrar</button>
                            <a id="letras" class="btn btn-outline-primary mt-2" href="Perfil.php">Voltar</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>
