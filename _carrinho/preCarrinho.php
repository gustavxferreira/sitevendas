<?php
include '../verificaSessao.php';
verificaSessao();
require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <title>3G</title>
  <style>
   
  </style>
</head>


  <body>

    <?php

    $prod_codigo = $_GET['prod_codigo'];

    $sql = "SELECT tbl_produto.prod_codigo, prod_descricao, prod_valor, prod_quantidade, prod_obs, MIN(path) AS path
        FROM tbl_produto
        LEFT JOIN tbl_imagem ON tbl_produto.prod_codigo = tbl_imagem.tbl_produto_prod_codigo
        WHERE tbl_produto.prod_codigo = $prod_codigo
        GROUP BY tbl_produto.prod_codigo";
    $resultado = mysqli_query($conn, $sql);

    while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
      $imgpath = $linha_do_banco['path'];
      $prod_descricao = $linha_do_banco['prod_descricao'];
      $prod_valor = $linha_do_banco['prod_valor'];
      $prod_codigo = $linha_do_banco['prod_codigo'];
      $prod_obs = $linha_do_banco['prod_obs'];
    ?>
  
  <div class="containerprod">
    
     
        <figure id="imgpre">
          
         
          <img src=../_produtos/<?php echo $imgpath ?> alt="">
          
          </figure>
          <div id="precarrinho">
          <a href="../_produtos/listarProdutos.php">Continuar Comprando</a>
          <a href="listarCarrinho.php">Ir Para O Carrinho</a>
          <?php echo "<p> $prod_descricao  </p>" ?>
          <?php echo "<p> R$ $prod_valor</p>" ?>
          <?php echo "<p> Produto Adicionado Ao Carrinho</p>" ?>
          
          </div>
          </div>
    <?php

    }

    ?>

</div>






</body>

</html>