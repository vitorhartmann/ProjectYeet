<?php
// Uma forma de obter $_POST['estado'] mais segura
$codCategoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

$sqlSubCategoria = 'SELECT * FROM subcategoria WHERE id_categoria = :codCategoria ORDER BY nome ASC';
$resSubcategoria = $conexao->prepare($sqlSubCategoria);
$resSubcategoria->execute(array(
    ':codCategoria' => $codCategoria
));
$subcategoria = $resSubcategoria->fetchAll();
?>

<?php foreach ($subcategorias as $subcategoria) { ?>
    <option value="<?php echo $subcategoria['id_subcategoria'] ?>"><?php echo $subcategoria['nome_subcategoria'] ?></option>
<?php } ?>