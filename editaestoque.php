<html>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="modelolistagem.css">

  <title>Editar Peças</title>

</head>


<body id="bod">




<?php
include('menu.php');

if (isset($_GET['cod']))
  $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
  $codigo = $_POST['cod'];

if (isset($_POST['btnSalvar'])) {
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
  print_r($_FILES["fileToUpload"]);
  if ($_FILES["fileToUpload"]['tmp_name'] != "") {
    echo "entrou 1;";
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    //  Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      //  if everything is ok, try to upload file
    }
  }
  if ($uploadOk != 0) {
    echo "entrou 2;";

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "O arquivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado com sucesso.";
      $sql = "UPDATE peca SET 
                modelo='$modelo', 
                tipo='$tipo', 
                marca='$marca',
                foto='$new_name',
                dimensoes='$dimensoes', 
                valor='$valor', 
                quantidade='$quantidade' 
              WHERE cod_peca='$codigo'";

      mysqli_query($conn, $sql);

      if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Aparelho editado com sucesso.') </script>";
        header("Location: infpeca.php?cod=".$codigo);
      } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  echo "A: " . $_FILES["fileToUpload"]['tmp_name'];
  if ($_FILES["fileToUpload"]['tmp_name'] == "") {
    echo "entrou 3";

    $sql = "UPDATE peca SET
      modelo='$modelo', 
      tipo='$tipo', 
      marca='$marca',
      dimensoes='$dimensoes', 
      valor='$valor', 
      quantidade='$quantidade'
      WHERE cod_peca= '$codigo'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
      echo "<script> alert('Aparelho editado com sucesso.') </script>";
      header("Location: infpeca.php?cod=".$codigo);
    } else {
      echo "<script> alert('Ocorreu algum erro.') </script>";
    }
  }
}

$sql = "SELECT * FROM peca WHERE cod_peca='$codigo'";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
<!-- <?php include('menu.php'); ?> -->
<div class='container'>
  <h1 class='p-3'>Editar Peças</h1>

  <form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

    <input type="hidden" name="cod" value="<?php echo $codigo ?>">

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Modelo da peça" name="modelo" value="<?php echo $linha['modelo'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Tipo da peça" name="tipo" value="<?php echo $linha['tipo'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Marca da peça" name="marca" value="<?php echo $linha['marca'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Dimensões da peça" name="dimensoes" value="<?php echo $linha['dimensoes'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Valor da peça" name="valor" value="<?php echo $linha['valor'] ?>">
      </div>
      <div class="col">
        <input type="number" class="form-control" placeholder="Quantidade" name="quantidade" value="<?php echo $linha['quantidade'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="file" class="form-control" placeholder="Insira a foto" name="fileToUpload" value="<?php echo $linha['foto'] ?>">
      </div>
    </div><br><br>

    <div class="form-group">
      <input class='btn btn-success' type="submit" value="Salvar" name="btnSalvar" />
      <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>
  </form>
</div>
</body>

</html>