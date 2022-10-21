<html>
<?php
include('conexao.php');

if (isset($_GET['cod']))
  $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
  $codigo = $_POST['cod'];

if (isset($_POST['btnSalvar'])) {
  $target_dir = "imgservicos/";
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

      $sql = "UPDATE aparelho SET 
                modelo='$modelo', 
                orcamento='$orcamento', 
                data_cheg='$data_cheg',
                foto='$new_name',
                tipo='$tipo', 
                problemas='$problemas', 
                cliente='$cliente',
                stats='$stats' 
            WHERE cod_aparelho='$codigo'";

      mysqli_query($conn, $sql);

      if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Aparelho editado com sucesso.') </script>";
        header("Location: verservicos.php");
      } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
$sql = "SELECT * FROM aparelho WHERE cod_aparelho='$codigo'";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
<!-- <?php include('menu.php'); ?> -->
<div class='container'>
  <h3 class='p-3'>Cadastrar usuário</h3>

  <form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

    <input type="hidden" name="cod" value="<?php echo $codigo ?>">

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Modelo" name="modelo" value="<?php echo $linha['modelo'] ?>" />
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Orçamento" name="orcamento" value="<?php echo $linha['orcamento'] ?>" />
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="date" class="form-control" placeholder="Data de chegada" name="data_cheg" value="<?php echo $linha['data_cheg'] ?>" />
      </div>
      <div class="col">
        <input type="file" class="form-control" placeholder="Foto" name="fileToUpload" value="<?php echo $linha['foto'] ?>" />
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Tipo" name="tipo" value="<?php echo $linha['tipo'] ?>" />
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Problemas" name="problemas" value="<?php echo $linha['problemas'] ?>" />
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Cliente" name="cliente" value="<?php echo $linha['cliente'] ?>" />
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Status" name="stats" value="<?php echo $linha['stats'] ?>" />
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