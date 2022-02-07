<?php

	namespace MF\Controller;

	abstract class Action {

		protected $view;

		public function __construct() {
			$this->view = new \stdClass(); // stdClass() -> classe nativa do php, com ela é possível criar objetos padrões, podemos criar objetos vazios que poderam ser dinamicamente compostos de atributos durante a lógica de processamento da nossa aplicação.
		}

		protected function render($view, $layout = 'layout') {
			$this->view->page = $view;

			if(file_exists("../twitter_clone/App/Views/".$layout.".phtml")) {
				require_once "../twitter_clone/App/Views/".$layout.".phtml"; // A partir da "index.php".
			} else {
				$this->content();
			} 
		}

		protected function content() {
			$classAtual = get_class($this); // Pega a partir do nome da classe, o caminho para o seu diretório.

			$classAtual = str_replace('App\\Controllers\\', '', $classAtual); // Obtem apenas o nome da classe.

			$classAtual = strtolower(str_replace('Controller', '', $classAtual)); // Obtem o nome do diretório da 'Views' em caixa baixa que será executado a '$view'.

			require_once "../twitter_clone/App/Views/".$classAtual."/".$this->view->page.".phtml"; //Partimos de "index.php", devido a tudo ser carregado na "index.php" no diretório "public" com o "autoload_psr4".
		}
	}

?>