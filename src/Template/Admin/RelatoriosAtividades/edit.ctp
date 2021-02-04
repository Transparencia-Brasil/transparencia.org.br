			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando Relatorio Atividade: <?=$financiamento->Documento?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($financiamento, ['id'=>'fileupload', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'controller' => 'RelatoriosAtividades']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Ano *</label>
							  <div class="controls">
								<?=$this->Form->text('RelatoriosAtividades.Ano', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Documento *</label>
							  <div class="controls">
								<?=$this->Form->text('RelatoriosAtividades.Documento', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Relatorios">Arquivos</label>
							  <div class="controls">
									<?= $this->element('jqueryupload', array('arquivos' => $financiamento->RelatoriosAtividadesArquivos,'file_path' => $file_path,'show_select' => false)) ?>
							  </div>
							</div>
							<div class="form-actions">
							<?=$this->Form->hidden('RelatoriosAtividades.Codigo', ['class' => 'span6']);?>
							  <button type="submit" class="btn btn-primary">Salvar</button>
							  <button type="button" onclick="history.back(-1)" class="btn">Cancelar</button>
                            </div>
                          </fieldset>
						<?=$this->Form->end();?>
					</div>
				</div>
            </div>