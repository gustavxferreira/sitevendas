<?php
require('../../conexao.php');
$cid_codigo= $_GET['cid_codigo']; 
mysqli_query($conn, "delete from tbl_cidade where cid_codigo='$cid_codigo';");
header("location: cidades.php");
?>
