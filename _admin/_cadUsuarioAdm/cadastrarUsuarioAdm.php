<?php 
include '../verificaSessaoAdm.php';
verificaSessaoAdm();


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../style/styleadm.css">

  <title></title> 
</head>
<body>


<br>
<div class="form">
<form id="cadprod"method='POST' name="f" action="cadUsuarioAdm.php">
  
    <label for="usu_login">Login</label><br>
 	<input type="text" id="usu_login" name="usu_login" value="">


  <label for="usu_senha">Senha</label><br>
  <input type="password" id="usu_senha" name="usu_senha" value="">
  

  


      <select name="usu_nivel" id="categoria">
         <option value=1>Administrador </option>
         <option value=2>Leitor</option>
        
      </select>
      <span style="display: none;">
         <input type="text" />
         <button type="button">x</button>
      </span>
   






<br><br>
  <input type="submit" value="Enviar">
</form> 


</div>



</body>
</html>

