<?php
include("../conexao.php");
// Uma forma de obter $_POST['categoria'] mais segura
$codCategoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

echo $sqlSubCategoria = 'SELECT * FROM subcategoria WHERE categoria_id_categoria = '.$codCategoria.' ORDER BY nome_subcategoria ASC';


?>
<?php 
$resSubcategoria = mysqli_query($conn,$sqlSubCategoria);

while($subcategoria = mysqli_fetch_array($resSubcategoria)){?>
    <option value="<?php echo $subcategoria['id_subcategoria'] ?>"><?php echo $subcategoria['nome_subcategoria'] ?></option>
<?php } ?>