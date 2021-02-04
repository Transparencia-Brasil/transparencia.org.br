			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando post: <?=$post->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($post, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
						  <fieldset>
						  	<div class="control-group">
							  <label class="control-label" for="CodigoBannerTipo">Categoria *</label>
							  <div class="controls">
								<?=$this->Form->select('Blogs.CodigoCategoria', $categorias, ['class' => 'span3']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Blogs.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Titulo">Título *</label>
							  <div class="controls">
								<?=$this->Form->text('Blogs.Titulo', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Resumo">Resumo *</label>
							  <div class="controls">
								<?=$this->Form->textarea('Blogs.Resumo', ['class' => 'span6 cleditor']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="HTML">HTML *</label>
							  <div class="controls">
								<?=$this->Form->textarea('Blogs.HTML', ['class' => 'span6 cleditor']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Palavras-chave">Palavras-chave</label>
							  <div class="controls">
								<?=$this->Form->text('Blogs.PalavrasChave', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Autor">Autor</label>
							  <div class="controls">
								<?=$this->Form->text('Blogs.Autor', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Slug">Slug (nome identificador usado na url) *</label>
							  <div class="controls">
								<?=$this->Form->text('Blogs.Slug', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Palavras-chave">Visível</label>
							  <div class="controls">
								<?=$this->Form->checkbox('Blogs.Visivel', ['class' => 'span1', 'checked' => $post->Visivel]);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Publicacao">Publicação *</label>
							  <div class="controls">
								<?=$this->Form->text('Blogs.Publicacao', 
									['class' => 'input-xlarge datepicker'],
									['error'=> array('attributes' => ['escape' => false])]
								);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Arquivo">Imagem de resumo</label>
							  <div class="controls">
							  	<?php if (isset($post->ImagemResumo)): ?>
							  		<p><b>Nome da imagem atual: <a href='<?=$this->Url->build('/img/blog/' . $post->ImagemResumo, true)?>' target="_blank"><?=$post->ImagemResumo?></a></b></p>
							  	<?php endif; ?>
								<?=$this->Form->file('Blogs.ImagemResumo', ['class' => 'span6']);?>
								<p>Tamanho ideal: 500x360</p>
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