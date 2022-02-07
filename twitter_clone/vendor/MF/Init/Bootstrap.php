<?php

	namespace MF\Init;

	//A diferença desse tipo de classe, é que a classe abstrata não pode ser instanciada, podendo ser somente herdada.
	abstract class Bootstrap {
		private $routes;

		abstract protected function initRoutes(); //quando herdado, deve ser implementado na classe filha.

		public function __construct() {
			$this->initRoutes();
			$this->run($this->getUrl());
		}

		public function getRoutes() {
			return $this->routes;
		}

		public function setRoutes(array $routes) {
			$this->routes = $routes;
		}

		protected function run($url) {
			foreach($this->getRoutes() as $key => $route) {
				if($url == $route['route']) {
					//Barras duplas (\\) devido a primeira barra (\) servir para espacar a barra seguinte (\), para que essa instrução funcione como namespace após a interpretação dessa função.
					//Namespace para instância dinâmica de IndexController, podemos fazer isso devido ao autoload (psr4) do composer.
					//ucfirst() -> utilizado para que o primeiro caracter da string "indexController" seja transformado em maiúsculo, ficando igual a classe "IndexController".
					$class = "App\\Controllers\\".ucfirst($route['controller']);

					$controller = new $class; //App\Controllers\IndexController

					$action = $route['action'];

					//Há um método na classe "IndexController", no diretório "Controllers", que se chama "sobreNos()". Sendo assim, quando chamarmos a instância da classe "IndexController", chamaremos o método que possui o mesmo nome do "$action" capturado do índice "action" do array "$route", que é um dos array dentro do array capturado no retorno do método "getRoutes()", chamado no "foreach()", cujo retorno é o atributo privado "$routes" que é criado no método "initRoutes()", o qual é executado na intância da classe "Route", em "Route.php" (utilizando o __construct()), no script "index.php".
					$controller->$action(); //() -> para que o interpretador do PHP entenda que precisa diparar essa instrução como função. Seria como se passasse o método "sobreNos()" da classe "IndexController" diretamente.
				}
			}
		}

		protected function getUrl() {
			//$_SERVER -> super global do php que retorna todos os detalhes do servidor da aplicação (retorna como array).
			//REQUEST_URI -> um dos índices da super global que possui como valor qual página o usuário se encontra.
			//parse_url() -> função que recebe uma url, interpreta essa url e retorna o seus respectivos componentes. Retorna um array, detalhando quais são os componentes da URL.
			//PHP_URL_PATH -> constante, que quando submetida para o "parse_url()" faz com que o retorno seja apenas a string relativa ao path.
			return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
		}
	}

?>