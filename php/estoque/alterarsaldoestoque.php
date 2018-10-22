	
			





<script src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
			<button><a href="modificarestoque.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
		<?php
		include("../conexao.php");
		
		$codbarras_produto=$_POST['codbarras_produto'];
		$nome_produto=$_POST['nome_produto'];

	
$sql = "SELECT * FROM produto where codbarras_produto='{$codbarras_produto}'";
$result = $conn->query($sql);
     

  if( $result->num_rows > 0 ) {//se retornar algum resultado 
            echo '<div id="formulario">
				<form method="POST" action="salvarestoque.php">
					<table bgcolor="#A9A9A9">
					
					'; while($row = $result->fetch_assoc()) { echo' 
						"<input name="id_produto" type="hidden" value=' .$row["id_produto"]. '>";
						<tr>
							
							<th><label>Codigo de Barras:</label></th>
							<th><input  value="'.$row["codbarras_produto"].'" disabled="disabled" class="codbarras_produto" id="codbarras_produto" name="codbarras_produto"></input></th>
						</tr>
							
						<tr>
			
							<th><label>Nome do Produto:</label></th>
							<th><input value="'.$row["nome_produto"].'  " disabled="disabled" "class="nome_produto" id="nome_produto" name="nome_produto"></input></th>
						</tr>
						<tr>
							
							<th><label>Quantidade atual: </label></th>
							<th><input name="saldo_produto" id="saldo_produto"  value="'.$row["saldo_produto"].'"></input></th>
						</tr>
						
						<tr align="center">
					<td colspan="2"><button><input type="submit" value="Alterar" id="limpar" name="limpar"></button></td>
					</tr>
						
						
					</table>
							
				
							
							
							
					
					
				
											
							
				</form>
			</div>		
		</center>	';


					} }else{ 
  $sql = "SELECT * FROM produto where nome_produto='{$nome_produto}'";
$result = $conn->query($sql);	
			
         if ($result->num_rows > 0) {
			echo '<div id="formulario">
				<form method="POST" action="salvarestoque.php.php">
					<table bgcolor="#A9A9A9">
					
					'; while($row = $result->fetch_assoc()) { echo' 
					"<input name="id_produto" type="hidden" value=' .$row["id_produto"]. '>";
						<tr>
							<th><label>Codigo de Barras:</label></th>
							<th><input  value="'.$row["codbarras_produto"].'" disabled="disabled" class="codbarras_produto" id="codbarras_produto" name="codbarras_produto"></input></th>
							 
						</tr>
							
						<tr>
							<th><label>Nome do Produto:</label></th>
							<th><input value="'.$row["nome_produto"].' " disabled="disabled" class="nome_produto" id="nome_produto" name="nome_produto"></input></th>
						
						</tr>
						<tr>
							<th><label>Quantidade atual: </label></th>
							<th><input name="saldo_produto" id="saldo_produto" value="'.$row["saldo_produto"].'"></input></th>
							
						</tr>
						
						
						
					</table>
							
				
							
							
							
					
					<tr align="center">
					<td colspan="2"><button><input type="submit" value="Adicionar" id="limpar" name="limpar"></button></td>
					</tr>
				
											
							
				</form>
			</div>		
		</center>	';
					}} else {
					
    echo '<div id="formulario">
				<form method="POST" action="salvarestoque.php.php">
					<table bgcolor="#A9A9A9">
					
					
						<tr>
							<th><label>Codigo de Barras:</label></th>
							<th><input  value="Não Encontrado" disabled="disabled" class="codbarras_produto" id="codbarras_produto" name="codbarras_produto"></input></th>
						</tr>
							
						<tr>
							<th><label>Nome do Produto:</label></th>
							<th><input value="Não Encontrado" disabled="disabled" class="nome_produto" id="nome_produto" name="nome_produto"></input></th>
						</tr>
						<tr>
							<th><label>Quantidade atual: </label></th>
							<th><label value="Não encontrado" disabled="Disabled"></label></th>
						</tr>
						
						
						
						
					</table>
								
					<div id="div1" style="display:none">
						<table  bgcolor="#A9A9A9" id="t1">
									
							
						
							<tr width="px">
								<th><label>Valor Novo:</label></th>
								<th><input name="novo_valor" ></input></th>
							</tr>
							
						</table>
					</div>
							
							
							
					<!--Botão de Enviar -->
					<tr align="center">
					<td colspan="2"><button><input type="submit" value="Adicionar" id="limpar" name="limpar"></button></td>
					</tr>
					<!-- Até Aqui -->
											
							
				</form>
			</div>		
		</center>	';
					}
					}
?>
		
		
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>