<?php
session_start();
include '../verificaSessao.php';
verificaSessao();
$logado = $_SESSION['usu_login'];
require '../conexao.php';

$cod = $_GET['prod_codigo'];
$data = date('y-m-d');

$sql_select_produto = "SELECT * FROM tbl_produto WHERE prod_codigo = $cod";
$resultado_select_produto = mysqli_query($conn, $sql_select_produto);

if(mysqli_num_rows($resultado_select_produto) > 0) {
    $linha_do_banco = mysqli_fetch_assoc($resultado_select_produto);
    $prod_descricao = $linha_do_banco['prod_descricao'];
    $prod_valor = $linha_do_banco['prod_valor'];
    $prod_codigo = $linha_do_banco['prod_codigo'];
    $prod_obs = $linha_do_banco['prod_obs'];
    $prod_quantidade = $linha_do_banco['prod_quantidade'];

    if ($prod_quantidade > 0) {
        $sessao = $_SESSION['usu_nome'];
        $quantidade = $prod_quantidade - 1;
        
     
        $sql_update_produto = "UPDATE tbl_produto SET prod_quantidade = $quantidade WHERE prod_codigo = $cod";
        mysqli_query($conn, $sql_update_produto);
        
       
        $sql_insert_carrinho = "INSERT INTO `tbl_carrinho` (`car_sessao`, `car_quantidade`, `car_valor`, `car_data`, `tbl_produto_prod_codigo`) VALUES ('$sessao', '1', '$prod_valor', '$data', '$cod')";
        mysqli_query($conn, $sql_insert_carrinho);

        header('Location: preCarrinho.php?prod_codigo=' . $cod);
    } else {
  
        echo '<script>alert("Quantidade insuficiente."); window.location.href = "../_produtos/exibirProd.php?prod_codigo=' . $cod . '";</script>';
    }
} else {
    
    header('Location: pagina_de_erro.php');
}
?>