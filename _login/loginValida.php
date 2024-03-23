<?php
session_start();

include_once("../conexao.php");

if (isset($_POST['usu_login']) && isset($_POST['usu_senha'])) {

    $usuario = $_POST['usu_login'];
    $senha = $_POST['usu_senha'];



    $stmt = $conn->prepare("SELECT usu_codigo, usu_senha, usu_nome, usu_nivel FROM tbl_usuario WHERE usu_login = ? LIMIT 1");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado_usuario = $stmt->get_result();
    $resultado = $resultado_usuario->fetch_assoc();

    if ($resultado) {

        if (password_verify($senha, $resultado['usu_senha'])) {
            $_SESSION['usu_codigo'] = $resultado['usu_codigo'];
            $_SESSION['usu_nome'] = $resultado['usu_nome'];
            $_SESSION['usu_login'] = $usuario;
            $_SESSION['usu_nivel'] = $resultado['usu_nivel'];

            if ($_SESSION['usu_nivel'] == "1") {
                header("Location: ../_admin/indexadm.php");
            } elseif ($_SESSION['usu_nivel'] == "2") {
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php");
            }
        } else {

            header("Location: ../_login/loginForm.php");
        }
    } else {

        header("Location: ../_login/loginForm.php");
    }

    $stmt->close();
} else {

    header("Location: ../_login/loginForm.php");
}
