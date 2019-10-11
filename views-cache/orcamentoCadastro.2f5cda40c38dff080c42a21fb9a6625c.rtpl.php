<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><h1>Cadastro Orçamento</h1></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/orcamentoCadastro" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nomeCliente">Cliente</label>
              <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Digite o nome do cliente">
            </div>
            <div class="form-group">
              <label for="nomevendedor">Vendedor</label>
              <input type="text" class="form-control" id="nomevendedor" name="nomevendedor" placeholder="Digite o nome do Vendedor">
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição ">
            </div>
                        
            <div class="form-group">
              <label for="valorOrcamento">Valor orçado</label>
              <input type="tel" class="form-control" id="valorOrcamento" name="valorOrcamento" placeholder="Digite o Valor">
            </div>
            
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>

</div>
