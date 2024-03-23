<?php
function verificaSessao()
{
    session_start();
    if ((!isset($_SESSION['usu_login']) == true) and (!isset($_SESSION['usu_senha']) == true) and (!isset($_SESSION['usu_nivel']) == true) and (!isset($_SESSION['usu_codigo']) == true)) {
        unset($_SESSION['usu_codigo']);
        unset($_SESSION['usu_login']);
        unset($_SESSION['usu_senha']);
        unset($_SESSION['usu_nivel']);
        include(__DIR__ . '/menu.php');
    } else {
        include(__DIR__ . '/menuSessao.php');
    }
}
