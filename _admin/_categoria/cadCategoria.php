<?php 
require '../../conexao.php';
$cat_descricao = $_POST["cat_descricao"]; 
$sql = "INSERT INTO tbl_categoria (cat_descricao) VALUES ('$cat_descricao')";
mysqli_query($conn, $sql);    
header('Location: categoria.php');
?>
