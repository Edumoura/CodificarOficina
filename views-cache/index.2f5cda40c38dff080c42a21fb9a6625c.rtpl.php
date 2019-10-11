<?php if(!class_exists('Rain\Tpl')){exit;}?>  

  <div class="content-wrapper">
  <div class="content-header">
    <h1>
      Lista de Orçamentos
    </h1>    
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">            
              <div class="box-searchbar">
                <a href="/orcamentoCadastro" class="btn btn-success">Cadastrar Orçamento</a>
                <div class="searchbar">
                <form action="/">
                  <div class="input-group input-group-sm" style="width: 170px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="encontrar orçamento..." value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>             
              </div>

              <div class="box-body no-padding">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Cliente</th>
                      <th>Vendedor</th>
                      <th>Data</th>
                      <th>Descrição</th>
                      <th>Valor orçado(R$)</th>
                     
                      <th style="width: 240px">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $counter1=-1;  if( isset($orcamento) && ( is_array($orcamento) || $orcamento instanceof Traversable ) && sizeof($orcamento) ) foreach( $orcamento as $key1 => $value1 ){ $counter1++; ?>
                    <tr>
                      <td><?php echo htmlspecialchars( $value1["idorcamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                      <td><?php echo htmlspecialchars( $value1["nomeCliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                      <td><?php echo htmlspecialchars( $value1["nomevendedor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                      <td><?php echo htmlspecialchars( $value1["dtregister"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                      <td><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/> 
                      <td><?php echo htmlspecialchars( $value1["valorOrcamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                      <td>
                      <a href="/orcamentoCadastro/update/<?php echo htmlspecialchars( $value1["idorcamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                         
                      <a href="/orcamentoCadastro/<?php echo htmlspecialchars( $value1["idorcamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                                        
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div> 
              <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($page) && ( is_array($page) || $page instanceof Traversable ) && sizeof($page) ) foreach( $page as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>       
            </div>
      </div>
    </div>
  </div>
  </div>