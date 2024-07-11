<?php
    include '../Components/Head.php';
	require_once '../Config/BD.php';
	require_once '../Controllers/VentaController.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$controller = new VentaController();
		$registrarVenta = $controller->registrarVenta($_POST['cod_obra'], $_POST['comprador']);
	} else {
		$cod_obra = $_GET['cod_obra'];
	}
?>

    <h1 class="text-center">Comprar Entrada</h1>
    <form action="venta.php" method="POST">
		<input type="hidden" name="cod_obra" value="<?php echo $cod_obra; ?>">
        <div class="input-group mb-3">
            <span class="input-group-text text-bg-dark" for="comprador" id="comprador">Identificación del Comprador</span>
            <input type='number' id='comprador' name='comprador' class='form-control' required/>
            <button type="submit" class="btn btn-success">Comprar</button>
        </div>
    </form>

<?php include '../Components/BodyHtml.php'; ?>