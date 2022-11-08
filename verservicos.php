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
  <link rel="stylesheet" href="modelolistagem.css">

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

<?php
  include('menu.php'); ?>
 

  <div class="container">

  <h1>Aparelhos em conserto/consertados</h1><br>

  <table>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Modelo</th>
            <th>Foto</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?php echo $dados['modelo'] ?></td>
              <td> <img height="80" width="80" src="imgservicos/<?php echo $dados['foto'] ?>"> </td>
              <td><?php echo $dados['cliente'] ?></td>
              <td><?php echo $dados['stats'] ?></td>
              <td colspan="2" class="text-center">
                <a class='btn btn-info btn-sm' href='infservico.php?cod=<?php echo $dados['cod_aparelho'] ?>'>Mais informações</a>
              </td>
            </tr>
          <?php } ?>
</div>
        </tbody>
      </table>
      
</body>

</html>