<?php
$basePath = '/';
function generateLink($path)
{
    global $basePath;
    return $basePath . '/' . ltrim($path, '/');
}
$_SERVER['HTTP_HOST'] = '/sitevendas';
$logado = $_SESSION['usu_login'];
?>



    <header id="cabecalho">
        <nav id="menuadm" class="menuadm">

            <ul>
                <li> <a> <img src="<?php echo $_SERVER['HTTP_HOST']; ?>/_admin/_imgMenu/3g.png" width="150" height="150" /> <br>Bem vindo <?php echo $logado ?></a></li>
                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_admin/_categoria/categoria.php'); ?>"> Categoria </a></li>
                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_admin/_cidades/cidades.php'); ?>"> Cidades </a></li>
                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_admin/_pedidos/pedidos.php'); ?>">Pedidos </a></li>
                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_admin/_produtos/produtos.php'); ?>"> Produtos </a></li>

                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_admin/_clientes/clientes.php'); ?>"> Clientes </a>
                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_admin/_cadUsuarioAdm/usuarioAdm.php'); ?>"> Usuário </a>
                <li> <a href="<?php echo generateLink($_SERVER['HTTP_HOST'] . '/_include/sair.php'); ?>"> Sair </a></li>

            </ul>