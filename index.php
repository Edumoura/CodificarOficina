<?php 

require_once("vendor/autoload.php");
use \Oficina\Page;
use \Oficina\Model\orcamento;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$paginacao = Orcamento::getOrcamentoPageSearch($search,$page);
		

	} else {

		$paginacao = Orcamento::getOrcamentoPage($page);

	}


	
	$pages = [];

	for ($x = 0; $x < $paginacao['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}
	

	$page = new Page();

	$page->setTpl("index",[
		'orcamento'=>$paginacao['data'],
		'search'=>$search,
		'page'=>$pages
	]);    

});


$app->get("/orcamentoCadastro", function(){

	$page = new Page();

	$page->setTpl("orcamentoCadastro");

});

$app->get("/orcamentoCadastro/:ididorcamento/delete", function($ididorcamento){

	$orcamento = new Orcamento();

	$orcamento->get((int)$ididorcamento);	
	//var_dump($orcamento);
	//exit;
	
	$orcamento->delete();

	header("Location: /");
	exit;


});

$app->get("/orcamentoCadastro/update/:ididorcamento", function($idorcamento){

	$orcamento = new Orcamento();

	$orcamento->get((int)$idorcamento);

	$orcamento->setData($_POST);
	//var_dump($orcamento);
	//exit;

	$page = new Page();

	
	$page->setTpl("orcamentoCadastroUpdate", array(
		"orcamentocadastro"=>$orcamento->getValues()
	));

});


$app->post("/orcamentoCadastro", function(){

	$orcamento = new Orcamento();

	$orcamento->setData($_POST);
	//var_dump($orcamento);
	//exit;

	$orcamento->save();

	header("Location: /");
	exit;

});

$app->post("/orcamentoCadastro/update/:ididorcamento", function($idorcamento){

	$orcamento = new Orcamento();

	$orcamento->get((int)$idorcamento);

	$orcamento->setData($_POST);
	
	$orcamento->update();

	header("Location: /");
	exit;

});

$app->run();

 ?>