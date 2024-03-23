<?php
require 'conexao.php';
include 'verificaSessao.php';
verificaSessao();
?>
<!DOCTYPE html>
<html>

<head>
    <title>3G</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <section id="ap">
        <div class="container">
            <h1>Fique por dentro das principais categorias!</h1>
        </div>
    </section>

    <div class="container">
        <?php
        $sql = "SELECT * FROM tbl_categoria";
        $resultado = mysqli_query($conn, $sql);

        $count = 0;

        while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {

            if ($count % 2 == 0) {
                echo '<div class="row">';
            }

            echo '<a class="col" href="' . generateLink($_SERVER['HTTP_HOST'] . '/_produtos/catProd.php?tbl_categoria_cat_codigo=' . $linha_do_banco['cat_codigo']) . '"> ' . $linha_do_banco['cat_descricao'] . '</a>';

            $count++;

            if ($count % 2 == 0) {
                echo '</div>';
            }
        }

        if ($count % 2 != 0) {
            echo '</div>';
        }
        ?>
    </div>

    <?php include '_include/rodape.php'; ?>
</body>

</html>