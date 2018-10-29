<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Relatório de Estoque Baixo</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="../../index.html"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<center>
		<form method="POST" action="relatoriodeestoquescript.php">
			<div id="busca">
			
				<table border="1" bgcolor="#A9A9A9">
					<tr>
						<th>Valor em Estoque menor ou igual a:</th>
						<th><input name="saldo_produto" id="saldo_produto"></input></th>
					</tr>
					
					<!--Botão de Enviar -->
					<tr align="center">
						<td colspan="2"><button><input type="submit" value="Pesquisar" id="limpar" name="limpar"></button></td>
					</tr>
					<!-- Até Aqui -->
			
				</table>
			</div>
		</form>
		<br>
			<div id="relatorio">
					<table bgcolor="#A9A9A9" border="1">
					<tr>
					<th><label>Código de Barras: </label></th>
					<th><label>Nome do Produto:</label></th>
					<th><label>Quantidade em estoque: </label></th>
			
				</table>
			</div>











		</center>
	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>