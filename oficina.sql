create database oficina;

create table `tb_vendedor`(
`idvendedor` int(11) not null auto_increment,
`nomevendedor` varchar(50) not null,
primary key(`idvendedor`)
)engine=InnoDB auto_increment=8 default charset=utf8;

create table`tb_cliente`(
`idcliente` int(11) not null auto_increment,
`nomeCliente` varchar(50) not null,
primary key(`idcliente`)
)engine=InnoDB auto_increment=8 default charset=utf8;

create table `tb_descricao`(
`iddescricao` int(11) not null auto_increment,
`valorOrcamento` varchar(50) not null,
`valor` decimal(10,2),
primary key(`iddescricao`)
)engine=InnoDB auto_increment=8 default charset=utf8;

create table `tb_orcamento`(
`idorcamento` int(11) not null auto_increment,
`idvendedor` int(11) not null,
`idcliente` int(11) not null,
`iddescricao` int(11) not null,
`dtregister` timestamp not null default current_timestamp,
primary key (`idorcamento`),
key `FK_orcamento_vendedor_idx` (`idvendedor`),
constraint `fk_orcamento_vendedor` foreign key (`idvendedor`) references `tb_vendedor` (`idvendedor`) on delete no action on update no action,
key `FK_orcamento_cliente_idx` (`idcliente`),
constraint `fk_orcamento_cliente` foreign key (`idcliente`) references `tb_cliente` (`idcliente`) on delete no action on update no action,
key `FK_orcamento_descricao_idx` (`iddescricao`),
constraint `fk_orcamento_descricao` foreign key (`iddescricao`) references `tb_descricao` (`iddescricao`) on delete no action on update no action
 
 )engine=InnoDB auto_increment=8 default charset=utf8;
 
 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orcamento_delete`(
pidorcamento INT
)
BEGIN
   
    
    DELETE FROM tb_orcamento WHERE idorcamento = pidorcamento;
    
    
END
 
 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orcamento_save`(
nomeCliente VARCHAR(50), 
nomevendedor VARCHAR(50), 
descricao VARCHAR(50), 
valorOrcamento decimal(10,2)
)
BEGIN
	
    DECLARE idcliente, idvendedor, iddescricao INT;
    
    
	INSERT INTO tb_cliente (nomeCliente)
    VALUES(nomeCliente);    
    SET idcliente = LAST_INSERT_ID();
    
    INSERT INTO tb_vendedor (nomevendedor)
    VALUES(nomevendedor);    
    SET idvendedor = idcliente;
    
     INSERT INTO tb_descricao (descricao, valorOrcamento)
    VALUES(descricao,valorOrcamento);    
    SET iddescricao = idvendedor;
    
    INSERT INTO tb_orcamento (idvendedor, idcliente,iddescricao)
    VALUES(idvendedor,idcliente,iddescricao);
    
    SELECT * FROM tb_orcamento a
    INNER JOIN tb_vendedor b USING(idvendedor)
    INNER JOIN tb_cliente c USING(idcliente)
    INNER JOIN tb_descricao d USING(iddescricao)    
    WHERE a.idorcamento = LAST_INSERT_ID();
    
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orcamentoupadate_save`(
idorcamento INT,
nomeCliente VARCHAR(50), 
nomevendedor VARCHAR(50),  
descricao VARCHAR(50), 
valorOrcamento decimal(10,2)

)
BEGIN
	
   
    UPDATE tb_cliente
    SET 
		nomeCliente = nomeCliente
        
	WHERE idcliente = idorcamento;
    
    UPDATE tb_vendedor
    SET 
		nomevendedor = nomevendedor 
        
	WHERE idvendedor = idorcamento;
    
    UPDATE tb_descricao
    SET
		descricao = descricao,
        valorOrcamento = valorOrcamento
        
	WHERE iddescricao = idorcamento;
    
    SELECT * FROM tb_orcamento a
    INNER JOIN tb_vendedor b USING(idvendedor)
    INNER JOIN tb_cliente c USING(idcliente)
    INNER JOIN tb_descricao d USING(iddescricao)    
    WHERE a.idorcamento = idorcamento;
    

    
END
  


