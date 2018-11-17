<?php

class Usuario {

    private $user = "root";
    private $password = "m2t3s4";
    private $dbName = "agenda";
    private $host = "localhost";
    private $pdo;
    private $idCad;
    public $login,$senha;

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:dbname=$this->dbName;host=$this->host",$this->user,$this->password);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
function PegarLogin($login){
        $this->login = $login;
    }
    function SenhaLogin($senha){
        $this->senha = $senha;
    }
     public function login(){
        $stmt = $this->pdo->prepare("SELECT * FROM pessoa,login WHERE id=pessoa_fk");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
         foreach ($resultado as $dado) {
        if($this->login==$resultado['login'] AND $this->senha==$resultado['senha']){
                    echo "seja bem vindo, <br> Seu login É ".$resultado['nome']."<br>";

                    
header("Location: home.php ");


                }else{
                    echo "Desculpe-me dados nao reegitrados . ".$resultado['id']."<br>";
                    
                }
         }
    }

    public function cadastroUsuario($nome,$rg,$cpf,$email,$senha){
        $stmt = $this->pdo->prepare("INSERT INTO pessoa (nome,rg,cpf,email,senha) VALUES (:NOME, :RG, :CPF, :EMAIL, :SENHA)");
        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":RG", $rg);
        $stmt->bindParam(":CPF", $cpf);
        $stmt->bindParam(":EMAIL", $email);
        $stmt->bindParam(":SENHA", $senha);
        $stmt->execute();
    }

    public function idUsuario($loginUsuario,$loginSenha){
        $this->idCad = $this->pdo->lastInsertId();
        $stmt = $this->pdo->prepare("INSERT INTO login (idPessoa_fk,login,senha) VALUES ($this->idCad,:LOGIN,:SENHALOGIN)");
        $stmt->bindParam(":LOGIN", $loginUsuario);
        $stmt->bindParam(":SENHALOGIN", $loginSenha);
        $stmt->execute();
    }

    public function select(){
        $stmt = $this->pdo->prepare("SELECT * FROM pessoa");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function selectId($id){
        $stmt = $this->pdo->prepare("SELECT * FROM pessoa WHERE id = :ID");
        $stmt->bindParam(":ID", $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        }else {
            header("Location: form.php");
        }

    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :ID");
        $stmt->bindParam(":ID", $id);
        $stmt->execute();
    }

    public function update($nome,$rg,$cpf,$email,$senha,$id){
        $stmt = $this->pdo->prepare("UPDATE pessoa SET nome = :NOME, rg = :RG, cpf = :CPF, email = :EMAIL, senha = :SENHA WHERE id = :ID" );
        $stmt->bindParam(":NOME",$nome);
        $stmt->bindParam(":RG",$rg);
        $stmt->bindParam(":CPF",$cpf);
        $stmt->bindParam(":EMAIL",$email);
        $stmt->bindParam(":SENHA",$senha);
        $stmt->bindParam(":ID",$id);
        $stmt->execute();
    }

}

$login = @$_REQUEST["email"];
$senha = @$_REQUEST["senha"];

$LogarSys = new Usuario;
$LogarSys->PegarLogin($login);
$LogarSys->SenhaLogin($senha);
$LogarSys->login();

 ?>
