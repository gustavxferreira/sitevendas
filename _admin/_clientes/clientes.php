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


  
    $query_cliente = "select * from tbl_cliente ";

    $resultado_cliente = mysqli_query($conn, $query_cliente);
    $indice = 1;
    echo "<table border='1'>";
     
    echo "<tr> <td colspan='5'>Clientes </td>  </tr> ";
    echo "<tr>  <td colspan='1'>Cliente</td><td colspan='1'>Nome Cliente </td> </td><td colspan='1'>Codigo Cliente </td> </tr>  ";
    while ($linha_do_banco = mysqli_fetch_assoc($resultado_cliente)) {
      
      
      $cli_codigo = $linha_do_banco['cli_codigo'];
      $cli_nome = $linha_do_banco['cli_nome'];
      
      echo "<tr>";
     
      echo "<td><a href='exibirCliente.php?cli_codigo=$cli_codigo'>Ver</a></td>";
      echo " <td> $cli_nome</td>";
      echo " <td> $cli_codigo</td>";
      
    }
    echo "</table>";
    ?>
  </div>
</body>

</html>