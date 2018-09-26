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
        header("Location:href='../../erro.html");
        exit;
    }

    
	header("Location:../../sucesso.html");
?>