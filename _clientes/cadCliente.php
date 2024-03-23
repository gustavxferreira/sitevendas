<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>

	<?php

	require '../conexao.php';
	include '../verificaSessao.php';
	verificaSessao();
	include '../_include/execBind.php';



	$cli_nome = $_POST["cli_nome"];
	$cli_endereco = $_POST["cli_endereco"];
	$cli_numero = $_POST["cli_numero"];
	$cli_complemento = $_POST["cli_complemento"];
	$cli_bairro = $_POST["cli_bairro"];
	$cli_cep = $_POST["cli_cep"];
	$cli_fonecel = $_POST["cli_fonecel"];
	$cli_cpf = $_POST["cli_cpf"];
	$cli_rg = $_POST["cli_rg"];
	$cli_datanasc = $_POST["cli_datanasc"];
	$cli_email = $_POST["cli_email"];
	$cidade = $_POST["cidade"];
	$usu_codigo	= $_POST["usu_codigo"];
	$prod_total	= $_POST["prod_total"];

	$sql_inserir = "INSERT INTO tbl_cliente (cli_nome, cli_endereco, cli_numero, cli_complemento, cli_bairro, cli_cep, cli_fonecel, cli_cpf, cli_rg, cli_datanasc, cli_email, tbl_cidade_cid_codigo, tbl_usuario_usu_codigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql_inserir);

	if ($stmt === false) {
		die('Erro na preparação da consulta: ' . $conn->error);
	}


	$stmt->bind_param("ssssssssssssi", $cli_nome, $cli_endereco, $cli_numero, $cli_complemento, $cli_bairro, $cli_cep, $cli_fonecel, $cli_cpf, $cli_rg, $cli_datanasc, $cli_email, $cidade, $usu_codigo);

	$resultado = $stmt->execute();

	if ($resultado === false) {
		die('Erro na execução da consulta: ' . $stmt->error);
	}

	$stmt->close();

	header("Location: ../_pedidos/finalizarPedido.php?prod_total=$prod_total");
	exit;

	?>

</body>

</html>