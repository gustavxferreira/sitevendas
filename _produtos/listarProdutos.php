<?php
include '../verificaSessao.php';
verificaSessao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <title>3G</title>
</head>

<body>
  <?php
  require('../conexao.php');
  $sql = "SELECT tbl_produto.prod_codigo, prod_descricao, prod_valor, prod_obs, MIN(path) AS path
FROM tbl_produto
LEFT JOIN tbl_imagem ON tbl_produto.prod_codigo = tbl_imagem.tbl_produto_prod_codigo
GROUP BY tbl_produto.prod_codigo";
  $resultado = mysqli_query($conn, $sql);

  while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
    $imgpath = $linha_do_banco['path'];
    $prod_descricao = $linha_do_banco['prod_descricao'];
    $prod_valor = $linha_do_banco['prod_valor'];
    $prod_codigo = $linha_do_banco['prod_codigo'];
  ?>
    <div id="container">
      <div id="img">

        <img src=<?php echo $imgpath ?> width="128" height="128" alt="">
        <br>
        <h2><?php echo $prod_descricao; ?></h2>
        <br>
        <h3>R$ <?php echo  $prod_valor; ?> </h3> <br>
        <h3> <?php echo "<a href='exibirProd.php?prod_codigo=$prod_codigo'>Comprar</a>"; ?></h3>
      </div>
    </div>
  <?php
  }

  ?>

  <?php include '../_include/rodape.php'; ?>
</body>

</html>