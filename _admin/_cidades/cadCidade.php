<?php 
require '../../conexao.php';
$cid_descricao = $_POST["cid_descricao"]; 
$cid_uf = $_POST["cid_uf"];

$sql = "INSERT INTO tbl_cidade (cid_descricao, cid_uf) VALUES ('$cid_descricao', '$cid_uf')";
mysqli_query($conn, $sql);    
echo "Ação realizada";
header('Location: cidades.php');
?>

