
<script src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
function showMe (it, box) {
  var vis = (box.checked) ? "block" : "none";
  document.getElementById(it).style.display = vis;
}

</script>


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
			<div id="formulario">
				<form method="POST" action="alterarestoque.php">
					<table bgcolor="#A9A9A9">
					
						<tr>
							<th><label>Codigo de Barras:</label></th>
							<th><input  id="codbarras_produto" name="codbarras_produto"></input></th>
						</tr>
							
						<tr>
							<th><label>Nome do Produto:</label></th>
							<th><input  id="nome_produto" name="nome_produto"></input></th>
						</tr>
						
							
						
						
						
					</table>
								
					
							
							
							
					<!--Botão de Enviar -->
					<tr align="center">
					<td colspan="2"><button><input type="submit" value="Buscar" id="submit" name="submit"></button></td>
					</tr>
					<!-- Até Aqui -->
											
							
				</form>
			</div>		
		</center>	
		
		
		
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>