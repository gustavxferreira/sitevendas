<?php
require('../../conexao.php');
$usu_codigo= $_GET['usu_codigo']; 
mysqli_query($conn, "delete from tbl_usuario where usu_codigo='$usu_codigo';");
header("location: usuarioAdm.php");
?>
