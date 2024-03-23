<?php
include '../verificaSessaoAdm.php';
verificaSessaoAdm();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../style/styleadm.css">
<br>
</head>

<body>

  <div class="form">

    <form id="cadprod" method='POST' name="f" action="cadCategoria.php">
    <br><br><label for="cat_descricao">Descrição Da Categoria</label>
      <input type="text" id="cat_descricao" name="cat_descricao" value="">
      <input type="submit" value="Enviar">
  </div>
  </form>

</body>

</html>