<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <?php
  include('../verificaSessao.php');
  verificaSessao();

  ?>

</head>

<body>

  <div class="form">

    <form id="loginform" method='POST' name="f" action="loginValida.php">
      <label for="usu_login">Usuário</label>
      <input type="text" id="usu_login" name="usu_login" value="">


      <form method='POST' name="f" action="loginValida.php">
        <label for="usu_senha">Senha</label>
        <input type="password" id="usu_senha" name="usu_senha" value="">

        <input type="submit" value="Login">
        <a href="../_usuario/cadastroUsuario.php">Cadastre-se</a>
  </div>
  </form>
</body>
<footer><?php include '../_include/rodape.php'; ?></footer>

</html>