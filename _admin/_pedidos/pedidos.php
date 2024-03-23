<?php
include '../verificaSessaoAdm.php';
verificaSessaoAdm();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../style/styleadm.css">
</head>

<body>

  <div class="aligntbl">
    <?php
    require('../../conexao.php');
    echo "<table border='1'>";


  
    $query_pedido = 
    "SELECT 
    p.*, c.*
    FROM 
    tbl_pedido p
    INNER JOIN 
    tbl_cliente c ON p.tbl_cliente_cli_codigo = c.cli_codigo";
    $resultado_pedido = mysqli_query($conn, $query_pedido);
    $indice = 1;
    echo "<table border='1'>";
     
    echo "<tr> <td colspan='5'>Pedidos em aberto </td> </tr>";
    echo "<tr> <td colspan='1'>Pedido</td> <td colspan='1'>Codigo Pedido </td><td colspan='1'>Nome Cliente </td> <td colspan='1'>Codigo Cliente </td> </tr>";
    while ($linha_do_banco = mysqli_fetch_assoc($resultado_pedido)) {
      
      $ped_codigo = $linha_do_banco['ped_codigo'];
      $tbl_cliente_cli_codigo = $linha_do_banco['tbl_cliente_cli_codigo'];
      $cli_nome = $linha_do_banco['cli_nome'];
      
      echo "<tr>";
      echo "<td> <a href='exibirPed.php?ped_codigo=$ped_codigo'>Ver Pedido </a> </td>";
      echo " <td> $ped_codigo</td>";
      echo " <td> $cli_nome</td>";
      echo " <td> $tbl_cliente_cli_codigo</td>";
      

      
      

      $indice++;
    }
    echo "</table>";
    ?>
  </div>
</body>

</html>