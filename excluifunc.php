<?php

include('conexao.php');

$codigo = $_GET['cod'];

$sql = "DELETE FROM funcionario WHERE cod_func='$codigo'";

mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    header("Location: verfunc.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}