<?php

	namespace App;

	class Connection {
		
		public static function getDb() { //Podemos chamar o método diretamente usando o "::", devido ao mesmo ser um método estático.
			try {

				$conn = new \PDO( // '\' para que seja utilizado o namespace raiz e não o namespace 'App'.
					"mysql:host=localhost;dbname=twitter_clone;charset=utf8",
					"root",
					""
				);

				return $conn;

			} catch(\PDOException $e) { // '\' para que seja utilizado o namespace raiz e não o namespace 'App'.
				//... tratar o erro de alguma forma ...//
			}
		} 
	}

?>