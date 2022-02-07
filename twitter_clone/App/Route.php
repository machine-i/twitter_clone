<?php

	namespace App;

	use MF\Init\Bootstrap; // Temos condições de utilizar os namespaces dessa forma porque configuramos tudo isso no "autoload_psr4.php". Dessa forma todos os scripts estão sendo carregados antes de serem utilizados. Para utilizar, basta então informa o namespace.

	class Route extends Bootstrap {

		protected function initRoutes() {

			$routes['home'] = array(
				'route' => '/',
				'controller' => 'indexController',
				'action' => 'index'
			);

			$routes['inscreverse'] = array(
				'route' => '/inscreverse',
				'controller' => 'indexController',
				'action' => 'inscreverse'
			);

			$routes['registrar'] = array(
				'route' => '/registrar',
				'controller' => 'indexController',
				'action' => 'registrar'
			);

			$routes['autenticar'] = array(
				'route' => '/autenticar',
				'controller' => 'AuthController',
				'action' => 'autenticar'
			);

			$routes['timeline'] = array(
				'route' => '/timeline',
				'controller' => 'AppController',
				'action' => 'timeline'
			);

			$routes['sair'] = array(
				'route' => '/sair',
				'controller' => 'AuthController',
				'action' => 'sair'
			);

			$routes['tweet'] = array(
				'route' => '/tweet',
				'controller' => 'AppController',
				'action' => 'tweet'
			);

			$routes['quem_seguir'] = array(
				'route' => '/quem_seguir',
				'controller' => 'AppController',
				'action' => 'quemSeguir'
			);

			$routes['acao'] = array(
				'route' => '/acao',
				'controller' => 'AppController',
				'action' => 'acao'
			);

			$this->setRoutes($routes);
		}

	}

?>