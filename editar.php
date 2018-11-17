<?php
require_once "Usuario.php";

$editar = 0;

if (isset($_REQUEST['ed']) && !empty($_REQUEST['ed'])) {
    $editar = $_REQUEST['ed'];
}

if (isset($_POST['input-nome']) && !empty($_POST['input-nome'])) {
    $nome = $_POST['input-nome'];
    $rg = $_POST['input-rg'];
    $cpf = $_POST['input-cpf'];
    $email = $_POST['input-email'];
    $senha = $_POST['input-senha'];
    $edit = new Usuario;
    $edit->update($nome,$rg,$cpf,$email,$senha,$editar);
    header("Location: form.php");
}

$res = new Usuario;
$resultado = $res->selectId($editar);

 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
     <meta charset="UTF-8">
     <title>Editar</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </head>
 <body>
     <div class="container col-md-10">
        <form method="POST" class="mt-4">
            <h1 class="display-4">Editar</h1>
            <hr class="border border-secondary">
            <div class="row">
                <div class="col">
                     <input type="text" class="form-control" placeholder="Nome" name="input-nome" value="<?php echo $resultado['nome'] ?>">
                </div>
                <div class="col">
                     <input type="number" class="form-control" placeholder="RG" name="input-rg" value="<?php echo $resultado['rg']?>">
                </div>
            </div>
             <div class="row mt-4">
                <div class="col">
                     <input type="number" class="form-control" placeholder="CPF" name="input-cpf" value="<?php echo $resultado['cpf']?>">
                </div>
                <div class="col">
                     <input type="email" class="form-control" placeholder="E-mail" name="input-email" value="<?php echo $resultado['email']?>">
                </div>
            </div>
            <div class="row mt-4">
                <div class=" col-md-6">
                     <input type="password" class="form-control" placeholder="Senha" name="input-senha" value="<?php echo $resultado['senha']?>">
                </div>
            </div>
            <input type="submit" value="Atualizar" class="btn btn-success mt-4">
        </form>
 </body>
 </html>
