<?php 
	// Require composer autoloader
	require __DIR__ . '/vendor/autoload.php';

	// Create Router instance
	$router = new \Bramus\Router\Router();

	$router->get('/', function() {
	    require_once('resources/views/services.php');
	});

	$router->get('/fetch', '\Sinap\Group\Controller\ServicosController@getServicos');

	$router->get('/items', '\Sinap\Group\Controller\ServicosController@getItems');

	$router->post('/actualizar', '\Sinap\Group\Controller\ServicosController@putItems');

	$router->post('/actualizarPreco', '\Sinap\Group\Controller\ServicosController@putPrecoSemIva');

	$router->get('/custosIndirectos', '\Sinap\Group\Controller\ServicosController@custoK');

	$router->post('/maoObra', '\Sinap\Group\Controller\MaoObraController@create');

    $router->get('/obterMaoObra', '\Sinap\Group\Controller\MaoObraController@getMaoObra');

	$router->post('/equipamentoProprio', '\Sinap\Group\Controller\EquipamentoController@createProprio');

    $router->get('/obterEquipamentoProprio', '\Sinap\Group\Controller\EquipamentoController@getOwnEquipament');

    $router->post('/equipamentoAlugado', '\Sinap\Group\Controller\EquipamentoController@createAlugado');

    $router->get('/obterEquipamentoAlugado', '\Sinap\Group\Controller\EquipamentoController@getRentedEquipament');

	$router->post('/openProject', '\Sinap\Group\Controller\ProjectosController@getProject');

	$router->post('/guardarProjecto', '\Sinap\Group\Controller\ProjectosController@createProject');

    $router->post('/openServices', '\Sinap\Group\Controller\ProjectosController@getServices');

	// Run it!
	$router->run();
?>