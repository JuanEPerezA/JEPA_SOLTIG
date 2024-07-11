<?php
	class Venta {
		private $conn;

		public function __construct() {
			$this->conn = BD::getInstance()->getConnection();
		}

		public function registrarVenta($cod_obra, $comprador) {
			$fecha_compra = date('Y-m-d');
			$sql = "INSERT INTO VENTAS (cod_obra, comprador, fecha_compra) VALUES (?, ?, ?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("iss", $cod_obra, $comprador, $fecha_compra);
			if ($stmt->execute()) {
				return $this->conn->insert_id;
			}
			return false;
		}
	}
?>
