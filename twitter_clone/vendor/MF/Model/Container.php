<?php

	namespace MF\Model;

	use App\Connection;

	class Container {

		public static function getModel($model) {

			$class = "\\App\\Models\\".ucfirst($model);

			//instância de conexão (instância do PDO)
			$conn = Connection::getDb(); //É possível chamar o método diretamente com o '::' devido ao mesmo ser um método estático.

			return new $class($conn);
		}
	}

?>