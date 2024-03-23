<?php

function verificaSessaoAdm()

{
    session_start();
    if ($_SESSION['usu_nivel'] == '1') {
        include_once 'menuadm.php';
        if ((!isset($_SESSION['usu_login']) == true) and (!isset($_SESSION['usu_senha']) == true)) {

            unset($_SESSION['usu_login']);
            unset($_SESSION['usu_senha']);
            header('Location: /sitestock/login_form.php');
        }
    } else {
        header("Location:  ../index.php");
    }
}
