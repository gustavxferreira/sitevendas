<?php
require('../conexao.php');
include '../_admin/verificaSessaoAdm.php';
verificaSessaoAdm();
$prod_codigo = $_GET['prod_codigo'];
mysqli_query($conn, "select from tbl_produto where prod_codigo='$prod_codigo';");

?>

<?php


if (isset($_FILES['imagem'])) {
	$imagem = $_FILES['imagem'];
	if ($imagem['size'] > 2097152)
		die("Arquivo Muito Grande!! Max: 2MB");


	$pasta = "_prodImg/";

	$codigo = "SELECT * FROM tbl_produto";
	$tbl_produto_prod_codigo = $codigo;
	$imgnome = $imagem['name'];
	$imgunq = uniqid();
	$extensao = strtolower(pathinfo($imgnome, PATHINFO_EXTENSION));

	if ($extensao != "jpg" && $extensao != "png")
		die("Tipo de arquivo não aceito");
	$path = $pasta . $imgunq . "." . $extensao;
	$deu_certo = move_uploaded_file($imagem["tmp_name"], $path);
	if ($deu_certo) {

		$conn->query("INSERT INTO `tbl_imagem` (`img_cod`, `nome`, `tbl_produto_prod_codigo`, `path`) VALUES (NULL, '$imgnome','$prod_codigo', '$path')");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/styleadm.css">


</head>
p

<body>
	<div class="form">
		<form id="cadimg" method="POST" enctype="multipart/form-data" name="" action="">
			<label for=""> Selecione O arquivo</label>
			<input name="imagem" id="imagem" type="file">
			<button type="submit">Enviar</button>

		</form>
	</div>


</body>

</html>