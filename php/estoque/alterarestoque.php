<?php 
		$nome_produto = $_POST ["nome_produto"];
		$codbarras_produto = $_POST ["codbarras_produto"];
		
		?>		
			



<script src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
function showMe (it, box) {
  var vis = (box.checked) ? "block" : "none";
  document.getElementById(it).style.display = vis;
}

</script>
<?php
		include("../conexao.php");

	
$sql = "SELECT * FROM produto where codbarras_produto='.{$codbarras_produto}.' or nome_produto='.{$nome_produto}.'";
$result = $conn->query($sql);
      
            
		
			
			

			
			
        ?>

<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Adicionar Estoque</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="../../index.html"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
		<?php if ($result->num_rows > 0) {
			echo '<div id="formulario">
				<form method="POST" action="alterarestoque.php">
					<table bgcolor="#A9A9A9">
					
					
						<tr>
							<th><label>Codigo de Barras:</label></th>
							<th><input class="codbarras_produto" id="codbarras_produto" name="codbarras_produto"></input></th>
						</tr>
							
						<tr>
							<th><label>Nome do Produto:</label></th>
							<th><input class="nome_produto" id="nome_produto" name="nome_produto"></input></th>
						</tr>
						<tr>
							<th><label>Quantidade atual: </label></th>
							<th><label></label></th>
						</tr>
						<tr>
							<th><label>Quantidade a adicionar:</label></th>
							<th><input></input></th>
						</tr>
							
						<tr>
							<th><label>Alterar valor?</label></th>
							<th><label><input type="checkbox" name="c1" onclick="showMe("div1", this)"> </label></th>
						</tr>
						
						
						
					</table>
								
					<div id="div1" style="display:none">
						<table  bgcolor="#A9A9A9" id="t1">
									
							
						
							<tr width="px">
								<th><label>Valor Novo:</label></th>
								<th><input></input></th>
							</tr>
							
						</table>
					</div>
							
							
							
					<!--Botão de Enviar -->
					<tr align="center">
					<td colspan="2"><button><input type="reset" value="Adicionar" id="limpar" name="limpar"></button></td>
					</tr>
					<!-- Até Aqui -->
											
							
				</form>
			</div>		
		</center>	';
		} else {
    echo "0 results";
}?>
		
		
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>