<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Cadastrar Subcategoria</h2>
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
				<form method="POST" action="cadastrarsubcategoriascript.php">
					<table bgcolor="#A9A9A9">
							<th>Categoria:</th>
							<th>
									
									<select>
									<option value="categoria1"></option>
									<option value="categoria2">Pereciveis</option>
									<option value="categoria3">Não Pereciveis</option>
									
							</th>
							
							<tr>
								<th><label>Nome da Subcategoria:</label></th>
								<th><input></input></th>
							</tr>
							
							<tr>
						
							</tr>
							
							
							
							<!--Botão de Enviar -->
							<tr align="center">
								<td><button><input type="reset" value="Limpar Campos" id="limpar" name="limpar"></button></td>
								<td><button><input type="submit" value="Registrar" id="registrar" name="registrar"></button></td>
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
							<th>Nome da Categoria</th>
							<th>Nome da SubCategoria</th>
	
							<th colspan="2">Ações</th>
						</tr>
						
						<tr>
							<th>1</th>
							<th>Pereciveis</th>
							<th>Leite</th>
			
							<!-- Botões alterar e excluir -->
							<form method="get" action="alterarsubcategoria.html">
								<th><button><img src="../../img/alterarlapis.png" height="20px" width="20px" ></button></td></th>
							</form>
							<th><button><img src="../../img/excluirbotao.png" height="20px" width="20px" ></button></td></th>
							<!-- Até aqui -->
						</tr>
						
						<tr>
							<th>2</th>
							<th>Não Pereciveis</th>
							<th>Arroz</th>
							<!-- Botões alterar e excluir -->
							<form method="get" action="alterarsubcategoria.html">
								<th><button><img src="img/alterarlapis.png" height="20px" width="20px" ></button></td></th>
							</form>
							<th><button><img src="img/excluirbotao.png" height="20px" width="20px" ></button></td></th>
							<!-- Até aqui -->
						</tr>
							
							
							
							
					</table>
				</form>
			</div>

		
		</center>
				
			
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>