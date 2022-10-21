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
  <title>Cadastrar aparelho</title>


  <style>
    #bod {
      background-color: black;
    }

    #formu {
      position: absolute;
      padding-left: 46%;
      /*left:32%;
            top:20%;*/
      display: inline-block;
      font-size: 25px;
    }

    #botao {
      text-align: center;
    }

    h1 {
      text-align: center;
      color: white;
    }

    .dropdown {

      justify-content: center;
      right: 21%;
    }

    h4 {

      justify-content: center;
      width: 800px;
      
    }
  </style>

  <?php
  include('conexao.php');

  if (isset($_POST['btnEnviar'])) {
    $target_dir = "imgservicos/";
    // $target_file = $_POST['fileToUpload'];
    // print_r($_FILES);
    $name = $_FILES['fileToUpload']['name'];

    $ext = strtolower(substr($name, -4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

    $target_file = $target_dir . $new_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $modelo = $_POST['modelo'];
    $orcamento = $_POST['orcamento'];
    $data_cheg = $_POST['data_cheg'];
    $foto = $target_file;
    $tipo = $_POST['tipo'];
    $problemas = $_POST['problemas'];
    $cliente = $_POST['cliente'];
    $stats = $_POST['stats'];

    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    //  if ($_FILES["fileToUpload"]["size"] > 500000) {
    //    echo "Sorry, your file is too large.";
    //   $uploadOk = 0;
    // }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      // echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "O arquivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado com sucesso.";

        // echo " $target_file";
        $sql = "INSERT INTO aparelho (modelo, orcamento, data_cheg, foto, tipo, problemas, cliente, stats) 
            VALUES ('$modelo', '$orcamento', '$data_cheg', '$new_name', '$tipo', '$problemas','$cliente', '$stats')";

        mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
          echo "<script> alert('Aparelho cadastrado com sucesso.')  </script>";
        } else {
          echo "<script> alert('Ocorreu algum erro.') </script>";
        }
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
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

  <h1>Cadastrar aparelho</h1><br>

  <form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">


    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Modelo" name="modelo">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Orçamento" name="orcamento">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="date" class="form-control" placeholder="Data de chegada" name="data_cheg">
      </div>
      <div class="col">
        <input type="file" class="form-control" placeholder="Foto" name="fileToUpload">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Tipo" name="tipo">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Problemas" name="problemas">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Cliente" name="cliente">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Status" name="stats">
      </div>
    </div><br><br>

    <div class="form-group">
      <input class='btn btn-success' type="submit" value="Enviar" name="btnEnviar" />
      <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>





</body>

</html>