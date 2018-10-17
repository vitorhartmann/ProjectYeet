<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Alterar Produto</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarproduto.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
		<?php
		include("../conexao.php");

	
	
            //Recebe os dados a serem editados
            $id_produto = $_POST ["id_produto"];
            $nome_produto = $_POST ["nome_produto"];
			$codbarras_produto = $_POST ["codbarras_produto"];
		
			
			
			

			
			
        ?>
		
		<table bgcolor="A9A9A9">
        <form action="salvaproduto.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
			<tr>
				<input  name="id_produto" type="hidden" value="<?php echo $id_produto; ?>">
			</tr>
			<tr>
								<th><label>Codigo de Barras:</label></th>
								<th><input  type="text" value="<?php echo $codbarras_produto;?>" name="codigobarras" id="codigobarras" class="codigobarras"></input></th>
								<input  name="novoCodBarras" type="hidden" value="<?php echo $codbarras_produto; ?>">
			</tr>
			<tr>
								<th><label>Nome do produto:</label></th>
								<th><input type="text" name="nome_produto" value="<?php echo $nome_produto; ?>"></th>
								<input  name="nome_categoria" type="hidden" value="<?php echo $nome_produto; ?>">
							
			</tr>
           
            <tr><th colspan="2"><input type="submit" value="Salvar alterações"></th></tr>
        </form>
		</table>
		
		
		
		</center>
		
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>