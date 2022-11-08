<html>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="modelolistagem.css">

  <title>Editar Cliente</title>

</head>

<body id="bod">


<?php 
include('menu.php');

if (isset($_GET['cod']))
    $codigo = $_GET['cod'];
elseif (isset($_POST['cod']))
    $codigo = $_POST['cod'];

if (isset($_POST['btnSalvar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $obs = $_POST['obs'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $num_casa = $_POST['num_casa'];

    $sql = "UPDATE cliente SET 
                nome='$nome', 
                cpf='$cpf', 
                obs='$obs',
                cnpj='$cnpj',
                telefone='$telefone', 
                sexo='$sexo', 
                cidade='$cidade',   
                bairro='$bairro',
                rua='$rua',
                num_casa='$num_casa'
            WHERE cod='$codigo'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Aparelho editado com sucesso.') </script>";
        header("Location: infcliente.php?cod=".$codigo);
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
$sql = "SELECT * FROM cliente WHERE cod='$codigo'";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
<!-- <?php include('menu.php'); ?> -->
<div class='container'>
    <h1 class='p-3'>Editar usuário</h1>

    <form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

        <input type="hidden" name="cod" value="<?php echo $codigo ?>">

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome completo" name="nome" value="<?php echo $linha['nome'] ?>" />
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Informe o CPF" name="cpf" value="<?php echo $linha['cpf'] ?>" />
            </div>
        </div><br><br>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Observação" name="obs" value="<?php echo $linha['obs'] ?>" />
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Informe o CNPJ" name="cnpj" value="<?php echo $linha['cnpj'] ?>" />
            </div>
        </div><br><br>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Sexo(M ou F)" name="sexo" value="<?php echo $linha['sexo'] ?>" />
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $linha['telefone'] ?>" />
            </div>
        </div><br><br>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Cidade" name="cidade" value="<?php echo $linha['cidade'] ?>" />
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Bairro" name="bairro" value="<?php echo $linha['bairro'] ?>" />
            </div>
        </div><br><br>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Rua" name="rua" value="<?php echo $linha['rua'] ?>" />
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Número da casa" name="num_casa" value="<?php echo $linha['num_casa'] ?>" />
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