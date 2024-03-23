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
    <header>
    
        <nav class="botao">

            <ul>
                <li> <a href="cadastrarcategoria.php"> Cadastrar Categoria </a> </li>


            </ul>
        </nav>

    </header>
    
    <div class="aligntbl">
        <?php


        require('../../conexao.php');
        $sql = "select * from tbl_categoria";
        $resultado = mysqli_query($conn, $sql);

        echo "<table border='1' >";


        echo "<tr><td>Código</td><td>Descrição</td> <td> Excluir</td>";
        while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
            $cat_codigo = $linha_do_banco['cat_codigo'];
            $cat_descricao = $linha_do_banco['cat_descricao'];

            echo "<tr>";
            echo "<td>$cat_codigo</td>";
            echo "<td>$cat_descricao</td>";
            echo "<td>";
            echo "<a href='excluirCat.php?cat_codigo=$cat_codigo'>";
            echo "<img border='0' alt='remover' src='../_imgMenu/minus.png' width='25' height='25'>";
            echo "</td></tr>";
        }
        echo "</table>";


        ?>
   

    </div>


</body>

</html>