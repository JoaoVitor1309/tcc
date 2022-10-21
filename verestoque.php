<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Estoque</title>
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
  $sql = "SELECT * FROM peca";
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


  <div class="container">
    <h1>Estoque</h1><br>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th>Modelo</th>
          <th>Tipo</th>
          <th>Marca</th>
          <th>Dimensões</th>
          <th>Valor</th>
          <th>Foto</th>
          <th>Quantidade</th>
          <th>Ação</th>
        </tr>
        <?php while ($dados = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $dados['modelo'] ?></td>
            <td><?php echo $dados['tipo'] ?></td>
            <td><?php echo $dados['marca'] ?></td>
            <td><?php echo $dados['dimensoes'] ?></td>
            <td><?php echo $dados['valor'] ?></td>
            <td> <img height="80" width="80" src="imgestoque/<?php echo $dados['foto'] ?>"> </td>
            <td><?php echo $dados['quantidade'] ?></td>
            <td colspan="2" class="text-center">
              <a class='btn btn-info btn-sm' href='editaestoque.php?cod=<?php echo $dados['cod_peca'] ?>'>Editar</a>
              <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados["cod_peca"] ?>")'>Excluir</a>
            </td>
          </tr>
        <?php } ?>

        </tbody>
      </table> 

      <script>
        function confirmar(cod) {
          if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluipeca.php?cod=' + cod;
        }
      </script>

    </div>
  </div>


</body>

</html>