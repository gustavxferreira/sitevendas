<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>	
</head>
<body>

<?php 
require '../../conexao.php';
$usu_usuario = $_POST["usu_login"];
$usu_nome = $usu_usuario;
$usu_senha = $_POST["usu_senha"];
$usu_nivel = $_POST["usu_nivel"];






$sql = "INSERT INTO tbl_usuario (usu_nome, usu_login, usu_senha, usu_nivel) VALUES ('$usu_usuario', '$usu_usuario', '$usu_senha', '$usu_nivel')";
mysqli_query($conn, $sql);    




header('Location: usuarioAdm.php');


?>




</body>
</html>