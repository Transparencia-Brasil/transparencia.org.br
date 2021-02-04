			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando Projeto: <?=$projeto->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($projeto, ['class' => 'form-horizontal',  'enctype' => 'multipart/form-data']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Desativado">Projeto Ativo</label>
							  <div class="controls">
								<?=
										$this->Form->radio(
											'Projetos.Desativado',
											[
												  ['value' => 1, 'text' => 'Sim', 'checked'=> true],
													['value' => 0, 'text' => 'Não']
											],
											['hiddenField' => false]
										);
								?>
							  </div>
							</div>							
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Projetos.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Data">Data do projeto</label>
							  <div class="controls">
								<?=$this->Form->text('Projetos.Data', 
									['class' => 'input-xlarge datepicker'],
									['error'=> array('attributes' => ['escape' => false])]
								);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Descricao">Descrição *</label>
							  <div class="controls">
								<?=$this->Form->textarea('Projetos.Descricao', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Link">Link</label>
							  <div class="controls">
								<?=$this->Form->text('Projetos.Link', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="LinkTarget">Vai abrir uma nova janela para o link?</label>
							  <div class="controls">
								<?=
										$this->Form->radio(
											'Projetos.LinkTarget',
											[
												  ['value' => 0, 'text' => 'Não','checked'=> true],
												  ['value' => 1, 'text' => 'Sim']
											],
											['hiddenField' => false]
										);
								?>
							  </div>
							</div>	
							<div class="control-group">
							  <label class="control-label" for="CaptacaoRecursos">Projeto em fase de captação de recursos?</label>
							  <div class="controls">
								<?=
										$this->Form->radio(
											'Projetos.CaptacaoRecursos',
											[
												  ['value' => 0, 'text' => 'Não','checked'=> true],
												  ['value' => 1, 'text' => 'Sim']
											],
											['hiddenField' => false]
										);
								?>
							  </div>
							</div>	
							<div class="control-group">
							  <label class="control-label" for="DesativadoPeriodoVigencia">Desativado - quanto tempo ficou ativo?</label>
							  <div class="controls">
								<?=$this->Form->text('Projetos.DesativadoPeriodoVigencia', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Mouseover_cor">Cor do mouseover</label>
							  <div id="colorpicker" class="controls colorpicker-component">
								<?=$this->Form->text('Projetos.Mouseover_cor', ['class' => 'span6']);?>
								<span class="input-group-addon"><i></i></span>
							  </div>
							</div>
							<script>

							</script>

							<div class="control-group">
							  <label class="control-label" for="Imagem_logo">Logotipo</label>
							  <div class="controls">
							  	<?php if (isset($projeto->Imagem_logo)): ?>
							  		<p><b>Nome do logotipo atual: <a href='<?=$this->Url->build('/images/projetos/'.$projeto->Imagem_logo, true)?>' target="_blank"><?=$projeto->Imagem_logo?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Projetos.Imagem_logo', ['class' => 'span3', 'readonly' => 'readonly']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Imagem">Imagem de fundo</label>
							  <div class="controls">
							  	<?php if (isset($projeto->Imagem)): ?>
							  		<p><b>Nome da imagem de fudo atual: <a href='<?=$this->Url->build('/images/projetos/'.$projeto->Imagem, true)?>' target="_blank"><?=$projeto->Imagem?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Projetos.Imagem', ['class' => 'span3', 'readonly' => 'readonly']);?>
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