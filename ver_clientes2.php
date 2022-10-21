<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Clientes</title>
  <style>
    table,
    th,
    td {
      text-align: center;
      position: relative;
      background-color: black;
    }

    h1 {
      text-align: center;
      color: white;
    }

    #bod {
      background-color: black;
    }

    h4 {

      color: black
    }

    .dropdown {

      justify-content: center;
      right: 9.5%;


    }

    th {
      color: white;
    }

    td {
      color: white;
    }

    <?php
    include('conexao.php');
    $sql = "SELECT * FROM cliente";
    $query = mysqli_query($conn, $sql);
    ?>
  </style>
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
  <div class="container">

    <h1>Clientes cadastrados</h1><br>


    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Obs</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Número da casa</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?php echo $dados['cod'] ?></td>
              <td><?php echo $dados['nome'] ?></td>
              <td><?php echo $dados['cpf'] ?></td>
              <td><?php echo $dados['obs'] ?></td>
              <td><?php echo $dados['cnpj'] ?></td>
              <td><?php echo $dados['telefone'] ?></td>
              <td><?php echo $dados['sexo'] ?></td>
              <td><?php echo $dados['cidade'] ?></td>
              <td><?php echo $dados['bairro'] ?></td>
              <td><?php echo $dados['rua'] ?></td>
              <td><?php echo $dados['num_casa'] ?></td>
              <td colspan="2" class="text-center">
                <a class='btn btn-info btn-sm' href='editaclinte.php?cod=<?php echo $dados['cod'] ?>'>Editar</a>
                <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados["cod"] ?>")'>Excluir</a>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>

      <script>
        function confirmar(cod) {
          if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiclientes.php?cod=' + cod;
        }
      </script>
    </div>




  </div>

</body>

</html>