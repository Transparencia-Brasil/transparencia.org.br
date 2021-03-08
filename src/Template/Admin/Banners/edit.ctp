			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando banner: <?=$banner->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($banner, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
						  <fieldset>
						  	<div class="control-group">
							  <label class="control-label" for="CodigoBannerTipo">Tipo de banner *</label>
							  <div class="controls">
								<?=$this->Form->select('Banners.CodigoBannerTipo', $tipos, ['class' => 'span3']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoTargetTipo">Tipo target *</label>
							  <div class="controls">
								<?=$this->Form->select('Banners.CodigoTargetTipo', $targets, ['class' => 'span3']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Banners.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Link / Url youtube *</label>
							  <div class="controls">
								<?=$this->Form->text('Banners.Link', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Imagem">Imagem</label>
							  <div class="controls">
							  	<?php if (isset($banner->Imagem)): ?>
							  		<p><b>Nome da imagem atual: 
							  		<a href="<?=BASE_URL.'uploads/banners/'.$banner->Imagem?>" target="_blank"><?=$banner->Imagem?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Banners.Imagem', ['class' => 'span6', 'readonly' => 'readonly']);?>
								<p>*Tamanho ideal: 1280x746 px.</p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Resumo">Resumo</label>
							  <div class="controls">
								<?=$this->Form->textarea('Banners.Resumo', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Inicio">Data de início</label>
							  <div class="controls">
								<?=$this->Form->text('Banners.Inicio', 
									['class' => 'input-xlarge datepicker'],
									['error'=> array('attributes' => ['escape' => false])]
								);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Termino">Data de término</label>
							  <div class="controls">
								<?=$this->Form->text('Banners.Termino', 
									['class' => 'input-xlarge datepicker'],
									['error'=> array('attributes' => ['escape' => false])]
								);?>
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