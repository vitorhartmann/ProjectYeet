<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Alterar Sub Categoria</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarsubcategoria.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
		
		
		
		
		
		
		
		
		
		<?php
			include("../conexao.php");
			
		 $id_subcategoria = $_POST ["id_subcategoria"];
         $nome_subcategoria = $_POST ["nome_subcategoria"];
		
		
		
		
			//Fazer IF se id_categoria(banco) é igual ao Id_categoria(a alterar) da subcategoria sendo alterada
             // while($resultado = mysqli_fetch_array($sql)){
			//$selected='';				  
			  //if (1==1):
				//  $selected='selected';
			  ?>  
		
		<?php //echo '<!-- <option  value='.$resultado["id_categoria"].' '.$selected.'>'.$resultado['nome_categoria']. --> '</option>';?>
		
		
		<table bgcolor="A9A9A9">
        <form action="salva.php" method="post">
            
			<tr>
								<th><label>Nome da SubCategoria:</label></th>
								<th><input type="text" name="nome_subcategoria" value="<?php echo $nome_subcategoria; ?>"></th>
								<input  name="id_subcategoria" type="hidden" value="<?php echo $id_subcategoria; ?>">
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