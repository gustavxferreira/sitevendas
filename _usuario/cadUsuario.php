<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>

    <?php
    require '../conexao.php';
    include '../_include/execBind.php';


    if (isset($_POST["usu_login"], $_POST["usu_senha"]) && !empty($_POST["usu_login"]) && !empty($_POST["usu_senha"])) {
        $usu_usuario = $_POST["usu_login"];
        $usu_senha = $_POST["usu_senha"];
        $usu_nivel = 2;

        $sql_verificar = "SELECT COUNT(*) AS total FROM tbl_usuario WHERE usu_login = ?";
        $stmt_verificar = $conn->prepare($sql_verificar);
        $stmt_verificar->bind_param("s", $usu_usuario);
        $stmt_verificar->execute();
        $resultado_verificar = $stmt_verificar->get_result();
        $row = $resultado_verificar->fetch_assoc();
        $total_usuarios = $row['total'];

        if ($total_usuarios > 0) {
            echo "<script>alert('Usuário já existe. Por favor, escolha outro nome de usuário.');";
            echo "window.location.href = '../_login/loginForm.php';</script>";
            exit;
        }

        $hash_senha = password_hash($usu_senha, PASSWORD_DEFAULT);
        $sql_inserir = "INSERT INTO tbl_usuario (usu_nome, usu_login, usu_senha, usu_nivel) VALUES (?, ?, ?, ?)";
        $parametros = [$usu_usuario, $usu_usuario, $hash_senha, $usu_nivel];
        execBind($conn, $sql_inserir, $parametros);

        header('Location: ../_login/loginForm.php');
        exit;
    } else {

        echo "<script>alert('Por favor, preencha todos os campos.');";
        echo "window.location.href = '../_login/loginForm.php';</script>";
        exit;
    }
    $conn->close();
    ?>

</body>

</html>