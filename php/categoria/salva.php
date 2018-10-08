<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Categoria</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarcategoria.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
<?php 
    //Recebe os dados com as alterações feitas
	include("../conexao.php");
    $id_categoria = $_POST ["id_categoria"];
    $novoNome = $_POST ["nome_categoria"];

    //Estabelece a conexão com o mysql
    
    
    //Executa a atualização no banco de dados
    $sql = "UPDATE categoria SET nome_categoria='" . $novoNome . "' WHERE id_categoria=".$id_categoria ;
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
?>
</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>