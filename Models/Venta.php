<?php
	class Venta {
		private $conn;

		public function __construct() {
			$this->conn = BD::getInstance()->getConnection();
		}

		public function ventasObras($cod_obra) {
			$sql = "SELECT COUNT(*) cant FROM `ventas` WHERE cod_obra=$cod_obra GROUP BY cod_obra;";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row['cant'];
			} else {
				return 0;
			}
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
