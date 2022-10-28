<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Funcionários</title>
  <style>
    h1 {
      text-align: center;
      color: white;
    }

    #bod {
      background-color: black;
    }

    .dropdown {

      justify-content: center;
      right: 21%;


    }

    h4 {

      justify-content: center;
      width: 800px;


    }

    th {
      color: white;
    }

    td {
      color: white;
    }
  </style>

  <?php
  include('conexao.php');
  $sql = "SELECT * FROM funcionario";
  $query = mysqli_query($conn, $sql);
  ?>

</head>

<body id="bod">

  <nav id="nav" class="navbar navbar-expand-sm bg-success " class="container">

    <div class="container-fluid">
      <a href="tela_principal.php">
        <h4>OSVAC</h4>
      </a>

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

  <h1>Funcionários cadastrados</h1><br>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Telefone</th>
          <th>Cargo</th>
          <th>Foto</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($dados = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $dados['nome'] ?></td>
            <td><?php echo $dados['cpf'] ?></td>
            <td><?php echo $dados['telefone'] ?></td>
            <td><?php echo $dados['cargo'] ?></td>
            <td> <img height="80" width="80" src="imgfunc/<?php echo $dados['foto'] ?>"> </td>

            <td colspan="2" class="text-center">
            <a class='btn btn-info btn-sm' href='inffunc.php?cod=<?php echo $dados['cod_func'] ?>'>Mais informações</a>
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>

   
  </div>
</body>

</html>