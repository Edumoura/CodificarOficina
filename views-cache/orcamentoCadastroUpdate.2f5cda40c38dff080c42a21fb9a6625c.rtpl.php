<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
<div class="content-header">
  <h1>
    Lista de Cadastro
  </h1>
</div>


<div class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Cadastro</h3>
        </div>
        
        <form role="form" action="/orcamentoCadastro/update/<?php echo htmlspecialchars( $orcamentocadastro["idorcamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nomeCliente">Cliente</label>
              <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Digite o nome do cliente" value="<?php echo htmlspecialchars( $orcamentocadastro["nomeCliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          
          <div class="box-body">
            <div class="form-group">
              <label for="nomeCliente">Descrição</label>
              <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição" value="<?php echo htmlspecialchars( $orcamentocadastro["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="nomeCliente">Valor orçado</label>
              <input type="text" class="form-control" id="valorOrcamento" name="valorOrcamento" placeholder="Digite o Valor" value="<?php echo htmlspecialchars( $orcamentocadastro["valorOrcamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</div>
</div>
