<?php 
		$nome_produto = $_POST ["nome_produto"];
		$codbarras_produto = $_POST ["codbarras_produto"];
		
		?>		
			


<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Alterar Estoque</h2>
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
								<th><input></input></th>
							</tr>
							
							<tr>
								<th><label>Nome do Produto:</label></th>
								<th><input></input></th>
							</tr>
							<tr>
								<th><label>Quantidade atual: </label></th>
								<th><input value="XXXXXXX"></input></th>
							</tr>
							
							

							
							
							
							<!--Botão de Enviar -->
							<tr align="center">
								<td colspan="2"><button><input type="reset" value="OK" id="limpar" name="limpar"></button></td>
							</tr>
							<!-- Até Aqui -->
							
							
							
							
					</table>
				</form>
			</div>		
		</center>	
		
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>