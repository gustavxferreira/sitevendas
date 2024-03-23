<?php include '../verificaSessao.php';
verificaSessao();
$ped_codigo = $_GET['ped_codigo'];
?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style/style.css">;

</head>

<body>
  <div class="aligntbl">
    <?php include '../conexao.php';
    $indice = 1;
    $query_prod_ped = "SELECT pdp.itens_valor, pdp.itens_quantidade, pdp.tbl_pedido_ped_codigo, pdp.tbl_produto_prod_codigo, p.prod_descricao 
FROM produtos_do_pedidos pdp
INNER JOIN tbl_produto p ON pdp.tbl_produto_prod_codigo = p.prod_codigo
WHERE pdp.tbl_pedido_ped_codigo = $ped_codigo";

    $resultado_prod_ped = mysqli_query($conn, $query_prod_ped);

    while ($linha_do_banco = mysqli_fetch_assoc($resultado_prod_ped)) {

      echo "<table border='1'>";
      echo "<tr> <td colspan='5'>Produto $indice</td> </tr>";
      $prod_descricao = $linha_do_banco['prod_descricao'];
      $itens_quantidade = number_format($linha_do_banco['itens_quantidade'], 0, ',', '.');
      $itens_valor = $linha_do_banco['itens_valor'];

      echo "<tr> <td colspan='4'>Nome</td>  <td> $prod_descricao</td></tr>";
      echo "<tr> <td colspan='4'>Quantidade</td>  <td> $itens_quantidade</td></tr>";
      echo "<tr> <td colspan='4'>Valor</td>  <td> $itens_valor</td></tr>";

      $indice++;
    }




    ?>
  </div>
</body>
<footer><?php include '../_include/rodape.php' ?></footer>

</html>