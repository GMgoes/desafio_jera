<!-- Classe responsável pelo formulário para criação de um usuário, utilizando método POST para envio das informações, classe destino: SalvarCadastro.php -->
<html>
    <head>
        <title>Cadastro</title>
        
        <link href="CSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    </head>
    <body id="background">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div id ="form-criar-conta" class="col-2">
                    <form method="POST" action="SalvarCadastro.php">
                        <div class="form-group mt-1">
                            <label><h5 id="letras">Nome</h5></label>
                            <input type="text" class="form-control" name="nome" required>
                        </div>
                        <div class="form-group mt-1">
                            <label><h5 id="letras">Email</h5></label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="form-group mt-1">
                            <label><h5 id="letras">Senha</h5></label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group mt-1">
                            <label><h5 id="letras">Data de Nascimento</h5></label>
                            <input type="date" class="form-control" name="nascimento" required>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button type="submit" id="letras" class="btn btn-outline-success mt-2">Cadastrar</button>
                            <a id="letras" class="btn btn-outline-primary mt-2" href="Index.php">Voltar</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
