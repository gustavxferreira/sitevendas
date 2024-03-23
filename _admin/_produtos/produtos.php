<?php
include '../verificaSessaoAdm.php';
verificaSessaoAdm();
$logado = $_SESSION['usu_login'];


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
                <li> <a href="cadastrarProduto.php"> Cadastrar Produtos </a> </li>

            </ul>
        </nav>

    </header>
    <div class="aligntbl">
        <?php
        require('../../conexao.php');

        $sql = "select prod_codigo, cat_descricao, prod_descricao, prod_valor, prod_quantidade, prod_tipo, prod_obs,tbl_categoria_cat_codigo, prod_imagem
        from tbl_produto, tbl_categoria where cat_codigo=tbl_categoria_cat_codigo";


        $resultado = mysqli_query($conn, $sql);

        echo "<table border='1' cellspacing='0'    cellpadding='6' >";


        echo "<tr> <td>Codigo</td> <td>Nome</td><td>Valor</td> <td> Quantidade</td> <td>Tipo</td> <td>Observação</td> <td>Categoria</td> <td>Imagem</td>   <td> Excluir</td>";
        while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {

            $prod_codigo = $linha_do_banco['prod_codigo'];
            $tbl_produto_prod_codigo = $prod_codigo;
            $prod_descricao = $linha_do_banco['prod_descricao'];
            $prod_valor = $linha_do_banco['prod_valor'];
            $prod_quantidade = $linha_do_banco['prod_quantidade'];
            $prod_tipo = $linha_do_banco['prod_tipo'];
            $prod_obs = $linha_do_banco['prod_obs'];
            $tbl_categoria_cat_codigo = $linha_do_banco['cat_descricao'];

            echo "<tr>";
            echo "<td>$prod_codigo</td>";
            echo "<td>$prod_descricao</td>";
            echo "<td>$prod_valor</td>";
            echo "<td>$prod_quantidade</td>";
            echo "<td>$prod_tipo</td>";
            echo "<td>$prod_obs</td>";
            echo "<td>$tbl_categoria_cat_codigo</td>";
            echo "<td>";
            echo "<a href='../../_produtos/imagem.php?prod_codigo=$prod_codigo'> Selecione";

            echo "<td>";
            echo "<a href='excluirProd.php?prod_codigo=$prod_codigo'>";
            echo "<img border='0' alt='remover' src='../_imgMenu/minus.png' width='25' height='25'>";
            echo "</td></tr>";
        }
        echo "</table>";


        ?>
    </div>



</body>

</html>