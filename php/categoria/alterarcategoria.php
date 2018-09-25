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
			<button><a href="../../index.html"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
		
		<?php
			//Fazer IF se id_categoria(banco) é igual ao Id_categoria(a alterar) da subcategoria sendo alterada
              while($resultado = mysqli_fetch_array($sql)){
$selected='';				  
			  if ()
				  $selected='selected';
			  ?>  
		
		<?php echo '<option  value='.$resultado["id_categoria"].' '.$selected.'>'.$resultado['nome_categoria']. '</option>';?>
		
		</center>
		
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>