<?php include '../verificaSessao.php';
verificaSessao();
$usu_codigo = $_SESSION['usu_codigo'];
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style/style.css">;
  <title></title>
</head>

<body>
  <div class="aligntbl">
    <?php
    include '../conexao.php';
    $query_cli_codigo = "select cli_codigo, tbl_cidade_cid_codigo from tbl_cliente where tbl_usuario_usu_codigo = $usu_codigo";

    $resultado_cli_codigo = mysqli_query($conn, $query_cli_codigo);

    if ($resultado_cli_codigo) {
      $linha_do_banco = mysqli_fetch_assoc($resultado_cli_codigo);
      $cli_codigo = $linha_do_banco['cli_codigo'];
      $tbl_cidade_cidade_cid_codigo = $linha_do_banco['tbl_cidade_cid_codigo'];
    }

    $query_pedido = "select * from tbl_pedido where tbl_cliente_cli_codigo = $cli_codigo";
    $resultado_pedido = mysqli_query($conn, $query_pedido);
    $indice = 1;



    while ($linha_do_banco = mysqli_fetch_assoc($resultado_pedido)) {
      echo "<table border='1'>";

      echo "<tr> <td colspan='5'>Pedidos $indice</td> </tr>";
      $ped_codigo = $linha_do_banco['ped_codigo'];
      $ped_data = $linha_do_banco['ped_data'];
      $ped_hora = $linha_do_banco['ped_hora'];
      $ped_valortotal = $linha_do_banco['ped_valortotal'];
      $ped_status = $linha_do_banco['ped_status'];
      $ped_formapagto = $linha_do_banco['ped_formapagto'];
      $tbl_cliente_cli_codigo = $linha_do_banco['tbl_cliente_cli_codigo'];

      echo "<tr> <td colspan='4'>Data Pedido</td>  <td> $ped_data</td></tr>";
      echo "<tr> <td colspan='4'>Hora Do Pedido</td>  <td> $ped_hora</td></tr>";
      echo "<tr> <td colspan='4'>Status Pedido</td>  <td> $ped_status</td></tr>";
      echo "<tr> <td colspan='4'>Forma de Pagamento</td>  <td> $ped_formapagto</td></tr>";
      echo "<tr> <td colspan='4'>Valor Total</td>  <td> $ped_valortotal</td></tr>";

      echo "<tr> <td colspan='5'> <a href='exibirProdPed.php?ped_codigo=$ped_codigo'>Produtos Do Pedido</a></td>  </tr>";
      echo "</table>";

      $indice++;
    }





    ?>





  </div>
</body>
<footer><?php include '../_include/rodape.php' ?></footer>

</html>