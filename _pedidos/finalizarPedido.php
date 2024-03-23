<?php
include '../verificaSessao.php';
verificaSessao();
require('../conexao.php');
$prod_total = $_GET['prod_total'];

if ($prod_total > 20) {


?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <style type="text/css">





    </style>
  </head>

  <body>


    <h2 style="text-align: center;">Finalizar pedido</h2>
    <form action="cadPedido.php?$total" method="POST">
      <div class="aligncenter">
        <section id="pedidoinfo">
          <p>Seu pedido deu o total de R$<?php echo $prod_total ?></p>

          <select name="ped_formapagto" id="ped_formapagto">
            <option value='B'>Boleto</option>
            <option value='P'>Pix</option>
          </select>
          <input type="hidden" name="total" value="<?php echo $prod_total ?>">
          <input type="submit" value="Finalizar pedido">
        </section>
      </div>
    </form>
  </body>

  </html>
<?php
} else {
  echo "<script>alert('Valor do carrinho R$ 20 no mínimo!'); window.location.href = '../_produtos/listarProdutos.php';</script>";
}

?>