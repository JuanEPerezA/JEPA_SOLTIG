<?php
	class BD {
		private static $instance = null;
		private $conn;

		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $name = 'TEATRO';

		private function __construct() {
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

			if ($this->conn->connect_error) {
				die("Error en conexión: " . $this->conn->connect_error);
			}
		}

		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new BD();
			}

			return self::$instance;
		}

		public function getConnection() {
			return $this->conn;
		}
	}
?>
