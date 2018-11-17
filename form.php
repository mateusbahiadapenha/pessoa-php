<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container col-md-10">
        <form action="index.php" method="POST" class="mt-4">
            <h1 class="display-4">Cadastro</h1>
            <hr class="border border-secondary">
            <div class="row">
                <div class="col">
                     <input type="text" class="form-control" placeholder="Nome" name="input-nome">
                </div>
                <div class="col">
                     <input type="number" class="form-control" placeholder="RG" name="input-rg">
                </div>
            </div>
             <div class="row mt-4">
                <div class="col">
                     <input type="number" class="form-control" placeholder="CPF" name="input-cpf">
                </div>
                <div class="col">
                     <input type="email" class="form-control" placeholder="E-mail" name="input-email">
                </div>
            </div>
            <div class="row mt-4">
                <div class=" col-md-6">
                     <input type="password" class="form-control" placeholder="Senha" name="input-senha">
                </div>
            </div>
            <h2 class="display-4 mt-3">Login</h2>
            <hr class="border border-secondary">
            <div class="row">
                <div class="col">
                     <input type="text" class="form-control" placeholder="Login" name="login-usuario">
                </div>
                <div class="col">
                     <input type="password" class="form-control" placeholder="Senha" name="login-senha">
                </div>
            </div>
            <div class="row mt-4">
                <div class=" col-md-6">
                   <button type="submit" class="btn btn-primary mt-3">Cadastrar</button
                </div>
            </div>
            >
        </form>
    </div>
    <div class="container">
        <table class="table table-dark mt-4 text-center">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rg</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               <?php
               require_once "Usuario.php";
               $dados = new Usuario;
               $result = $dados->select();
                    foreach ($result as $dado) {

                        echo "<tr>";
                        echo "<td>{$dado['nome']}</td>";
                        echo "<td>{$dado['rg']}</td>";
                        echo "<td>{$dado['cpf']}</td>";
                        echo "<td>{$dado['email']}</td>";
                        echo '<td><a href="excluir.php?ex=' . $dado['id'] . '" class="btn btn-danger js-btnExcluir">Excluir</a> | <a href="editar.php?ed='.$dado['id'].'" class="btn btn-primary">Editar</a></td>';
                        echo "</tr>";

                    }

                ?>
            </tbody>
        </table>
    </div>

    <script>
        /*
        (function(){
            let btns = document.querySelectorAll('.js-btnExcluir');
            btns.forEach( function(btn) {
                btn.addEventListener('click',function(e){
                    e.preventDefault();
                    let pg = confirm('Deseja remover esse item');
                    if (pg) {

                    }
                })
            });
        })()
        */
    </script>";
</body>
</html>
