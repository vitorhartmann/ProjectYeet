
<html>
<head>
</head>
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
			<div id="formulario" onsubmit="return validateForm()" method="post">
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
			<div id="formulario">
					<table border="1" bgcolor="#A9A9A9">
					
						<tr>
							<th>Código</th>
							<th>Nome da Categoria</th>
	
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

						$sql = "SELECT * FROM categoria";
						$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<tr>";
        echo "<td> " . $row["id_categoria"]. "</td>" ;
		echo "<input name='id_categoria' type='hidden' value='" .$row['id_categoria']. "'>";
		echo "<td> " . $row["nome_categoria"]. "</td>";
		
							echo "<form action='alterarcategoria.php' method='post'>";
							echo '<th><button href="alterarcategoria.php?id_categoria=$id_categoria"><img src="../../img/alterarlapis.png" height="20px" width="20px" ></button></td></th>';
							echo "<input name='nome_categoria' type='hidden' value='" .$row['nome_categoria']. "'>";
							echo "<input name='id_categoria' type='hidden' value='" .$row['id_categoria']. "'>";
							echo '</form>';
							
							 echo "<form action='removecategoria.php' method='post'>";						
							echo '<th><button><img src="../../img/excluirbotao.png" height="20px" width="20px" ></button></td></th>';
							echo "<input name='id_categoria' type='hidden' value='" .$row['id_categoria']. "'>";
							echo "</form>";
							
						echo '</tr>';
		
		echo "</tr>";
		
		
		
    }
} else {
    echo "0 results";
}
$conn->close();
?>				
						

						
						
		
		</center>
				
			
	



	</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>

