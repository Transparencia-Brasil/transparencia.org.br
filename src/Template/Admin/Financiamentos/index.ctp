<div class="row-fluid sortable">
<div class="box span12">
  <div class="box-header" data-original-title>
    <h2><i class="halflings-icon user"></i><span class="break"></span>Financiamentos</h2>
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
      <a href="<?=$this->Url->build(["controller" => "Financiamentos", "action" => "edit"]);?>" class="btn btn-primary" type="submit">Novo financiamento</a>
    </div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
      <thead>
        <tr>
          <th>Fonte de financiamento</th>
          <th>Valor</th>
          <th>Período</th>
          <th>Relatórios</th>
          <th>Termo de doação</th>
          <th>Tipo</th>
          <th>Ações</th>
        </tr>
      </thead>   
      <tbody>
      <?php foreach($financiamentos as $financiamento): ?>
      <tr>
        <td><?=$financiamento->FonteDeFinanciamento ?></td>
        <td><?=$financiamento->Valor ?></td>
        <td class="center"><?=$financiamento->Periodo ?></td>
        <td class="center">
          <ul>
              <?php
                $arquivos = $financiamento->FinanciamentosArquivos;
                if (count($arquivos) > 0) {
                  foreach ($arquivos as $arquivo) {
                    if ($arquivo->Tipo == 'relatorio') {
              ?>
                <li><a href="/uploads/financiamentos/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a></li>
              <?php
                    }
                  }
                }
              ?>
          </ul>
        </td>
        <td>
          <ul>
              <?php
                $arquivos = $financiamento->FinanciamentosArquivos;
                if (count($arquivos) > 0) {
                  foreach ($arquivos as $arquivo) {
                    if ($arquivo->Tipo == 'termo-de-doacao') {
              ?>
                 <li><a href="/uploads/financiamentos/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a></li>
              <?php
                    }
                  }
                }
              ?>
          </ul>
        </td>
        <td>
          <a href="<?=$financiamento->TipoLink?>" target="_blank"><?=$financiamento->Tipo?></a>
        </td>
        <td class="center">
          <a class="btn btn-info" href="<?=$this->Url->build(["controller" => "Financiamentos", "action" => "edit", $financiamento->Codigo]); ?>" title="Editar">
            <i class="halflings-icon white edit"></i>  
          </a>
          <a class="btn btn-danger btn-excluir" href="<?=$this->Url->build(["controller" => "Financiamentos", "action" => "delete", $financiamento->Codigo]); ?>" title="Excluir">
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