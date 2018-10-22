	
			


<script type="text/javascript" >  
    
     function disableMyText(){  
          if(document.getElementById("checkboxvalor").checked == true){  
              document.getElementById("novo_valor").disabled = false;  
          }else{
            document.getElementById("novo_valor").disabled = true;
          }  
     }  
 </script> 



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
			<button><a href="estoque.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
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
				<form method="POST" action="adicionarestoque.php">
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
							<th><input name="saldo_produto" id="saldo_produto" readonly value="'.$row["saldo_produto"].'"></input></th>
						</tr>
						<tr>
							<th><label>Quantidade a adicionar:</label></th>
							<th><input type="text" class="adicionar_produto" id="adicionar_produto" name="adicionar_produto"></input></th>
						</tr>
							
						<tr>
							<th><label>Alterar valor?</label></th>
							<th><label><input id="checkboxvalor" type="checkbox" name="checkboxvalor" onclick="disableMyText()"> </label></th>
						</tr>
						<tr>
								<th><label>Valor Novo:</label></th>
								<th><input value="'.$row["valor_produto"].' " name="novo_valor" id="novo_valor" disabled="disabled"  ></input></th>
								<th><input value="'.$row["valor_produto"].' " name="antigo_valor" id="antigo_valor" type="hidden"  ></input></th>
								
						</tr>
						
						
					</table>
							
				
							
							
							
					
					<tr align="center">
					<td colspan="2"><button><input type="submit" value="Adicionar" id="limpar" name="limpar"></button></td>
					</tr>
				
											
							
				</form>
			</div>		
		</center>	';


					} }else{ 
  $sql = "SELECT * FROM produto where nome_produto='{$nome_produto}'";
$result = $conn->query($sql);	
			
         if ($result->num_rows > 0) {
			echo '<div id="formulario">
				<form method="POST" action="adicionarestoque.php">
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
							<th><input disabled="disabled" value="'.$row["saldo_produto"].'"></input></th>
							
						</tr>
						<tr>
							<th><label>Quantidade a adicionar:</label></th>
							<th><input type="text" class="adicionar_produto" id="adicionar_produto" name="adicionar_produto"></input></th>
						</tr>
							
						<tr>
							<th><label>Alterar valor?</label></th>
							<th><label><input id="checkboxvalor" type="checkbox" name="checkboxvalor" onclick="disableMyText()"> </label></th>
						</tr>
						<tr>
								<th><label>Valor Novo:</label></th>
								<th><input id="novo_valor" name="novo_valor" value="'.$row["valor_produto"].'" disabled="disabled" ></input></th>
								<input value="'.$row["valor_produto"].' " name="antigo_valor" id="antigo_valor" type="hidden"  ></input>
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
				<form method="POST" action="adicionarestoque.php">
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