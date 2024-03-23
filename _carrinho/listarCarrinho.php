<?php
include '../verificaSessao.php';
verificaSessao();
require('../conexao.php');

$logado = $_SESSION['usu_login'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>3G</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script>
        function atualizarQuantidades(carId) {
            var form = document.getElementById('form-atualizar-quantidade-' + carId);
            form.submit();
        }
    </script>
</head>

<body>
    <div class="aligntbl">
        <?php
        $sql = "SELECT prod_codigo, tbl_produto_prod_codigo, car_id, prod_descricao, car_quantidade, car_valor, prod_valor, car_sessao FROM tbl_carrinho, tbl_produto WHERE car_sessao = '$logado' AND tbl_produto_prod_codigo = prod_codigo ";
        $resultado = mysqli_query($conn, $sql);
        $prod_total = 0;

        echo "<table border='1' >";
        echo "<tr><td>Descricao</td><td>Quantidade</td><td> Valor</td> <td>Total</td>  <td>Atualizar</td> <td>Excluir</td></tr>";
        while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
            $prod_codigo = $linha_do_banco['prod_codigo'];
            $tbl_produto_prod_codigo = $linha_do_banco['tbl_produto_prod_codigo'];
            $car_id = $linha_do_banco['car_id'];
            $prod_descricao = $linha_do_banco['prod_descricao'];
            $car_quantidade = $linha_do_banco['car_quantidade'];
            $car_valor = $linha_do_banco['car_valor'];
            $prod_valor = $linha_do_banco['prod_valor'];
            $prod_total += $car_valor * $car_quantidade;

            $total = number_format($prod_valor * $car_quantidade, 2);

            echo "<tr>";
            echo "<td>$prod_descricao </td>";
            echo "<td><form id='form-atualizar-quantidade-$car_id' method='POST' action='alterarQuantidade.php'><input type='hidden' name='car_id' value='$car_id'><input type='number' name='nova_quantidade' value='$car_quantidade' data-id='$car_id'></form></td>";
            echo "<td>R$ $prod_valor </td>";
            echo "<td>R$ $total  </td>";
            echo "<td><a href='#' onclick='atualizarQuantidades($car_id);'>Atualizar</a></td>";
            echo "<td colspan='1'>";
            echo "<a href='excluirCarrinho.php?prod_codigo=$tbl_produto_prod_codigo&car_id=$car_id'>";
            echo "<img border='0' alt='remover' src='../_admin/_imgMenu/minus.png' width='25' height='25'>";
            echo "</td></tr>";
        }
        echo "<td colspan='3'><a href='../_clientes/clienteForm.php?prod_total=" . number_format($prod_total, 2, '.', '') . "'>Prosseguir</a></td>";

        echo "<td colspan='3'> <p>Total Do carrinho: R$ " . number_format($prod_total, 2) . "</p> </td>";
        echo "</table>\n";
        ?>

    </div>

</body>
<footer><?php include '../_include/rodape.php'; ?></footer>

</html>