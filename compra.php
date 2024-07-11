<?php
    include 'Components/Head.php';
	require_once 'Config/BD.php';
	require_once 'Models/Obra.php';
	require_once 'Models/Venta.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$cod_obra = $_POST['cod_obra'];
		$comprador = $_POST['comprador'];

		$obra = new Obra();
		$venta = new Venta();

		if ($venta_id = $venta->registrarVenta($cod_obra, $comprador)) {
			$obra->updateDisponibles($cod_obra);
            echo'<script type="text/javascript">
            alert("Compra realizada con éxito. \nNúmero de venta: '.$venta_id.'");
            window.location.href="index.php";
            </script>';
		} else {
			echo "Error al realizar la compra.";
		}
	} else {
		$cod_obra = $_GET['cod_obra'];
	}
?>

    <h1 class="text-center">Comprar Entrada</h1>
    <form action="compra.php" method="POST">
        <div class="input-group mb-3">
        <input type="hidden" name="cod_obra" value="<?php echo $cod_obra; ?>">
            <span class="input-group-text text-bg-dark" for="comprador" id="comprador">Identificación del Comprador</span>
            <input type='number' id='comprador' name='comprador' class='form-control' required/>
            <button type="submit" class="btn btn-success">Comprar</button>
        </div>
    </form>

<?php include 'Components/BodyHtml.php'; ?>