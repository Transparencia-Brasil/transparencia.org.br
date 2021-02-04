			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando publicação: <?=$publicacao->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($publicacao, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
						  <fieldset>
						  	<div class="control-group">
							  <label class="control-label" for="Categoria">Categoria *</label>
							  <div class="controls">
								<?=$this->Form->select('Publicacoes.CodigoCategoria', $categorias, ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Publicacoes.Nome', ['class' => 'span6', 'id' => 'nome']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="DataPublicacao">Data de publicação *</label>
							  <div class="controls">
								<?=$this->Form->text('Publicacoes.DataPublicacao', 
									['class' => 'input-xlarge datepicker'],
									['error'=> array('attributes' => ['escape' => false])]
								);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Descricao">Descrição</label>
							  <div class="controls">
								<?=$this->Form->textarea('Publicacoes.Descricao', ['class' => 'span6', 'maxLength' => 177, 'id' => 'descricao']);?>
								<div class="contador"></div>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Arquivo">Arquivo</label>
							  <div class="controls">
							  	<?php if (isset($publicacao->Arquivo)): ?>
							  		<p><b>Nome do arquivo atual: <a href="<?=$this->Url->build('/downloads/publicacoes/'. $publicacao->Arquivo, true)?>" target="_blank"><?=$publicacao->Arquivo?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Publicacoes.Arquivo', ['class' => 'span3', 'readonly' => 'readonly']);?>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Link">Link</label>
							  <div class="controls">
								<?=$this->Form->text('Publicacoes.Link', ['class' => 'span3']);?>
								<p>* O link só será utilizado se não houver arquivo relacionado ao item.</p>
							  </div>

							</div>
							<div class="control-group">
							  <label class="control-label" for="PalavrasChave">Palavras-chave</label>
							  <div class="controls">
								<?=$this->Form->text('Publicacoes.PalavrasChave', ['class' => 'span3']);?>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Salvar</button>
							  <button type="button" onclick='javascript:history.back(-1);' class="btn">Cancelar</button>
							</div>
							<div class="columns" id="preview">
								<ul class="itensPublicacoes">
									<li class="bx-highlight">
										<div class="bx-txt">
											<a href="javascript:void(0);">
												<h4 name="nome">nome</h4>
												<p name="descricao">descrição</p>
												<div class="mask" ></div>
											</a>
										</div>
									</li>
								</ul>
							</div>
						  </fieldset>
						<?=$this->Form->end();?>
					</div>
				</div><!--/span-->

			</div><!--/row-->
			<script>
				$(function() {
					$( "#datepicker" ).datepicker( "option", "dateFormat", 'dd/MM/yyyy');
				});

				$('#nome').bind('keypress keyup keydown',function(){
					$('#preview').find('h4[name="nome"]').html($(this).val());
				}).trigger('keyup');

				$('#descricao').bind('keypress keyup keydown',function(){
					$('#preview').find('p[name="descricao"]').html($(this).val());
				}).trigger('keyup');
			</script>