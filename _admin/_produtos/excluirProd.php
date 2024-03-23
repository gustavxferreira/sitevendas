<?php
require('../../conexao.php');
$prod_codigo = $_GET['prod_codigo']; 
mysqli_query($conn, "delete from tbl_imagem where tbl_produto_prod_codigo='$prod_codigo';");
mysqli_query($conn, "delete from tbl_produto where prod_codigo='$prod_codigo';");

header("location: produtos.php");
?>
