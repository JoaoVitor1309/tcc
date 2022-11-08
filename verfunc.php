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
  <link rel="stylesheet" href="modelolistagem.css">

  <title>Listagem de funcionários</title>
  <style>
  </style>

  <?php
  include('conexao.php');
  $sql = "SELECT * FROM funcionario";
  $query = mysqli_query($conn, $sql);
  ?>

</head>

<body id="bod">

<?php
include('menu.php'); ?>

  <div class="container">

  <h1>Listagem de funcionários</h1><br>
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
  </div>
</body>

</html>