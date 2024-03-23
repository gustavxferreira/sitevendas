<?php  
$_SERVER['HTTP_HOST'] = '/sitevendas';

session_start();
unset($_SESSION['usu_codigo']);
unset($_SESSION['usu_login']);
unset($_SESSION['usu_senha']);
unset($_SESSION['usu_nivel']);
header('Location:' . $_SERVER['HTTP_HOST'] . '/_login/loginForm.php');

?>