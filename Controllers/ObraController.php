<?php
	require_once './Config/BD.php';
	require_once './Models/Obra.php';

    class ObraController {
        public function listarObras() {
            $obra = new Obra();
            return $obra->listarObrasDisponibles();
        }

        public function registrarObra($nombre, $aforo, $disponibilidad, $sala, $fecha_obra) {
            $obra = new Obra();
    
            if ($obra->crearObra($nombre, $aforo, $disponibilidad, $sala, $fecha_obra)) {
                echo'<script type="text/javascript">
                alert("Obra creada exitosamente");
                window.location.href="index.php";
                </script>';
            } else {
                echo'<script type="text/javascript">
                alert("Error al registrar la obra.");
                </script>';
            }
        }
    }
?>