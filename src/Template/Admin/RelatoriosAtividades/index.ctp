<div class="row-fluid sortable">
<div class="box span12">
  <div class="box-header" data-original-title>
    <h2><i class="halflings-icon user"></i><span class="break"></span>Relatório de Atividade</h2>
    <div class="box-icon">
      <a href="javascript:void(0);" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
    </div>
  </div>
  <div class="box-content">
    <div class="messagesList">
      <span class="title">
        <span class="label label-warning"><?= $this->Flash->render();?></span>
      </span>
    </div>
    <div>
      <a href="<?=$this->Url->build(["controller" => "RelatoriosAtividades", "action" => "edit"]);?>" class="btn btn-primary" type="submit">Novo Relatórios de Atividade</a>
    </div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
      <thead>
        <tr>
          <th>Ano</th>
          <th>Documento</th>
          <th>Downloads</th>
        </tr>
      </thead>   
      <tbody>
      <?php foreach($financiamentos as $financiamento): ?>
      <tr>
        <td><?=$financiamento->Ano ?></td>
        <td><?=$financiamento->Documento ?></td>
        <td class="center">
          <ul>
              <?php
                $arquivos = $financiamento->RelatoriosAtividadesArquivos;
                if (count($arquivos) > 0) {
                  foreach ($arquivos as $arquivo) {
              ?>
                <li><a href="/uploads/relatoriosatividades/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a></li>
              <?php
                  }
                }
              ?>
          </ul>
        </td>
        <td class="center">
          <a class="btn btn-info" href="<?=$this->Url->build(["controller" => "RelatoriosAtividades", "action" => "edit", $financiamento->Codigo]); ?>" title="Editar">
            <i class="halflings-icon white edit"></i>  
          </a>
          <a class="btn btn-danger btn-excluir" href="<?=$this->Url->build(["controller" => "RelatoriosAtividades", "action" => "delete", $financiamento->Codigo]); ?>" title="Excluir">
            <i class="halflings-icon white trash"></i> 
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>            
  </div>
</div>

</div>