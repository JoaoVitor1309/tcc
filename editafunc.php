<html>
<?php
include('conexao.php');

if (isset($_GET['cod']))
  $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
  $codigo = $_POST['cod'];

if (isset($_POST['btnSalvar'])) {
  $target_dir = "imgfunc/";
  $name = $_FILES['fileToUpload']['name'];
  $ext = strtolower(substr($name, -4)); //Pegando extensão do arquivo
  $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
  $target_file = $target_dir . $new_name;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $telefone = $_POST['telefone'];
  $cidade = $_POST['cidade'];
  $bairro = $_POST['bairro'];
  $rua =  $_POST['rua'];
  $num_casa = $_POST['num_casa'];
  $cargo = $_POST['cargo'];
  $data_nasc = $_POST['data_nasc'];
  $data_contratacao =  $_POST['data_contratacao'];
  $salario = $_POST['salario'];
  $foto = $target_file;


  if ($_FILES["fileToUpload"]['tmp_name'] != "") {
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
    echo "Sorry, only JPG, JPEG, PNG &s GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  }
  if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // echo "O arquivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado com sucesso.";
      $sql = "UPDATE funcionario SET 
                nome='$nome', 
                cpf='$cpf', 
                telefone='$telefone',
                foto='$new_name',
                cidade='$cidade', 
                bairro='$bairro', 
                rua='$rua',
                num_casa='$num_casa',
                cargo='$cargo', 
                data_nasc='$data_nasc', 
                data_contratacao='$data_contratacao',
                salario='$salario'
            WHERE cod_func='$codigo'";

      mysqli_query($conn, $sql);

      if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Aparelho editado com sucesso.') </script>";
        header("Location: inffunc.php?cod=".$codigo);
      } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  echo "A: " . $_FILES["fileToUpload"]['tmp_name'];
  if ($_FILES["fileToUpload"]['tmp_name'] == "") {
    $sql = "UPDATE funcionario SET 
                nome='$nome', 
                cpf='$cpf', 
                telefone='$telefone',
                cidade='$cidade', 
                bairro='$bairro', 
                rua='$rua',
                num_casa='$num_casa',
                cargo='$cargo', 
                data_nasc='$data_nasc', 
                data_contratacao='$data_contratacao',
                salario='$salario'
            WHERE cod_func='$codigo'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
      echo "<script> alert('Aparelho editado com sucesso.') </script>";
      header("Location: inffunc.php?cod=".$codigo);
    } else {
      echo "<script> alert('Ocorreu algum erro.') </script>";
    }
  }
}
$sql = "SELECT * FROM funcionario WHERE cod_func='$codigo'";
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
        <input type="text" class="form-control" placeholder="Nome Completo" name="nome" value="<?php echo $linha['nome'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Informe o CPF" name="cpf" value="<?php echo $linha['cpf'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Cargo" name="cargo" value="<?php echo $linha['cargo'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $linha['telefone'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Cidade" name="cidade" value="<?php echo $linha['cidade'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Bairro" name="bairro" value="<?php echo $linha['bairro'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Rua" name="rua" value="<?php echo $linha['rua'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Número da casa" name="num_casa" value="<?php echo $linha['num_casa'] ?>">
      </div>
    </div><br>

    <div class="row">
      <div class="col">
        <label for="data_contracao">Data da contratação</label>
        <input type="date" class="form-control" placeholder="Data de contratação" name="data_contratacao" value="<?php echo $linha['data_contratacao'] ?>">
      </div>
      <div class="col">
        <label for="data_nasc">Data de nascimento</label>
        <input type="date" class="form-control" placeholder="Data de nascimento" name="data_nasc" value="<?php echo $linha['data_nasc'] ?>">
      </div>
    </div><br><br>

    <div class="row">
      <div class="col">
        <input type="file" class="form-control" placeholder="Foto" name="fileToUpload" value="<?php echo $linha['foto'] ?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Salário" name="salario" value="<?php echo $linha['salario'] ?>">
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