<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Alterar Categoria</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarcategoria.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
		
		<?php
		include("../conexao.php");

	
	
            //Recebe os dados a serem editados
            $id_categoria = $_POST ["id_categoria"];
            $nome_categoria = $_POST ["nome_categoria"];
		
			
			
			

			
			
        ?>
		
        <table bgcolor="A9A9A9">
        <form action="salva.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
			<tr>
								<th><label>Nome da Categoria:</label></th>
								<th><input type="text" name="nome_categoria" value="<?php echo $nome_categoria; ?>"></th>
								<input  name="id_categoria" type="hidden" value="<?php echo $id_categoria; ?>">
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