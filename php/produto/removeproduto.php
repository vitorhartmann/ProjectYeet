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
			<button><a href="cadastrarproduto.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>

<?php 
    //Recebe os dados com as alterações feitas
	include("../conexao.php");
    $id_produto = $_POST ["id_produto"];
    

    //Estabelece a conexão com o mysql
    
    
    //Executa a atualização no banco de dados
    $sql = 'DELETE FROM produto  WHERE id_produto='.$id_produto ;
    $update = mysqli_query($conn, $sql);


    if( !$update ){
        echo "<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Erro na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	";
    }else{

    
	echo "<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Êxito na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	";
	}
?>
</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>