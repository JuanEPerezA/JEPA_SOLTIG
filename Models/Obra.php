<?php
	class Obra {
		private $conn;

		public function __construct() {
			$this->conn = BD::getInstance()->getConnection();
		}

		public function getObrasDisponibles() {
			$today = date('Y-m-d');
			$sql = "SELECT * FROM OBRA WHERE disponibles > 0 AND fecha_obra > '$today'";
			$result = $this->conn->query($sql);

			$obras = [];
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$obras[] = $row;
				}
			}

			return $obras;
		}

		public function updateDisponibles($cod_obra) {
			$sql = "UPDATE OBRA SET disponibles = disponibles - 1 WHERE cod_obra = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $cod_obra);
			return $stmt->execute();
		}

		public function crearObra($nombre, $aforo, $disponibles, $sala, $fecha_obra) {
			$sql = "INSERT INTO OBRA (nombre, aforo, disponibles, sala, fecha_obra) VALUES (?, ?, ?, ?, ?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("siiss", $nombre, $aforo, $disponibles, $sala, $fecha_obra);
			if ($stmt->execute()) {
				return $this->conn->insert_id;
			}
			return false;
		}
	}
?>
