<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Exemplo Mestre-Detalhe</title>
	</head>
	<body>
		<?php
			/*
				Esta página está incompleta. Favor focar no recebimento e validação dos dados do mestre-detalhe.
			*/
			$p_selproduto = $_POST['selproduto'];
			$p_txtqtde = $_POST['txtqtde'];

			$p_selproduto_validacao = in_array("", $p_selproduto);
			$p_txtqtde_validacao = in_array("" , $p_txtqtde);

			if($p_selproduto_validacao){
				echo "Algum produto não foi selecionado!";
			}else if($p_txtqtde_validacao){
				echo "Alguma quantidade não foi preenchida!";
			}else{
				echo "Formulário preenchido por completo! <br /> Valores abaixo: <br /> <br /> Cod. Barras - Quantidade <br /> <br />";

				$qtde_produtos = count($p_selproduto);
				for($i=0; $i<$qtde_produtos; $i++){
					echo $p_selproduto[$i]." - ".$p_txtqtde[$i]."<br />";
				}
			}
		?>
	</body>
</html>
