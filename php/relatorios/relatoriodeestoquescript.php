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
			<button><a href="relatoriodeestoque.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<center>
		<?php
		$saldo_produto=$_POST['saldo_produto'];
		?>
		<form method="POST" action="relatoriodeestoquescript.php">
		<table border="1" bgcolor="#A9A9A9">
		
					<tr>
						<th>Valor em Estoque menor a:</th>
						<th><input name="saldo_produto" value="<?php echo $saldo_produto; ?>" id="saldo_produto"></input></th>
					</tr>
					
					<!--Botão de Enviar -->
					<tr align="center">
						<td colspan="2"><button><input type="submit" value="Pesquisar" id="limpar" name="limpar"></button></td>
					</tr>
		</center>
		</table>
		</form>
			<?php
			include("../conexao.php");
			$saldo_produto=$_POST['saldo_produto'];
		 $sql = "SELECT * FROM produto where saldo_produto<='{$saldo_produto}'";
$result = $conn->query($sql);

if( $result->num_rows > 0 ) {//se retornar algum resultado 
            echo '<div id="formulario">
				<form method="POST" action="">
					<table bgcolor="#A9A9A9" border="1">
					<tr>
					<th><label>Código de Barras: </label></th>
					<th><label>Nome do Produto:</label></th>
					<th><label>Quantidade em estoque: </label></th>
					
					</tr>
					'; while($row = $result->fetch_assoc()) { echo' 
						"<input name="id_produto" type="hidden" value=' .$row["id_produto"]. '>";
						<tr>
							
							
							<th><input  value="'.$row["codbarras_produto"].'" disabled="disabled" class="codbarras_produto" id="codbarras_produto" name="codbarras_produto"></input></th>
						
							
						
			
							
							<th><input value="'.$row["nome_produto"].'  " disabled="disabled" "class="nome_produto" id="nome_produto" name="nome_produto"></input></th>
						
						
							
							
							<th><input name="saldo_produto" id="saldo_produto"  disabled value="'.$row["saldo_produto"].'"></input></th>
							
						</tr>
						
					
				
											
							
				</form>
			</div>		
		</center>	';} }else{
			 echo' 
			 <form method="POST" action="">
					<table bgcolor="#A9A9A9" border="1">
					<tr>
					<th><label>Código de Barras: </label></th>
					<th><label>Nome do Produto:</label></th>
					<th><label>Quantidade em estoque: </label></th>
					
					</tr>
						"<input name="id_produto" type="hidden" value="">";
						<tr>
							
							
							<th><input  value="Nenhum Resultado" disabled="disabled" class="codbarras_produto" id="codbarras_produto" name="codbarras_produto"></input></th>
						
							
						
			
							
							<th><input value="Nenhum Resultado" disabled="disabled" "class="nome_produto" id="nome_produto" name="nome_produto"></input></th>
						
						
							
							
							<th><input name="saldo_produto" id="saldo_produto"  disabled value="Nenhum Resultado"></input></th>
							
						</tr>
						
					
				
											
							
				</form>
			</div>		
		</center>	';}
			

			
			
			
			
			?>
		<br>
			
			










		</center>
	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>