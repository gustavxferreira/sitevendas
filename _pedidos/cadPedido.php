<?php

session_start();
$usu_codigo = $_SESSION['usu_codigo'];
$usu_login = $_SESSION['usu_login'];
date_default_timezone_set('America/Sao_Paulo');
require '../conexao.php';

$sql_codigo = "SELECT cli_codigo FROM tbl_cliente WHERE tbl_usuario_usu_codigo = ?";
$stmt = $conn->prepare($sql_codigo);
$stmt->bind_param("i", $usu_codigo);
$stmt->execute();
$resultado = $stmt->get_result();

while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
    $cli_codigo = $linha_do_banco['cli_codigo'];
}

$data = date('y-m-d');
$hora = date('H:i:s');
$frete = 9.90;
$pagto = $_POST["ped_formapagto"];
$total = $_POST["total"];
$frete = number_format($frete, 2, '.', '');
$status = "P";
$observacao = "Nula";

$sql_inserir_pedido = "INSERT INTO tbl_pedido (ped_data, ped_hora, ped_valortotal, ped_valorfrete, ped_status, ped_formapagto, ped_observacao, tbl_cliente_cli_codigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_inserir_pedido);
$stmt->bind_param("ssddsssi", $data, $hora, $total, $frete, $status, $pagto, $observacao, $cli_codigo);
$stmt->execute();
$stmt->close();

$sql_dados_carrinho_produtos = "SELECT ped_codigo, tbl_produto_prod_codigo, car_quantidade, car_valor FROM tbl_pedido, tbl_carrinho where car_sessao = ?";

$stmt = $conn->prepare($sql_dados_carrinho_produtos);
$stmt->bind_param("s", $usu_login);
$stmt->execute();
$resultado = $stmt->get_result();

$stmt_insert = $conn->prepare("INSERT INTO produtos_do_pedidos (tbl_pedido_ped_codigo, tbl_produto_prod_codigo, itens_quantidade, itens_valor) VALUES (?, ?, ?, ?)");

while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
    $tbl_pedido_ped_codigo = $linha_do_banco['ped_codigo'];
    $tbl_produto_prod_codigo = $linha_do_banco['tbl_produto_prod_codigo'];
    $car_quantidade = $linha_do_banco['car_quantidade'];
    $car_valor = $linha_do_banco['car_valor'];

    $stmt_insert->bind_param("ssdd", $tbl_pedido_ped_codigo, $tbl_produto_prod_codigo, $car_quantidade, $car_valor);
    $stmt_insert->execute();
}

$sql_delete_carrinho = "DELETE FROM tbl_carrinho WHERE car_sessao = ?";
$stmt = $conn->prepare($sql_delete_carrinho);
$stmt->bind_param("s", $usu_login);
$stmt->execute();
echo "<script>alert('Pedido finalizado!'); window.location.href = '../_clientes/clienteInfo.php';</script>";
$stmt->close();
$conn->close();
