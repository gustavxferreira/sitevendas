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
  <nav class="botao">

    <ul>
      <li> <a href="cadastrarCidade.php"> Cadastrar Cidade </a> </li>
    </ul>
  </nav>

  <div class="aligntbl">
    <?php
    require('../../conexao.php');
    $sql = "select * from tbl_cidade";
    $resultado = mysqli_query($conn, $sql);

    echo "<table border='1'>";


    echo "<tr><td>Código</td><td>Cidade</td><td>UF</td> <td>Excluir</td>";
    while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
      $cid_codigo = $linha_do_banco['cid_codigo'];
      $cid_descricao = $linha_do_banco['cid_descricao'];
      $cid_uf = $linha_do_banco['cid_uf'];
      echo "<tr>";
      echo "<td>$cid_codigo</td>";
      echo "<td>$cid_descricao</td>";
      echo "<td>$cid_uf</td>";

      echo "<td>";
      echo "<a href='excluirCid.php?cid_codigo=$cid_codigo'>";
      echo "<img border='0' alt='remover' src='../_imgMenu/minus.png' width='25' height='25'>";
      echo "</td></tr>";
    }
    echo "</table>";

    ?>
  </div>
</body>

</html>