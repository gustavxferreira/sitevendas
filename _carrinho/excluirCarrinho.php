<?php

require '../conexao.php';

$cod = $_GET['prod_codigo'];
$car_id = $_GET['car_id'];
$sql2 = "select * from tbl_produto where prod_codigo=$cod";

$resultado2 = mysqli_query($conn, $sql2);
$quantidade = 0;
while ($linha_do_banco = mysqli_fetch_assoc($resultado2)) {
   $prod_quantidade = $linha_do_banco['prod_quantidade']

?>

<?php
}

$quantidade = $prod_quantidade + 1;

$sql2 = "UPDATE tbl_produto SET prod_quantidade = $quantidade WHERE prod_codigo = $cod";
mysqli_query($conn, "delete from tbl_carrinho where car_id=$car_id");

mysqli_query($conn, $sql2);

header("location: listarCarrinho.php");
?>

