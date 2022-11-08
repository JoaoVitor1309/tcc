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
  <title>Servicos Cadastrados</title>
  

  <?php
  include('conexao.php');

  if (isset($_GET['cod']))
  $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
  $codigo = $_POST['cod'];

  $sql = "SELECT * FROM aparelho WHERE cod_aparelho='$codigo'";
  $rs = mysqli_query($conn, $sql);
  ?>

</head>

<body id="bod">

<?php
  include('menu.php'); ?>

  <div class="container">

  <h1>Informações do Serviço</h1><br>

  <input type="hidden" name="cod" value="<?php echo $codigo ?>">


  <table>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Modelo</th>
            <th>Orçamento</th>
            <th>Chegada</th>
            <th>Foto</th>
            <th>Problemas</th>
            <th>Tipo</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($rs)) { ?>
            <tr>
              <td><?php echo $dados['modelo'] ?></td>
              <td><?php echo $dados['orcamento'] ?></td>
              <td><?php echo $dados['data_cheg'] ?></td>
              <td> <img height="80" width="80" src="imgservicos/<?php echo $dados['foto'] ?>"> </td>
              <td><?php echo $dados['problemas'] ?></td>
              <td><?php echo $dados['tipo'] ?></td>
              <td><?php echo $dados['cliente'] ?></td>
              <td><?php echo $dados['stats'] ?></td>
              <td colspan="2" class="text-center">
               
                <a class='btn btn-info btn-sm' href='editaservico.php?cod=<?php echo $dados['cod_aparelho'] ?>'>Editar</a>
                <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados["cod_aparelho"] ?>")'>Excluir</a>
              </td>
            </tr>
          <?php } ?>
</div>
        </tbody>
      </table>
      <script>
        function confirmar(cod) {
          if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiservico.php?cod=' + cod;
        }
      </script>
</body>

</html>