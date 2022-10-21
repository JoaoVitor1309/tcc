<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
    <title>Cadastro de clies</title>
    

    <style> 
         #bod {
            background-color: black;
        }
        #formu{
            position: absolute;
            padding-left: 37%;
            display: inline-block;
	        font-size: 20px;
        }
        h1{
            text-align: center;
            color: white;
        }

        .dropdown{
            
            justify-content: center;
            right: 20.4%;

            
        }

        h4 {

            color: black;
            width: 800px;


        }



    </style>

<?php
include('conexao.php');

if (isset($_POST['btnEnviar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $obs =  $_POST['obs'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $cidade = $_POST['cidade'];
    $rua =  $_POST['rua'];
    $bairro = $_POST['bairro'];
    $num_casa = $_POST['num_casa'];
    
    $sql = "INSERT INTO cliente (nome, cpf, obs, cnpj, telefone, sexo, cidade, rua, bairro, num_casa) 
            VALUES ('$nome', '$cpf', '$obs', '$cnpj', '$telefone','$sexo', '$cidade', '$rua', '$bairro', '$num_casa')";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Cliente cadastrado com sucesso.') </script>";
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
?>



</head>
<body id="bod">

<nav id="nav" class="navbar navbar-expand-sm bg-success " class="container">

  <div class="container-fluid">
      <a href="tela_principal.php">
        <h4>OSVAC</h4>
      </a>

      <ul class="navbar-nav">


      <ul class="navbar-nav">

<div class="dropdown">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
     Cliente
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="cadastrocliente2.php">Cadastrar Cliente</a>
        <a class="dropdown-item" href="ver_clientes2.php">Listagem de Clientes</a>
    </div>
</div>                
    
<div class="dropdown">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Estoque
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="cadastropecas.php">Cadastrar Peça</a>
        <a class="dropdown-item" href="verestoque.php">Listagem de Estoque</a>
    </div>
</div> 

<div class="dropdown">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Funcionários
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="cadastrofunc.php">Cadastrar Funcionário</a>
        <a class="dropdown-item" href="verfunc.php">Listagem de Funcionários</a>
    </div>
</div> 

<div class="dropdown">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
     Serviços
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="cadastroaparelho.php">Cadastrar Serviço</a>
        <a class="dropdown-item" href="verservicos.php">Listagem de Serviços</a>
    </div>
</div> 

</ul>

</nav><br>

<div class="container">

    <h1>Cadastrar clientes</h1><br>

   
    <form method="post" class="container">


            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="Nome Completo" name="nome">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Informe o CPF" name="cpf">
              </div>
            </div><br><br>

            <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Observação" name="obs">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Informe o CNPJ" name="cnpj">
                </div>
              </div><br><br>

              <div class="row">
              <div class="col">
                  <input type="text" class="form-control" placeholder="Sexo(M ou F)" name="sexo">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Telefone" name="telefone">
                </div>
              </div><br><br>

              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Cidade" name="cidade">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Bairro" name="bairro">
                </div>
              </div><br><br>

              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Rua" name="rua">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Número da casa" name="num_casa">
                </div>
              </div><br><br>

 
              <div class="form-group">
            <input class='btn btn-success' type="submit" value="Enviar" name="btnEnviar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
        </div>

    </form>
</div>

</body>
</html>