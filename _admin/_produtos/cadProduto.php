	<?php
	require '../../conexao.php';

	$prod_descricao = $_POST["prod_descricao"];
	$prod_valor = $_POST["prod_valor"];
	$prod_quantidade = $_POST["prod_quantidade"];
	$prod_tipo = $_POST["prod_tipo"];
	$tbl_categoria_cat_codigo = $_POST["categoria"];
	$prod_tipo = $_POST["prod_tipo"];
	$prod_obs = $_POST["prod_obs"];

	$sql = "INSERT INTO tbl_produto (prod_descricao, prod_valor, prod_quantidade, prod_tipo, tbl_categoria_cat_codigo, prod_obs) VALUES ('$prod_descricao', '$prod_valor', '$prod_quantidade', '$prod_tipo', '$tbl_categoria_cat_codigo', '$prod_obs')";
	mysqli_query($conn, $sql);
	header('Location: produtos.php');
	?>