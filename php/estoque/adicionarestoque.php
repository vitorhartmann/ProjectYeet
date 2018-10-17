<?php 
    //Recebe os dados com as alterações feitas
	include("../conexao.php");
    $id_produto = $_POST ["id_produto"];
	$adicionar_produto = $_POST ["adicionar_produto"];
	$saldo_produto=$_POST["saldo_produto"];
	$saldototal_produto=$adicionar_produto+$saldo_produto ;
	$novo_valor = $_POST ["novo_valor"];
    
	$sql = "UPDATE produto SET saldo_produto='" . $adicionar_produto . "', valor_produto='" . $novo_valor . "'  WHERE id_produto=".$id_produto ;

	
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