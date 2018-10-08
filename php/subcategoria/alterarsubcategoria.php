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
         
		$comando=mysqli_query($conn, "select categoria.*,id_subcategoria,nome_subcategoria from subcategoria
		INNER JOIN categoria ON categoria.id_categoria = subcategoria.categoria_id_categoria where id_subcategoria=".$id_subcategoria);
		 while($resultado = mysqli_fetch_array($comando)){
		$id_categoria=$resultado["id_categoria"];
		$nome_subcategoria=$resultado["nome_subcategoria"];		
		 }
		
		
		
		
		
		
		
		
		 $sql  = mysqli_query($conn, "select * from categoria");
		 ?>
		
       
		
		
		
		
		

		
		<table bgcolor="A9A9A9">
        <form action="salvasubcategoria.php" method="post">
            <tr>
				<th><label>Nome da Categoria:</label></th>
				<th>
				     <select name="id_categoria">
			<option value="0"></option>
			<?php
			//Fazer IF se id_categoria(banco) é igual ao Id_categoria(a alterar) da subcategoria sendo alterada
              while($resultado = mysqli_fetch_array($sql)){ 
					$selected='';				  
			  if ($resultado["id_categoria"]==$id_categoria)
				  $selected='selected';
                   echo '<option  value='.$resultado["id_categoria"].' '.$selected.'  >'.$resultado['nome_categoria']. '</option>';
          } ?>
            </select>
				</th>
			</tr>
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