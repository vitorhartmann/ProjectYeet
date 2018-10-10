

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
				alert('TESTE DE ENTRADA ');
                if ($('#id_categoria').val() !== '') {
									alert('TESTE DE ENTRADA '+data);

                    // Adiciona o retorno no campo, habilita e da foco
                    $('#id_subcategoria').html('<option value="">Selecione</option>');
                    $('#id_subcategoria').append(data);
                    $('#id_subcategoria').removeAttr('disabled').focus();
                } else {
									alert(data+ 'TESTE DE ENTRADA');

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
			<h2>Produto</h2>
		</center>
	</div>
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="../../index.html"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
			<div id="formulario">
				<form  action="cadastrarprodutoscript.php" method="POST" >
					<table bgcolor="#A9A9A9">
					
							<tr>
								<th><label>Codigo de Barras:</label></th>
								<th><input  name="codigobarras" id="codigobarras" class="codigobarras"></input></th>
							</tr>
							
							<tr>
								<th><label>Nome do Produto:</label></th>
								<th><input  name="nomedoproduto" id="nomedoproduto" class="nomedoproduto"></input></th>
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
			<option value="">Selecione uma Categoria</option>
            </select>
								</th>
							</select>
							</tr>
							
							
							
							<!--Botão de Enviar -->
							<tr align="center">
								<td><button><input type="reset" value="Limpar Campos" id="limpar" name="limpar"></button></td>
								<td><button><input type="submit" value="Registrar" id="submit" name="submit"></button></td>
							</tr>
							<!-- Até Aqui -->
							
							
							
							
					</table>
				</form>
			</div>		
		</center>	
		<center>
			<div id="formulario">
				
					<table border="1" bgcolor="#A9A9A9">
					
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>Código de barras</th>
						
							<th colspan="2">Ações</th>
						</tr>
						<?php
						include("../conexao.php");
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "SELECT * FROM produto";
						$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td> " . $row["id_produto"]. "</td>" ;
        echo "<td> " . $row["nome_produto"]. "</td>" ;
		echo "<td> " . $row["codbarras_produto"]. "</td>";
							echo '<form method="get" action="alterarproduto.html">';
							echo '<th><button><img src="../../img/alterarlapis.png" height="20px" width="20px" ></button></td></th>';
							echo '</form>';
							echo '<th><button><img src="../../img/excluirbotao.png" height="20px" width="20px" ></button></td></th>';
							
						echo '</tr>';
		
		echo "</tr>";
		
    }
} else {
    echo "0 results";
}
$conn->close();
?>					
					

						

		
							
							
					</table>
			</div>

		
		</center>
				
			
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>