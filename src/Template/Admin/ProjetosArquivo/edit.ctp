			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando arquivo de projeto: <?=$projetoArquivo->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($projetoArquivo, ['class' => 'form-horizontal',  'enctype' => 'multipart/form-data']) ?>
						  <input type="hidden" value="<?=$projeto->Codigo?>" name="ProjetosArquivo.CodigoProjeto" id="ProjetosArquivo.CodigoProjeto" />
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('ProjetosArquivo.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Arquivo">Arquivo *</label>
							  <div class="controls">
							  	<?php if (isset($projetoArquivo->Arquivo)): ?>
							  		<p><b>Nome da imagem atual: <a href='<?=$this->Url->build('/downloads/projetos/arquivos/' . $projetoArquivo->Arquivo, true)?>' target='_blank'><?=$projetoArquivo->Arquivo?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('ProjetosArquivo.Arquivo', ['class' => 'span3', 'readonly' => 'readonly']);?>
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