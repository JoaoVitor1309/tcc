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
  
  <title>Listagem de clientes</title>
  <style>

    <?php
    include('conexao.php');
    $sql = "SELECT * FROM cliente";
    $query = mysqli_query($conn, $sql);
    ?>
  </style>
</head>

<body id="bod">

<?php
include('menu.php'); ?>

  <div class="container">

    <h1> Listagem de clientes</h1><br>


    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nome</th>                       
            <th>Telefone</th>               
            <th>Bairro</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?php echo $dados['nome'] ?></td>
              <td><?php echo $dados['telefone'] ?></td>
              <td><?php echo $dados['bairro'] ?></td>
              <td colspan="2" class="text-center">
                <a class='btn btn-info btn-sm' href='infcliente.php?cod=<?php echo $dados['cod'] ?>'>Mais informações</a>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>

    </div>




  </div>

</body>

</html>