			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando clipping: <?=$imprensa->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($imprensa, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Imprensas.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoImprensaCategoria">Categoria *</label>
							  <div class="controls">
								<?=$this->Form->select('Imprensas.CodigoImprensaCategoria', $categorias, ['class' => 'span4']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Veículo">Veículo *</label>
							  <div class="controls">
								<?=$this->Form->text('Imprensas.Veiculo', ['class' => 'span6', 'maxLength' => 150]);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Título">Título *</label>
							  <div class="controls">
								<?=$this->Form->text('Imprensas.Titulo', ['class' => 'span6', 'maxLength' => 100, 'id' => 'titulo']);?>
								<div class="contador"></div>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Resumo">Resumo</label>
							  <div class="controls">
								<?=$this->Form->textarea('Imprensas.Resumo', ['class' => 'span6', 'maxLength' => 220, 'id' => 'resumo']);?>
								<div class="contador"></div>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="Link">Link *</label>
							  <div class="controls">
								<?=$this->Form->text('Imprensas.Link', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="DataPublicacao">Data de publicação *</label>
							  <div class="controls">
								<?=$this->Form->text('Imprensas.DataPublicacao', 
									['class' => 'input-xlarge datepicker'],
									['error'=> array('attributes' => ['escape' => false])]
								);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Arquivo">Imagem de destaque (tamanho: 600x357) *</label>
							  <div class="controls">
							  	<?php if (isset($imprensa->Imagem)): ?>
							  		<p><b>Nome da imagem atual: <a href='<?=$this->Url->build('/uploads/imprensa/'. $imprensa->Imagem, true)?>' target="_blank"><?=$imprensa->Imagem?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Imprensas.Imagem', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Salvar</button>
							  <button type="button" onclick='javascript:history.back(-1);' class="btn">Cancelar</button>
							</div>
							<div id="preview" class="columns">
								<div class="bx-highlight">
		                            <div class="categoria">
		                                <div class='nome-categoria'>
		                                    <span name="nome">Tipo</span>
		                                </div>
		                            </div>
		                            <div class="bx-img">
		                                <a href="javascript:void(0);"><img src="<?=BASE_URL?>uploads/imprensa/img-imprensa-01.jpg" /></a>
		                            </div>
		                            <div class="bx-txt">
		                                <h4 name="titulo">Título</h4>
		                                <div class="char-limit-2">
		                                    <p name="resumo">Resumo</p>
		                                </div>
		                                <div class="btn-ver">
		                                    <a href="javascript:void(0);" class="btn">Veja Mais</a>
		                                </div>
		                            </div>
		                        </div>
							</div>
						  </fieldset>
						<?=$this->Form->end();?>
					</div>
				</div><!--/span-->

			</div><!--/row-->

			<script type="text/javascript">
				$('#titulo').bind('keypress keyup keydown',function(){
					$('#preview').find('h4[name="titulo"]').html($(this).val());
				}).trigger('keyup');

				$('#resumo').bind('keypress keyup keydown',function(){
					$('#preview').find('p[name="resumo"]').html($(this).val());
				}).trigger('keyup');
			</script>