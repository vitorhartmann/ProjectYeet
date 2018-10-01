<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Cadastrar Subcategoria</h2>
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
				<form method="POST" action="cadastrarsubcategoriascript.php">
					<table bgcolor="#A9A9A9">
							<th>Categoria:</th>
							<th>
									
									
		
    <?php 
		
		include("../conexao.php");
						
        $sql  = mysqli_query($conn, "select * from categoria");?>
		
            <select name="id_categoria">
			<option value="0"></option>
			<?php
			//Fazer IF se id_categoria(banco) é igual ao Id_categoria(a alterar) da subcategoria sendo alterada
              while($resultado = mysqli_fetch_array($sql)){ ?>     
                  <?php echo '<option  value='.$resultado["id_categoria"].' >'.$resultado['nome_categoria']. '</option>';?>
                  <?php } ?>
            </select>
   

	

									
							</th>
							
							<tr>
								<th><label>Nome da Subcategoria:</label></th>
								<th><input class="nome_subcategoria" id="nome_subcategoria" name="nome_subcategoria"></input></th>
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
			<div id="formulario">
				
					<table border="1" bgcolor="#A9A9A9">
					
						<tr>
							<th>Código</th>
							<th>Nome da Categoria</th>
							<th>Nome da SubCategoria</th>
	
							<th colspan="2">Ações</th>
						</tr>
						
						<?php
						$servername = "localhost";
						$username = "root";
						$password = "root";
						$dbname = "yeet";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 

			
						$innerjoin="  SELECT * FROM categoria INNER JOIN subcategoria ON categoria.id_categoria = subcategoria.categoria_id_categoria";   
						
						$result = $conn->query($innerjoin);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td> " . $row["id_subcategoria"]. "</td>" ;
		echo "<td> " . $row["nome_categoria"]. "</td>";
		echo "<td> " . $row["nome_subcategoria"]. "</td>";
							echo "<form method='post' action='alterarsubcategoria.php'>";
							echo "<th><button><img src='../../img/alterarlapis.png' height='20px' width='20px' ></button></td></th>";
							echo "</form>";
							
							echo "<form action='remove.php' method='post'></form>";
							echo "<th><button><img src='../../img/excluirbotao.png' height='20px width='20px' ></button></td></th>";
							echo "<input name='id_subcategoria' type='hidden' value=''" .$row['id_subcategoria']. "'>";
							echo "</form>";
						echo "</tr>";
		
		
		
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>	
			
						
						
							
							
							
							
					</table>
				</form>
			</div>

		
		</center>
				
			
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>