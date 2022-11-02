<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-latest.js"></script>
  <script src="js/jquery.tablesorter.min.js"></script>
  <script src="js/scripts.js" type="text/javascript"></script>
  <link ref="stylesheet" href="modelolistagem.css">
  
  <title>Aparelhos para conserto</title>

  <style>
  </style>

  <?php
  include('conexao.php');
  $sql = "SELECT * FROM aparelho";
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
  <br>

  <div class="container">

  <h1>Aparelhos em/para conserto</h1><br>

  <table>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Modelo</th>
            <!-- <th>Orçamento</th> -->
            <!-- <th>Chegada</th> -->
            <th>Foto</th>
            <!-- <th>Problemas</th> -->
            <!-- <th>Tipo</th> -->
            <th>Cliente</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?php echo $dados['modelo'] ?></td>
              <!-- <td><?php echo $dados['orcamento'] ?></td> -->
              <!-- <td><?php echo $dados['data_cheg'] ?></td> -->
              <td> <img height="80" width="80" src="imgservicos/<?php echo $dados['foto'] ?>"> </td>
              <!-- <td><?php echo $dados['problemas'] ?></td> -->
              <!-- <td><?php echo $dados['tipo'] ?></td> -->
              <td><?php echo $dados['cliente'] ?></td>
              <td><?php echo $dados['stats'] ?></td>
              <td colspan="2" class="text-center">
                <a class='btn btn-info btn-sm' href='infservico.php?cod=<?php echo $dados['cod_aparelho'] ?>'>Mais informações</a>
                <!-- <a class='btn btn-info btn-sm' href='editaservico.php?cod=<?php echo $dados['cod_aparelho'] ?>'>Editar</a>
                <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados["cod_aparelho"] ?>")'>Excluir</a> -->
              </td>
            </tr>
          <?php } ?>
</div>
        </tbody>
      </table>
      
</body>

</html>