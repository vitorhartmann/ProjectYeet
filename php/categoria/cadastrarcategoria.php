

<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Cadastrar Categoria</h2>
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
				<form method="POST" action="cadastrarcategoriascript.php">
					<table bgcolor="#A9A9A9">
					
							
							
							<tr>
								<th><label>Nome da Categoria:</label></th>
								<th><input class="nome_categoria" id="nome_categoria" name="nome_categoria"></input></th>
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
			
			<center>
			<div id="formulario">
					<table border="1" bgcolor="#A9A9A9">
					
						<tr>
							<th>Código</th>
							<th>Nome da Categoria</th>
	
							<th colspan="2">Ações</th>
						</tr>
						
						
						<?php 
						include ("../conexao.php");
						
						$comando = mysqli_query("Select * From categoria");
						
						$retornartabela = mysqli_query($conexao, $comando);
						
						while ($linha = mysqli_fetch_assoc($retornartabela)) {
							
							$id_categoria = $linha['id_categoria'];
							$nome_categoria = $linha['nome_categoria'];
       
              
            
    }
						
						?>
						<tr>
							<th><?php echo ["id_categoria"]?></th>
							<th><?php echo ["nome_categoria"] ?></th>
							
							
			
							<!-- Botões alterar e excluir -->
							<form method="get" action="alterarproduto.html">
								<th><button><img src="../../img/alterarlapis.png" height="20px" width="20px" ></button></td></th>
							</form>
							<th><button><img src="../../img/excluirbotao.png" height="20px" width="20px" ></button></td></th>
							<!-- Até aqui -->
						</tr>
						
						
		
		</center>
				
			
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>