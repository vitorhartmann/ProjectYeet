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

include("../conexao.php");






// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
 $codbarrasproduto= $_POST ["codigobarras"];//atribuição do campo "codigobarras" vindo do formulário para variavel
 $nomeproduto= $_POST ["nomedoproduto"];//atribuição do campo "nomedoproduto" vindo do formulário para variavel
$id_subcategoria= $_POST ["nome_subcategoria"];//atribuição do campo "nome_subcategoria" vindo do formulário para variavel

 


 
 $comando="INSERT INTO produto ('nome_produto', 'saldo_produto', 'codbarras_produto',
 'valor_produto', 'subcategoria_id_subcategoria',) VALUES ('{$nomeproduto}', '0', '{$codbarrasproduto}', '0', '{$subcategoria_id_subcategoria}')";
	

	




	
 $resultado=mysqli_query($conn,$comando);
	
	 if($resultado==true){
		echo "
		<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Êxito na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	
		";
	}else{
			
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
	} 



?>

</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>