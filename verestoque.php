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
  <link rel="stylesheet" href="modelolistagem.css">
  
  <title>Listagem de estoque</title>
  <style>

  </style>

  <?php
  include('conexao.php');
  $sql = "SELECT * FROM peca";
  $query = mysqli_query($conn, $sql);
  ?>

</head>

<body id="bod">

<?php
include('menu.php'); ?>

  <div class="container">
    <h1>Listagem de estoque</h1><br>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th>Tipo</th>
          <th>Marca</th>
          <th>Foto</th>
          <th>Quantidade</th>
          <th>Ação</th>
        </tr>
        <?php while ($dados = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $dados['tipo'] ?></td>
            <td><?php echo $dados['marca'] ?></td>
            <td> <img height="80" width="80" src="imgestoque/<?php echo $dados['foto'] ?>"> </td>
            <td><?php echo $dados['quantidade'] ?></td>
            <td colspan="2" class="text-center">
                <a class='btn btn-info btn-sm' href='infpeca.php?cod=<?php echo $dados['cod_peca'] ?>'>Mais informações</a>
              </td>
          </tr>
        <?php } ?>

        </tbody>
      </table> 

    </div>
  </div>


</body>

</html>