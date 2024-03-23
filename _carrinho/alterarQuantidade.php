<?php
session_start();
$logado = $_SESSION['usu_login'];
require '../conexao.php';

?>


<?php
if (isset($_POST["nova_quantidade"]) && isset($_POST["car_id"])) {
    $quantidade = $_POST["nova_quantidade"];
    $id = $_POST["car_id"];


    if ($quantidade > 0) {

        $stmt = $conn->prepare("UPDATE tbl_carrinho SET car_quantidade = ? WHERE car_id = ? ");
        $stmt->bind_param("ii", $quantidade, $id);
        $stmt->execute();


        if ($stmt->affected_rows > 0) {

            $stmt->close();


            echo "<script> window.location.href = 'listarCarrinho.php';</script>";
            exit;
        } else {
            echo "<script> window.location.href = 'listarCarrinho.php';</script>";
        }


        $stmt->close();
    } else {
        echo "<script>alert('A quantidade deve ser maior que 0!'); window.location.href = 'listarCarrinho.php';</script>";
    }
} else {
    echo "<script>alert('Dados Incompletos'); window.location.href = 'listarCarrinho.php';</script>";
}
?>