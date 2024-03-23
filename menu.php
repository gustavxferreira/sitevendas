<?php require('conexao.php');

$sql = "select * from tbl_categoria";

$resultado = mysqli_query($conn, $sql);
$basePath = '/';

function generateLink($path)
{
    global $basePath;
    return $basePath . '/' . ltrim($path, '/');
}
$_SERVER['HTTP_HOST'] = '/sitevendas';
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="shortcut icon" type="image/png" href="img/3g.ico">
</head>

<body>

    <header id="cabecalho">
        <nav>

            <ul>
                <li class="dropdown">
                    <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/index.php'); ?>">
                        <img src="<?php echo $_SERVER['HTTP_HOST']; ?>/_admin/_imgMenu/categoria.png" width="20" height="20" /> Categoria
                    </a>

                    <div class="dropdown-menu">
                        <?php
                        while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {
                            $cat_codigo = $linha_do_banco['cat_codigo'];
                            $cat_descricao = $linha_do_banco['cat_descricao'];
                        ?>
                            <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_produtos/catProd.php?tbl_categoria_cat_codigo=' . $cat_codigo); ?>">
                                <?php echo $cat_descricao; ?>
                            </a>
                        <?php } ?>
                    </div>
                </li>
                <li>
                    <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_produtos/listarProdutos.php'); ?>"> <img src="<?php echo $_SERVER['HTTP_HOST']; ?>/_admin/_imgMenu/loja.png" width="20" height="20" width="20" height="20"> Produtos</a>
                </li>

                <li>
                    <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_login/loginForm.php'); ?>"><img src="<?php echo $_SERVER['HTTP_HOST']; ?>/_admin/_imgMenu/sair.png" width="20" height="20" height="20"> Login</a>
                </li>

            </ul>

        </nav>
    </header>
    </div>
    </div>

</body>

</html>