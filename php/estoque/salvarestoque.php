	
			





<script src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Alterar Estoque</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="modificarestoque.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		<br><br><br><br><br><br>
		<center>
<?php
include("../conexao.php");

$saldo_produto=$_POST["saldo_produto"];
$id_produto=$_POST["id_produto"];


$sql = "UPDATE produto SET saldo_produto='" . $saldo_produto . "' WHERE id_produto=".$id_produto ;

 $update = mysqli_query($conn, $sql);
 
  if( !$update ){
        echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Erro na operação </h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
        exit;
    }else{
		   echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Ëxito na operação </h1>
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