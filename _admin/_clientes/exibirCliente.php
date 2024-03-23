<?php include '../verificaSessaoAdm.php';
verificaSessaoAdm();
$cli_codigo = $_GET['cli_codigo'];
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../style/styleadm.css">
    <title></title>
</head>

<body>
        <div class="aligncenter">
        <div id="tblcli">   
        <?php

        require '../../conexao.php';
        $sql = "select * from tbl_cliente, tbl_cidade where cli_codigo = $cli_codigo and tbl_cidade_cid_codigo=cid_codigo";
        $resultado = mysqli_query($conn, $sql);
        
        echo "<table border='1'>";
        echo "<tr> <td colspan='4'>Suas Informações</td>";
        while ($linha_do_banco = mysqli_fetch_assoc($resultado)) {

            $cli_nome = $linha_do_banco['cli_nome'];
            $cli_endereco = $linha_do_banco['cli_endereco'];
            $cli_numero = $linha_do_banco['cli_numero'];
            $cli_complemento = $linha_do_banco['cli_complemento'];
            $cli_bairro = $linha_do_banco['cli_bairro'];
            $cli_cep = $linha_do_banco['cli_cep'];
            $cli_fonecel = $linha_do_banco['cli_fonecel'];
            $cli_cpf = $linha_do_banco['cli_cpf'];
            $cli_rg = $linha_do_banco['cli_rg'];
            $cli_datanasc = $linha_do_banco['cli_datanasc'];
            $cli_email = $linha_do_banco['cli_email'];
            $cid_uf = $linha_do_banco['cid_uf'];
            $cid_descricao = $linha_do_banco['cid_descricao'];
            $telefone_formatado = '(' . substr($cli_fonecel, 0, 2) . ') ' . substr($cli_fonecel, 2, 5) . '-' . substr($cli_fonecel, 7);

            echo "<tr>";
            echo "<td>Nome</td>";
            echo "<td colspan='3'>$cli_nome</td>";
            echo "<tr>";
            echo "<td>CPF</td>";
            echo "<td colspan='3'>$cli_cpf</td>";
            echo "<tr>";
            echo "<td>RG</td>";
            echo "<td colspan='3'>$cli_rg</td>";
            echo "<tr>";
            echo "<td>E-mail</td>";
            echo "<td colspan='3'>$cli_email</td>";
            echo "<tr>";
            echo "<td>Telefone Celular</td>";
            echo "<td colspan='3'>$telefone_formatado</td>";
            echo "<tr>";

            echo "<td>Data de Nascimento</td>";
            echo "<td colspan='3'>$cli_datanasc</td>";

            echo "<tr> <td colspan='4'>Informações Endereço</td>";
            echo "<tr>";
            echo "<td>Endereço</td>";
            echo "<td colspan='1'>$cli_endereco, $cli_numero</td>";
            echo "<td>CEP</td>";
            echo "<td colspan='1'>$cli_cep</td>";
            echo "<tr>";
            echo "<tr>";
            echo "<td>Bairro</td>";
            echo "<td colspan='3'>$cli_bairro</td>";
            echo "<tr>";
            echo "<td>Complemento</td>";
            echo "<td colspan='3'>$cli_complemento</td>";
            echo "<tr>";
            echo "<td>Cidade</td>";
            echo "<td colspan='3'>$cid_uf - $cid_descricao</td>";
            echo "<tr>";

            
            echo "<tr>";


            echo "</table>";
        }




        ?>
    </div>    
    </div>
 
</body>


</html>