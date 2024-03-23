<?php
include('../../conexao.php');
include '../verificaSessaoAdm.php';
verificaSessaoAdm();
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" type="text/css" href="../../style/styleadm.css">

</head>

<body>
	a


	<div class="form">
		<form id="cadprod" method='POST' name="f" action="cadProduto.php">
			<label for="prod_descricao">Produto Nome <br></label>
			<input type="text" id="prod_descricao" name="prod_descricao" value=""><br>

			<label for="prod_valor">Valor</label><br>
			<input type="text" id="prod_valor" name="prod_valor" value=""><br>

			<label for="prod_quantidade">Quantidade</label><br>
			<input type="text" id="prod_quantidade" name="prod_quantidade" value=""><br><br>

			<select name="prod_tipo" id="prod_tipo">
				<?php

				$tipo1 = '';
				$tipo2 = '';
				$tipo3 = '';
				$tipo4 = '';
				$tipo5 = '';
				switch ('prod_tipo') {
					case 'unid':
						$tipo1 = 'selected';
						break;
					case 'KG':
						$tipo2 = 'selected';
						break;
					case 'Litro':
						$tipo3 = 'selected';
						break;
					case 'Grama':
						$tipo4 = 'selected';
						break;
					case 'Caixa':
						$tipo5 = 'selected';
						break;
				}
				?>


				<option value="unid" <?php echo $tipo1; ?>>unid</option>
				<option value="KG" <?php echo $tipo2; ?>>KG </option>
				<option value="Litro" <?php echo $tipo3; ?>>Litro</option>
				<option value="Grama" <?php echo $tipo4; ?>>Grama</option>
				<option value="Caixa" <?php echo $tipo5; ?>>Caixa</option>
				<br>
			</select>
			<br>
			<br>
			<select name="categoria" id="categoria">
				<option>Selecione a Categoria</option>
				<?php
				$result_categoria = "SELECT * FROM tbl_categoria";
				$resultado_categoria = mysqli_query($conn, $result_categoria);
				while ($row_tbl_categoria = mysqli_fetch_assoc($resultado_categoria)) { ?>
					<option value="<?php echo $row_tbl_categoria['cat_codigo']; ?>"><?php echo $row_tbl_categoria['cat_descricao']; ?></option> <?php
																																			}
																																				?>
			</select><br><br>

			<label for="prod_obs">Observação Do Produto</label>
			<br>
			<textarea id="prod_obs" name="prod_obs" rows="5" cols="27">

</textarea>
			<br>


			<input type="submit" value="Enviar">
	</div>
	</form>

</body>

</html>