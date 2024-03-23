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

</head>

<body>
  
  <div class="aligncenter">
  <div class="form">
    <form id="cadprod" method='POST' name="f" action="cadCidade.php">

      <select name="cid_uf" required id="cid_uf">
        <?php

        $tipo1 = '';
        $tipo2 = '';
        $tipo3 = '';
        $tipo4 = '';

        switch ('cid_uf') {
          case 'SP':
            $tipo1 = 'selected';
            break;
          case 'RJ':
            $tipo2 = 'selected';
            break;
          case 'MG':
            $tipo3 = 'selected';
            break;
          case 'ES':
            $tipo4 = 'selected';
            break;
        }
        ?>
        <option value="">Selecione O UF</option>
        <option value="SP" <?php echo $tipo1; ?>>SP</option>
        <option value="RJ" <?php echo $tipo2; ?>>RJ </option>
        <option value="MG" <?php echo $tipo3; ?>>MG</option>
        <option value="ES" <?php echo $tipo4; ?>>ES</option>

        <br>
      </select>
      <br><br>

      <label for="cid_descricao">Nome Cidade</label><br>
      <input type="text" id="cid_descricao" name="cid_descricao" value=""><br><br>

      <input type="submit" value="Enviar">
  </div>
  </form>
  </div>

</body>

</html>