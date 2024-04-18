			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando Financiamento: <?=$financiamento->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($financiamento, ['id'=>'fileupload', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'controller' => 'Financiamentos']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Fonte de Financiamento *</label>
							  <div class="controls">
								<?=$this->Form->text('Financiamentos.FonteDeFinanciamento', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Valor *</label>
							  <div class="controls">
								<?=$this->Form->text('Financiamentos.Valor', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Período *</label>
							  <div class="controls">
									<?=$this->Form->text('Financiamentos.Periodo', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Tipo *</label>
							  <div class="controls">
									<?=$this->Form->text('Financiamentos.Tipo', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Tipo Link*</label>
							  <div class="controls">
									<?=$this->Form->text('Financiamentos.TipoLink', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Objeto">Objeto</label>
							  <div class="controls">
									<?=$this->Form->textarea('Financiamentos.Objeto', ['class' => 'span6']);?>
							  </div>
							</div>							
							<div class="control-group">
							  <label class="control-label" for="Relatorios">Arquivos</label>
							  <div class="controls">
									<?= $this->element('jqueryupload', array('arquivos' => $financiamento->FinanciamentosArquivos,'file_path' => $file_path,'show_select' => true)) ?>
							  </div>
							</div>
							<div class="form-actions">
							<?=$this->Form->hidden('Financiamentos.Codigo', ['class' => 'span6']);?>
							  <button type="submit" class="btn btn-primary">Salvar</button>
							  <button type="button" onclick="history.back(-1)" class="btn">Cancelar</button>
                            </div>
                          </fieldset>
						<?=$this->Form->end();?>
					</div>
				</div>
            </div>