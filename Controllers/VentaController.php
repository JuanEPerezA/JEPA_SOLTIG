<?php
	require_once '../Config/BD.php';
	require_once '../Models/Obra.php';
	require_once '../Models/Venta.php';

    class VentaController {
        public function registrarVenta($cod_obra, $comprador) {
            $obra = new Obra();
            $venta = new Venta();

            if ($venta->registrarVenta($cod_obra, $comprador)) {
                $obra->actualizarDisponibilidad($cod_obra);
                $cantVentas = $venta->ventasObras($cod_obra);
                echo'<script type="text/javascript">
                alert("Compra realizada con éxito. \nNúmero de venta para esta obra: '.$cantVentas.'");
                window.location.href="../index.php";
                </script>';
            } else {
                echo'<script type="text/javascript">
                alert("Error al realizar la compra.");
                </script>';
            }
        }
    }
?>