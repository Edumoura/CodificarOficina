<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$sql = new Oficina\Db\Sql();
	$resultado = $sql->select("select * from tb_cliente");
	echo json_encode($resultado);

});

$app->run();

 ?>