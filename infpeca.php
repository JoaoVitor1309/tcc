<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="modelolistagem.css">
  <title>Aparelhos para conserto</title>


  <?php
  include('conexao.php');

  if (isset($_GET['cod']))
  $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
  $codigo = $_POST['cod'];

  $sql = "SELECT * FROM peca WHERE cod_peca='$codigo'";
  $rs = mysqli_query($conn, $sql);
  ?>

</head>

<body id="bod">

<?php
  include('menu.php'); ?>

  <div class="container">

  <h1>Informações do Aparelho</h1><br>

  <table>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
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
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($rs)) { ?>
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
</div>
        </tbody>
      </table>
      <script>
        function confirmar(cod) {
          if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluipeca.php?cod=' + cod;
        }
      </script>
</body>

</html>