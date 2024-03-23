<?php
include '../conexao.php';
include '../verificaSessao.php';
include '../_include/execBind.php';
verificaSessao();
$prod_total = $_GET['prod_total'];
$usu_codigo = $_SESSION['usu_codigo'];

$sql_verificar_cliente = "SELECT * FROM tbl_cliente WHERE tbl_usuario_usu_codigo = ?";
$parametros = [&$usu_codigo];
$resultado = execBind($conn, $sql_verificar_cliente, $parametros);

if ($resultado->num_rows > 0) {
  header("Location: ../_pedidos/finalizarPedido.php?prod_total=$prod_total");
  exit;
} else {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <style type="text/css">


    </style>
  </head>

  <body>


    <h2 style="text-align:center;">Dados para entrega</h2>
    <div class="form">

      <form id="cadcliente" method='POST' name="f" action="cadCliente.php">

        <label for="cli_nome">Nome</label>
        <input type="text" id="cli_nome" name="cli_nome" placeholder="Nome" value="">

        <label for="cli_endereco">Endereço</label>
        <input type="text" id="cli_endereco" name="cli_endereco" placeholder="Endereço" value="">

        <label for="cli_numero">Número</label>
        <input type="text" id="cli_numero" name="cli_numero" maxlength="5" placeholder="Ex: N º 27" value="">

        <label for="cli_complemento">Complemento</label>
        <input type="text" id="cli_complemento" name="cli_complemento" placeholder="Ex: Casa, Apartamento Nº" value="">

        <label for="cli_bairro">Bairro</label>
        <input type="text" id="cli_bairro" name="cli_bairro" placeholder="Seu Bairro" value="">

        <label for="cli_cep">CEP</label>
        <input type="text" id="cli_cep" maxlength="9" name="cli_cep" placeholder="(00000-000)" value="">

        <label for="cli_fonecel">Celular</label>
        <input type="tel" id="cli_fonecel" maxlength="11" name="cli_fonecel" value="" placeholder="(11) 99999-9999">
        <label for="cli_cpf">CPF</label>
        <input type="text" id="cli_cpf" maxlength="11" name="cli_cpf" value="" placeholder="Somente Números.">

        <label for="cli_rg">RG</label>
        <input type="text" id="cli_rg" maxlength="9" name="cli_rg" placeholder="Somente Números" value="">

        <label for="cli_datanasc">Data de Nascimento</label>
        <input type="date" id="cli_datanasc" name="cli_datanasc" value="">

        <label for="cli_email">Email</label>
        <input type="email" id="cli_email" name="cli_email" placeholder="email@gmail.com" value="">

        <input type="hidden" id="prod_total" name="prod_total" value="<?php echo $prod_total; ?>">
        <input type="hidden" id="usu_codigo" name="usu_codigo" value="<?php echo $usu_codigo ?>">

        <select name="cidade" id="cidade">
          <option>Selecione a Cidade</option>
          <?php
          $result_cidade = "SELECT * FROM tbl_cidade";
          $resultado_cidade = mysqli_query($conn, $result_cidade);
          while ($row_tbl_cidade = mysqli_fetch_assoc($resultado_cidade)) {
          ?>
            <option value="<?php echo $row_tbl_cidade['cid_codigo']; ?>">
              <?php echo $row_tbl_cidade['cid_uf']; ?>
            </option>
          <?php
          }
          ?>
        </select>


        <input type="submit" value="Enviar">
    </div>
    </form>






  </body>

  </html>
<?php
}

?>