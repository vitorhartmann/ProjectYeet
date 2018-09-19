<script type="text/javascript">
function validaCampo()
{
if(document.cadastrarproduto.codigobarras.value=="")
{
alert("O Campo código de barras é obrigatório!");
return false;
}
else
if(document.cadastrarproduto.nomedoproduto.value=="")
{
alert("O Campo Nome do produto é obrigatório!");
return false;
}
else
return true;
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
			<h2>Produto</h2>
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
				<form  action="cadastrarprodutoscript.php" method="POST" >
					<table bgcolor="#A9A9A9">
					
							<tr>
								<th><label>Codigo de Barras:</label></th>
								<th><input name="codigobarras" id="codigobarras" class="codigobarras"></input></th>
							</tr>
							
							<tr>
								<th><label>Nome do Produto:</label></th>
								<th><input name="nomedoproduto" id="nomedoproduto" class="nomedoproduto"></input></th>
							</tr>
							
							<tr>
								<th><label>Categoria</label></th>
								<th>
									<select>
									<option value="categoria1"></option>
									<option value="categoria2"></option>
									<option value="categoria3"></option>
									<option value="categoria4"></option>
								</th>
							</select>
							</tr>
							
							<tr>
								<th><label>Sub-Categoria</label></th>
								<th>
									<select>
									<option value="subcategoria1"></option>
									<option value="subcategoria2"></option>
									<option value="subcategoria3"></option>
									<option value="subcategoria4"></option>
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
						include ("php/conexao.php");
						
						
						
						$comando="SELECT * FROM produto";
						$resultado=mysqli_query($conexao,$comando);
						$dados=array();
						
						while($guardaDados = mysqli_fetch_assoc($resultado)){
						array_push($dados,$guardaDados);
						}
						if($dados!=null){
							foreach($dados as $cadaDado){
						?>

<tr>
	<td><?php echo 'teste'.$cadaDado['id_produto'].'teste'; ?></td>
	<td><?php echo $cadaDado['nome_produto']; ?></td>
	<td><?php echo $cadaDado['codbarras_produto']; ?></td>
	
	
	
</tr>
	
<?php	
	
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