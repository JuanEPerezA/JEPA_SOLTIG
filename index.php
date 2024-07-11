<?php
    include 'Components/Head.php';
	require_once 'Config/BD.php';
	require_once 'Controllers/ObraController.php';

    $controller = new ObraController();
    $obrasDisponibles = $controller->listarObras();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$registrarObra = $controller->registrarObra($_POST['nombre'], $_POST['aforo'], $_POST['aforo'], $_POST['sala'], $_POST['fecha_obra']);
	}
?>

        <h1 class="text-center">Obras de Teatro Disponibles</h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#crearObra">Crear Obra</button>

        <div class="row">
            <?php foreach ($obrasDisponibles as $obra): ?>
            <div class="col-12 col-md-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h5 class="card-title text-center font-weight-bold"><?php echo $obra['nombre']; ?></h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><span class="fw-bold">Fecha de la obra: </span><?php echo $obra['fecha_obra']; ?></li>
                            <li><span class="fw-bold">Aforo: </span><?php echo $obra['aforo']; ?></li>
                            <li><span class="fw-bold">Boletos disponibles: </span><?php echo $obra['disponibles']; ?></li>
                            <li><span class="fw-bold">Sala: </span><?php echo $obra['sala']; ?></li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-success" href="Views/venta.php?cod_obra=<?php echo $obra['cod_obra']; ?>">Comprar</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="crearObra" tabindex="-1" aria-labelledby="crearObraLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="crearObraLabel">Crear Obra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text text-bg-dark" id="txtObra">Nombre</span>
                            <input type='text' id='txtObra' name='nombre' class='form-control' placeholder="Nombre de la Obra" aria-describedby="txtObra" required/>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-bg-dark" id="txtAforo">Aforo</span>
                            <input type='number' id='txtAforo' name="aforo" class='form-control' placeholder="Aforo" aria-describedby="txtAforo" required min="1"/>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-bg-dark" id="txtSala">Sala</span>
                            <input type='text' id='txtSala' name="sala" class='form-control' placeholder="Nombre de la Sala" aria-describedby="txtSala" required/>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-bg-dark" id="txtFecha">Fecha de la obra</span>
                            <input type='datetime-local' id="txtFecha" name="fecha_obra" class="form-control" onchange="validarFecha(this)" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

<script>
    function validarFecha(fechaInput) {
        const fechaSeleccionada = new Date(fechaInput.value);
        const fechaActual = new Date();

        if (fechaSeleccionada <= fechaActual) {
            alert('La fecha y hora deben ser mayores a la actual');
            fechaInput.setCustomValidity('La fecha y hora deben ser mayores a la actual');
            fechaInput.value='';
        } else {
            fechaInput.setCustomValidity('');
        }
    }
</script>

<?php include 'Components/BodyHtml.php'; ?>