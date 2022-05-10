<!-- Classe responsável pelo formulário para criação de um usuário, utilizando método POST para envio das informações, classe destino: SalvarCadastro.php -->
<html>
    <head>
        <title>Cadastro</title>
        <style type="text/css">
            #background{
                background-color:  #66CDAA;
            }
            #form-criar-conta{
                margin-top: 200px;
            }
            #letras{
                color: #8B4513;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    </head>
    <body id="background">
        <?php
        session_start();
        if(isset($_SESSION["cadastrado"])):
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Usuário:<strong><?php echo $_SESSION["nome_perfil"]; ?></strong> Cadastrado!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION["cadastrado"]);
        endif
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div id ="form-criar-conta" class="col-2">
                    <form method="POST" action="SalvarCadastro.php">
                        <div class="form-group">
                            <label for="nome"><h5 id="letras" class="mt-1">Nome</h5></label>
                            <input type="text" class="form-control" name="nome" id="validationDefault01" required>
                        </div>
                        <div class="form-group">
                            <label for="login"><h5 id="letras" class="mt-1">Email</h5></label>
                            <input type="text" class="form-control" name="email" id="validationDefault02" required>
                        </div>
                        <div class="form-group">
                            <label for="senha"><h5 id="letras" class="mt-1">Senha</h5></label>
                            <input type="password" class="form-control" name="password" id="validationDefault03" required>
                        </div>
                        <div class="form-group">
                            <label for="senha"><h5 id="letras" class="mt-1">Data de Nascimento</h5></label>
                            <input type="date" class="form-control" name="nascimento" id="validationDefault03" required>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button type="submit" class="btn btn-outline-success mt-2" style="color: white;">Cadastrar</button>
                            <a class="btn btn-outline-primary mt-2" style="color: white;" href="Index.php">Voltar</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
