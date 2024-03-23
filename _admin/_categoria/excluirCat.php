<?php
require('../../conexao.php');
$cat_codigo= $_GET['cat_codigo']; 
mysqli_query($conn, "delete from tbl_categoria where cat_codigo='$cat_codigo';");
header("location: categoria.php");
?>
