<?php
include '../verificaSessao.php';
verificaSessao();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;

    }
  </style>
  <title></title>
</head>

<body>

  <div class="form">
    <form id="loginform" method='POST' name="f" action="cadUsuario.php">


      <label for="usu_login">Usuário</label>
      <input type="text" id="usu_login" name="usu_login" value="">


      <label for="usu_senha">Senha</label>
      <input type="password" id="usu_senha" name="usu_senha" value="">

      <input type="submit" value="Cadastrar">
    </form>


  </div>



</body>

</html>