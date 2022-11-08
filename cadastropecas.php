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

  <title>Cadastro peças</title>

  <style>

  </style>

  <?php
  include('menu.php');

  if (isset($_POST['btnEnviar'])) {
    $target_dir = "imgestoque/";
    $name = $_FILES['fileToUpload']['name'];

    $ext = strtolower(substr($name, -4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

    $target_file = $target_dir . $new_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $dimensoes = $_POST['dimensoes'];
    $valor = $_POST['valor'];
    $foto = $target_file;
    $quantidade = $_POST['quantidade'];

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
        $sql = "INSERT INTO peca (modelo, tipo, marca, dimensoes, valor, foto, quantidade) 
                VALUES ('$modelo', '$tipo', '$marca', '$dimensoes','$valor',  '$new_name', '$quantidade')";

        mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) > 0) {
          echo "<script> alert('Peça cadastrada com sucesso.') </script>";
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

  <h1>Cadastro de peças</h1><br>

  <div class="container">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">


      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Modelo da peça" name="modelo">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Tipo da peça" name="tipo">
        </div>
      </div><br><br>

      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Marca da peça" name="marca">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Dimensões da peça" name="dimensoes">
        </div>
      </div><br><br>

      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Valor da peça" name="valor">
        </div>
        <div class="col">
        <input type="number" class="form-control" placeholder="Quantidade" name="quantidade">
        </div>
      </div><br><br>

      <div class="row">
        <div class="col">
        <input type="file" class="form-control" placeholder="Insira a foto" name="fileToUpload">
        </div>
      </div><br><br>

      <div class="form-group">
        <input class='btn btn-success' type="submit" value="Enviar" name="btnEnviar" />
        <input class='btn btn-info' type="reset" value="Limpar campos" />

      </div>
    </form>



</body>

</html>