<?php

include('conexao.php');

$codigo = $_GET['cod'];

$sql = "DELETE FROM cliente WHERE cod='$codigo'";

mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    header("Location: ver_clientes2.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}