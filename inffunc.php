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
  <title>Funcionários Cadastrados</title>
  <style>
    table,
    th,
    td {
      text-align: center;
      position: relative;
    }

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
      color: black;


    }

    th {
      color: white;
    }

    td {
      color: white;
    }
  </style>

  <?php
  include('menu.php');

  if (isset($_GET['cod']))
  $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
  $codigo = $_POST['cod'];

  $sql = "SELECT * FROM funcionario WHERE cod_func='$codigo'";
  $rs = mysqli_query($conn, $sql);
  ?>

</head>

<body id="bod">

  


  <div class="container">

  <h1>Funcionários Cadastrados</h1><br>

  <table>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Telefone</th>
          <th>Cidade</th>
          <th>Bairro</th>
          <th>Rua</th>
          <th>Número da casa</th>
          <th>Cargo</th>
          <th>Nascimento</th>
          <th>Contratação</th>
          <th>Foto</th>
          <th>Salário</th>
          <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($rs)) { ?>
            <tr>
            <td><?php echo $dados['nome'] ?></td>
            <td><?php echo $dados['cpf'] ?></td>
            <td><?php echo $dados['telefone'] ?></td>
            <td><?php echo $dados['cidade'] ?></td>
            <td><?php echo $dados['bairro'] ?></td>
            <td><?php echo $dados['rua'] ?></td>
            <td><?php echo $dados['num_casa'] ?></td>
            <td><?php echo $dados['cargo'] ?></td>
            <td><?php echo $dados['data_nasc'] ?></td>
            <td><?php echo $dados['data_contratacao'] ?></td>
            <td> <img height="80" width="80" src="imgfunc/<?php echo $dados['foto'] ?>"> </td>
            <td><?php echo $dados['salario'] ?></td>
              <td colspan="2" class="text-center">
               
                <a class='btn btn-info btn-sm' href='editafunc.php?cod=<?php echo $dados['cod_func'] ?>'>Editar</a>
                <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados["cod_func"] ?>")'>Excluir</a>
              </td>
            </tr>
          <?php } ?>
</div>
        </tbody>
      </table>
      <script>
        function confirmar(cod) {
          if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluifunc.php?cod=' + cod;
        }
      </script>
</body>

</html>