			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando mídia: <?=$midia->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($midia, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Midias.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Título">Título *</label>
							  <div class="controls">
								<?=$this->Form->text('Midias.Titulo', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Arquivo">Arquivo *</label>
							  <div class="controls">
							  	<?php if (isset($midia->Arquivo)): ?>
							  		<p><b>Nome do arquivo atual: <a href='<?=$this->Url->build('/downloads/midias/', true)?>'><?=$midia->Arquivo?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Midias.Arquivo', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoMidiaTipo">Tipo de mídia *</label>
							  <div class="controls">
								<?=$this->Form->select('Midias.CodigoMidiaTipo', $tipos, ['class' => 'span4']);?>
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