<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Produto</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarsubcategoria.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
<?php 
    //Recebe os dados com as alterações feitas
	include("../conexao.php");
    $id_subcategoria = $_POST ["id_subcategoria"];
    $novoNome = $_POST ["nome_subcategoria"];
	$id_categoria=$_POST["id_categoria"];
	
	if($id_categoria==0){
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Campo Categoria precisa ser selecionado</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
}else{
	
	
	
	$sql = "SELECT * FROM subcategoria WHERE nome_subcategoria = '{$novoNome}'"; //monto a query


  $query = $conn->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado 
	
		echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>SubCategoria Já Cadastrada</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
	
	
  } else {
	
	
	if(empty($novoNome)){
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Campo Nome da SubCategoria precisa ser preenchido</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
}
else{
	
	

    //Estabelece a conexão com o mysql
    
    
    //Executa a atualização no banco de dados
    $sql = "UPDATE subcategoria SET nome_subcategoria='" . $novoNome . "' WHERE id_subcategoria=".$id_subcategoria ;
	$sqlid = "UPDATE subcategoria SET categoria_id_categoria='" . $id_categoria . "' WHERE id_subcategoria=".$id_subcategoria ;
    $update = mysqli_query($conn, $sql);


    if( !$update ){
        echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Erro na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
        exit;
    }

    
	echo "
		<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Exito na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	
		";
	}	
  }
 }
?>
</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>