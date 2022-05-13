<!-- Classe responsável pelo formulário para criação de um usuário, utilizando método POST para envio das informações, classe destino: SalvarCadastro.php -->
<html>
    <head>
        <title>Cadastro de Perfil</title>
        
        <link href="CSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    </head>
    <body id="background">
        <?php session_start(); ?>
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
    </body>
</html>
