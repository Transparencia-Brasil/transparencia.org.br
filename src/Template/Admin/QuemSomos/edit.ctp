<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Editando Registro de Quem Somos: <?=$quem_somos->Nome?></h2>
      <div class="box-icon"></div>
    </div>

    <div class="box-content">

      <div class="alert-error"><?= $this->Flash->render();?></div>
      <?=$this->Form->create($quem_somos, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
        <fieldset>

          <div class="control-group">
          <label class="control-label" for="CodigoQuemSomosArea">Categorias de Registro de Quem Somos *</label>
          <div class="controls">
          <?=$this->Form->select('QuemSomos.CodigoQuemSomosArea', $areas, ['class' => 'span3']);?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Nome">Nome *</label>
          <div class="controls">
          <?=$this->Form->text('QuemSomos.Nome', ['class' => 'span6']);?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Cargo">Cargo</label>
          <div class="controls">
          <?=$this->Form->text('QuemSomos.Cargo', ['class' => 'span6']);?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Imagem">Imagem</label>
          <div class="controls">
            <?php if (isset($quem_somos->Imagem)): ?>
              <p><b>Nome da imagem atual:
              <a href="<?=BASE_URL.'img/quemsomos/'.$quem_somos->Imagem?>" target="_blank"><?=$quem_somos->Imagem?></a></b></p>
            <?php endif; ?>
          <?=$this->Form->file('QuemSomos.Imagem', ['class' => 'span6', 'readonly' => 'readonly']);?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Resumo">Descrição *</label>
          <div class="controls">
          <?=$this->Form->textarea('QuemSomos.Descricao', ['class' => 'span6']);?>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button type="button" onclick='javascript:history.back(-1);' class="btn">Cancelar</button>
        </div>
        </fieldset>
      <?=$this->Form->end();?>
    </div>
  </div><!--/span-->

</div><!--/row-->
