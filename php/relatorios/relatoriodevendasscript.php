<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
include("../conexao.php");

$codbarras_produto=$_POST['codbarras_produto'];
$categoria=$_POST['id_categoria'];
$subcategoria=$_POST['id_subcategoria'];


	
if(empty($codbarras_produto)){
	
	
	$campoTipo="id_subcategoria";
	$valorPesquisa=$_POST['id_subcategoria'];
	
}else {
	if(empty($subcategoria)){
			
		$campoTipo="id_categoria";
		$valorPesquisa=$_POST['id_categoria'];
		
	} else{
		if(empty($categoria)){
			
			
			$campoTipo="codbarras_produto";
			$valorPesquisa=$_POST['codbarras_produto'];
		}
		
	
}


}


	 
 


?>
	
	
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

	</header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Relatório de Vendas</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="relatoriodevendas.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<center>
		<form action="relatoriodevendasscript.php" method="POST">
			<div id="busca">
				<table border="1" bgcolor="#A9A9A9">
					<tr>
						<th>Código de Barras:</th>
						<th><input></input> </th>
					</tr>
					<tr>
					<th><label>Categoria:</label></th>
								<th>
									<?php 
		
		include("../conexao.php");
						
        $sql  = mysqli_query($conn, "select * from categoria");?>
		
            <select name="id_categoria" id="id_categoria">
			<option value="">Selecione...</option>
			<?php
              while($resultado = mysqli_fetch_array($sql)){ ?>     
                  <?php echo '<option  value='.$resultado["id_categoria"].' >'.$resultado['nome_categoria']. '</option>';?>
                  <?php } ?>
            
								</th>
							</select>
							</tr>
					<tr>
								<th><label>Sub-Categoria:</label></th>
								<th>
								
		
	
		
            <select name="id_subcategoria" id="id_subcategoria">  
			<option value="" id="id_subcategoria">Selecione uma Categoria...</option>
            </select>
								</th>
						<tr>
							
							<th colspan="2"><button>Pesquisar</button></th>
						</tr>
						
				</table>
			
			</div>
		</form>
		<br>
			<div id="relatorio">
				<table border="1" bgcolor="#A9A9A9" >
					<tr>
						<th>Cód.</th>
						<th>Nome</th>
						<th>Cód. Barras</th>
						<th>Vendidos no periodo</th>
						<th>Saldo</th>
						<th>Valor</th>
						<th>Categoria</th>
						<th>Sub-Categoria</th>
					</tr>
					<?php
					//$innerjoin="SELECT * FROM venda_has_produto INNER JOIN produto ON venda_has_produto.produto_id_produto = produto.id_produto INNER JOIN subcategoria ON produto.subcategoria_id_subcategoria = subcategoria.id_subcategoria INNER JOIN categoria ON subcategoria.categoria_id_categoria = categoria.id_categoria";
					
				echo	$innerjoin="SELECT * FROM venda_has_produto INNER JOIN produto ON venda_has_produto.produto_id_produto = produto.id_produto INNER JOIN subcategoria ON produto.subcategoria_id_subcategoria = subcategoria.id_subcategoria INNER JOIN categoria ON subcategoria.categoria_id_categoria = categoria.id_categoria WHERE $campoTipo = '$valorPesquisa' GROUP BY id_produto";
					
					
					
					
					$result = $conn->query($innerjoin);
			
			
					
					if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
					echo '<tr>
						<td><label>'. $row["id_produto"].'</label></td>
						<td><label>'. $row["nome_produto"].'</label></td>
						<td><label>'. $row["codbarras_produto"].'</label></td>
						 <td><label>'. $row["quantidade_produto"].'</label></td> 
						<td><label>'. $row["saldo_produto"].'</label></td>
						<td><label>'. $row["valor_produto"].'</label></td>
						<td><label>'. $row["nome_categoria"].'</label></td>
						<td><label>'. $row["nome_subcategoria"].'</label></td>
						
					
					</tr>';
	}
}
					?>
				</table>
			</div>











		</center>
	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>