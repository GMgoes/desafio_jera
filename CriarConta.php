<!-- Classe responsável pelo formulário para criação de um usuário, utilizando método POST para envio das informações, classe destino: SalvarCadastro.php -->
<html>
    <head>
        <title>Cadastro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    </head>
    <body style="background-color:  #66CDAA;">
        <?php
        /*Valida se existe uma sessão já criada chamada cadastrado (É gerada após criar-se um registro no BD), caso ela exista, é criado um alert e informa
        qual o usuário que foi cadastrado
        */
        session_start();
            if(isset($_SESSION["cadastrado"])):
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
               Usuário: <strong><?php echo $_SESSION["nome_perfil"]; ?></strong> Cadastrado!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
                unset($_SESSION["cadastrado"]);
            endif
        ?>
        <div class="position-absolute top-50 start-50 translate-middle">
                <form method="POST" action="SalvarCadastro.php">
                    <div class="form-group">
                        <label class="validationDefault01" for="nome"><h5 class="mt-1" style="color:    #8B4513;">Nome</h5></label>
                        <input type="text" class="form-control" name="nome" id="validationDefault01" required>
                    </div>
                    <div class="form-group">
                        <label class="validationDefault02" for="login"><h5 class="mt-1" style="color:    #8B4513;">Email</h5></label>
                        <input type="text" class="form-control" name="email" id="validationDefault02" required>
                    </div>
                    <div class="form-group">
                        <label class="validationDefault03" for="senha"><h5 class="mt-1" style="color:    #8B4513;">Senha</h5></label>
                        <input type="password" class="form-control" name="password" id="validationDefault03" required>
                    </div>
                    <div class="form-group">
                        <label class="validationDefault03" for="senha"><h5 class="mt-1" style="color:    #8B4513;">Data de Nascimento</h5></label>
                        <input type="date" class="form-control" name="nascimento" id="validationDefault03" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success mt-2" style="color: white;">Cadastrar</button>
                        <a class="btn btn-outline-primary mt-2" style="color: white;" href="Index.php">Voltar</a>  
                    </div>
                </form>
        </div>
    </body>
</html>
