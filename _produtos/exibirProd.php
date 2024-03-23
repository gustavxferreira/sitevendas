<?php
include '../verificaSessao.php';
verificaSessao();
require('../conexao.php');
if ((!isset($_SESSION['usu_login']) == true) and (!isset($_SESSION['usu_senha']) == true) and (!isset($_SESSION['usu_nivel']) == true)) {
    unset($_SESSION['usu_login']);
    unset($_SESSION['usu_senha']);
    unset($_SESSION['usu_nivel']);
    echo "<script>alert('Faça Login Para Continuar.');";
    echo "window.location.href = '../_login/loginForm.php';</script>";
}
$logado = $_SESSION['usu_login'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>3G</title>
</head>

<body>
    
        <?php
        $prod_codigo = mysqli_real_escape_string($conn, $_GET['prod_codigo']);

        $sql = "SELECT tbl_produto.prod_codigo, prod_descricao, prod_valor, prod_quantidade, prod_obs, MIN(path) AS path
            FROM tbl_produto
            LEFT JOIN tbl_imagem ON tbl_produto.prod_codigo = tbl_imagem.tbl_produto_prod_codigo
            WHERE tbl_produto.prod_codigo = '$prod_codigo'  
            GROUP BY tbl_produto.prod_codigo";
        $resultado = mysqli_query($conn, $sql);
        if ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
            $imgpath = $linha_do_banco['path'];
            $prod_descricao = $linha_do_banco['prod_descricao'];
            $prod_valor = $linha_do_banco['prod_valor'];
            $prod_codigo = $linha_do_banco['prod_codigo'];
            $prod_obs = $linha_do_banco['prod_obs'];
            $prod_quantidade = $linha_do_banco['prod_quantidade'];
        ?>
            <div class="containerprod">
            <figure id="img">
                    <img src=<?php echo $imgpath ?> width="400" height="400" alt="">
                    
                </figure>    
            <div id="prodinfo">
                <?php echo "<p> $prod_descricao  </p>" ?>
                <?php echo "<p> R$ $prod_valor</p>" ?>
                <?php echo "<p> Em estoque: $prod_quantidade</p>" ?>
                
                <a href='../_carrinho/cadCarrinho.php?prod_codigo=<?php echo $prod_codigo; ?>'>Comprar</a>
                
            </div>          
             
        </div>
        <section id="prodobs">
        <p>Detalhes do Produtos</p>
        <?php echo "<p>$prod_obs</p>" ?> 
        </section>
        <?php
        }
        ?>
   
    
</body>
<footer><?php include '../_include/rodape.php'?></footer>
</html>