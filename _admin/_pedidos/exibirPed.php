<?php include '../verificaSessaoAdm.php';
verificaSessaoAdm();
$ped_codigo = $_GET['ped_codigo'];
?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../../style/styleadm.css">;

</head>

<body>
  <div class="aligntbl">
    <?php include '../../conexao.php';
    $query_pedido = "select * from tbl_pedido where ped_codigo = $ped_codigo";
    $resultado_pedido = mysqli_query($conn, $query_pedido);
  



    while ($linha_do_banco = mysqli_fetch_assoc($resultado_pedido)) {
      echo "<table border='1'>";

      echo "<tr> <td colspan='5'>Pedidos</td> </tr>";
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

 
    }




    ?>
  </div>
</body>


</html>