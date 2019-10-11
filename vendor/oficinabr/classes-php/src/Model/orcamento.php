<?php 

namespace Oficina\Model;

use \Oficina\DB\Sql;
use \Oficina\Model;

class Orcamento extends ModeL{

	public static function listAll()
	{
		$sql = new Sql();

		return $results =  $sql->select("
			 SELECT a.idorcamento, b.nomevendedor,c.nomeCliente, d.descricao, d.valorOrcamento, a.dtregister
			 FROM tb_orcamento a
			 inner join tb_vendedor b Using(idvendedor)
			 inner join tb_cliente c using(idcliente)
			 inner join tb_descricao d using(iddescricao)
		     order by dtregister;");	
	    
	 }


	 public function get($idorcamento){
	 	$sql = new Sql();

	 	$resultado  = $sql->select("
	 	SELECT a.idorcamento, b.nomevendedor,c.nomeCliente, d.descricao, d.valorOrcamento, a.dtregister
	    FROM tb_orcamento a
	    inner join tb_vendedor b Using(idvendedor)
	    inner join tb_cliente c using(idcliente)
		inner join tb_descricao d using(iddescricao)
	    where a.idorcamento = :idorcamento ", array(
	    	":idorcamento"=>$idorcamento
	    ));
	    
	    $this->setData($resultado[0]);
	 }

	 public function save()
	 {
	 	$sql = new Sql();

	 	$resultado = $sql->select("CALL sp_orcamento_save(:nomeCliente, :nomevendedor, :descricao, :valorOrcamento)", array(
			":nomeCliente"=>$this->getnomeCliente(),		
			":nomevendedor"=>$this->getnomevendedor(),
			":descricao"=>$this->getdescricao(),
			":valorOrcamento"=>$this->getvalorOrcamento()
			
		));
		

	 	$this->setData($resultado[0]);

	 }

	 public function update()
	 {
	 	$sql = new Sql();

	 	$resultado = $sql->select("CALL sp_orcamentoupadate_save(:idorcamento,:nomeCliente, :nomevendedor, :descricao, :valorOrcamento)", array(
	 		":idorcamento"=>$this->getidorcamento(),
			":nomeCliente"=>$this->getnomeCliente(),		
			":nomevendedor"=>$this->getnomevendedor(),
			":descricao"=>$this->getdescricao(),
			":valorOrcamento"=>$this->getvalorOrcamento()
			
		));		

	 	$this->setData($resultado[0]);

	 }

	 public function delete(){

	 	$sql = new Sql();
	 	//var_dump($this->getidorcamento());
	 	//exit;

	 	$sql->query("CALL sp_orcamento_delete(:idorcamento)",array(
	 		":idorcamento"=>$this->getidorcamento()
	 	));
	 	



	 }

	 public static function getOrcamentoPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$resultados = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *			
			 FROM tb_orcamento a
			 inner join tb_vendedor b Using(idvendedor)
			 inner join tb_cliente c using(idcliente)
			 inner join tb_descricao d using(iddescricao)
		     order by a.idorcamento ASC
             LIMIT $start, $itemsPerPage;
		");

		$resultadoTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$resultados,
			'total'=>(int)$resultadoTotal[0]["nrtotal"],
			'pages'=>ceil($resultadoTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getOrcamentoPageSearch($search, $page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_orcamento a
			inner join tb_vendedor b Using(idvendedor)
		    inner join tb_cliente c using(idcliente)
		    inner join tb_descricao d using(iddescricao)
		    where b.nomevendedor LIKE :search or c.nomeCliente LIKE :search or a.dtregister LIKE :search 
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}
  }

 ?>