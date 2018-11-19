<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Exemplo Mestre-Detalhe</title>
	</head>
	<body>
	

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#id_categoria').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'listasubcategoria.php',
            dataType: 'html',
            data: {'categoria': $('#id_categoria').val()},
            // Antes de carregar os registros, mostra para o usuário que está
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#id_subcategoria').attr('disabled', 'disabled');
                $('#id_subcategoria').html('<option value="">Carregando...</option>');
            },
            // Após carregar, coloca a lista dentro do select de cidades.
            success: function(data) {
			
                if ($('#id_categoria').val() !== '') {
								

                    // Adiciona o retorno no campo, habilita e da foco
                    $('#id_subcategoria').html('<option value="">Selecione</option>');
                    $('#id_subcategoria').append(data);
                    $('#id_subcategoria').removeAttr('disabled').focus();
                } else {
									

                    $('#id_subcategoria').html('<option value="">Selecione uma Categoria</option>');
                    $('#id_subcategoria').attr('disabled', 'disabled');

                    
                }
            }
        });
    });   
});

</script>

</head>

	
	<body>
		<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Tela de Venda</h2>
		</center>
	</div>
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="teladevendas.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
	
						

		
							
	
		
	
				

		<?php
			include("../conexao.php");
			date_default_timezone_set("America/Sao_Paulo");
			/*
				Esta página está incompleta. Favor focar no recebimento e validação dos dados do mestre-detalhe.
			*/
			$p_selproduto = $_POST['selproduto'];
			$p_txtqtde = $_POST['txtqtde'];
			$p_produtosValor = $_POST['valorun'];
			$p_produtosNome = $_POST['nomeProduto'];
			$p_totalProduto= $_POST['totalProduto'];
			$p_totalFinal= $_POST['totalfinal'];
			$id_venda;

			$p_selproduto_validacao = in_array("", $p_selproduto);
			$p_txtqtde_validacao = in_array("" , $p_txtqtde);

			if($p_selproduto_validacao){
				echo "Algum produto não foi selecionado!";
			}else if($p_txtqtde_validacao){
				echo "Alguma quantidade não foi preenchida!";
			}else{
				// echo "Formulário preenchido por completo! <br /> Valores abaixo: <br /> <br /> Cod. Barras - Produto -Valor Un. -  Quantidade - Valor Total <br /> <br />";
				echo'
				
				<table border="4" bgcolor="#A9A9A9">
					<tr>
					<td>Data:</td>
					<td colspan="2"> <input type="text" name="txtdata" readonly value="';?><?php echo date("d/m/Y");?><?php echo '"></td>
					<td>Hora: </td>
					<td colspan="2"><input type="text" name="txthora" readonly value="';?><?php echo date("H:i:s"); ?><?php echo '"></td>
					</tr>
					<tr height="15px"></tr>
					<tr> 
					<td colspan="5">Produtos Vendidos</td>
					</tr>
					 <tr>
						<td> Cód. Barras </td>
						<td> Nome </td>
						<td> Valor Un. </td>
						<td> Quantidade </td>
						<td> Total </td>
					 </tr>
					 <br>
					 '
					 ;
				
				$qtde_produtos = count($p_selproduto);
				for($i=0; $i<$qtde_produtos; $i++){
					
					
					echo'
					 <tr>
						<td> ' .$p_selproduto[$i]. '</td>
						<td>' .$p_produtosNome[$i]. '</td>
						<td>' .$p_produtosValor[$i]. '</td>
						<td>' .$p_txtqtde[$i]. '</td>
						<td>' .$p_totalProduto[$i]. '</td>
					 </tr>';
					 
					 
					 
					 $sql="INSERT INTO venda_has_produto (venda_id_venda, produto_id_produto, quantidade_produto) VALUES ('','$p_selproduto[$i]','$p_txtqtde[$i]' ) WHERE venda_id_venda='$id_venda'" ;
					 $query = $conn->query( $sql );
				
		
					
					
				// echo $p_selproduto[$i]." - ".$p_produtosNome[$i]." - ".$p_produtosValor[$i]." - ".$p_txtqtde[$i]. "- ".$p_totalProduto[$i]. " <br />";
					
				}
				echo '
				<tr height="15px"></tr>
				
				<tr>
				<td Colspan="3"></td>
				<td Colspan="1">SubTotal: </td>
				<td style="font-size: 35px;" Colspan="1"> R$ '.$p_totalFinal.'</td>
				</tr>
				
				</table>';
			}
		?>
			</center>
	</body>
</html>
