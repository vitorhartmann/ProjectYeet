

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
			<h2>Estoque</h2>
		</center>
	</div>
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="estoque.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
			<div id="formulario">

							
							
							
							
					</table>
				</form>
			</div>		
		</center>	
		<center>
<?php 
    //Recebe os dados com as alterações feitas
	include("../conexao.php");
    $id_produto = $_POST ["id_produto"];
    $adicionar_produto = $_POST ["adicionar_produto"];
	$valorsetado= $_POST["novo_valor"];

	$saldo_produto=$_POST["saldo_produto"];
	 
	if(isset($_POST[$valorsetado])){
		
		$novoValor=$_POST ["novo_valor"];
		
	}else{
		$novoValor=$_POST["antigo_valor"];
		
	}
	
	$saldototal_produto=$adicionar_produto+$saldo_produto ;


    
	$sql = "UPDATE produto SET saldo_produto='" . $saldototal_produto . "', valor_produto='" . $novoValor . "'  WHERE id_produto=".$id_produto ;

	
    $update = mysqli_query($conn, $sql);
	
	 if( !$update ){
        echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Erro na operação </h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
        exit;
    }else{
		   echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Ëxito na operação </h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
	}
		
	
?>
		</center>
				
			
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>