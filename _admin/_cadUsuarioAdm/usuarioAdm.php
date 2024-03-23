<?php 
include '../verificaSessaoAdm.php';
verificaSessaoAdm();
include '../../conexao.php'

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="../../style/styleadm.css">

  
   

</head>
<body>
<header>
<nav class="botao">




</nav>
</header>
<div class="aligntbl">
<?php 





 $sql = "select * from tbl_usuario";
 $resultado = mysqli_query($conn, $sql);   
    
    echo "<table border='1'>";
    

    echo "<tr><td>Codigo</td><td>Nome</td> <td>Login</td> <td> Senha</td> <td>Nivel</td> <td>Excluir</td> ";
    while ($linha_do_banco = mysqli_fetch_assoc($resultado))      
    {   
        $usu_codigo = $linha_do_banco['usu_codigo'];      
        $usu_nome = $linha_do_banco['usu_nome'];      
        $usu_login = $linha_do_banco['usu_login'];            
        $usu_senha = $linha_do_banco['usu_senha']; 
        $usu_nivel = $linha_do_banco['usu_nivel']; 


        
        echo "<tr>"; 
        echo "<td>$usu_codigo</td>"; 
        echo "<td>$usu_nome</td>";  
        echo "<td>$usu_login</td>"; 
        echo "<td>$usu_senha</td>"; 
        echo "<td>$usu_nivel</td>"; 
       
        echo "<td>";
        echo "<a href='excluirUsuarioAdm.php?usu_codigo=$usu_codigo'>";
        echo "<img border='0' alt='remover' src='../_imgMenu/minus.png' width='25' height='25'>";        
        echo "</td></tr>";
        
        

    }
echo "</table>";


?>

</div>


</body>
</html>