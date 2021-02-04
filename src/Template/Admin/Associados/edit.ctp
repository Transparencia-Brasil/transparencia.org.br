			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando associado: <?=$associado->Nome?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($associado, ['class' => 'form-horizontal']) ?>
						  <?=$this->Form->hidden('Associados.Codigo');?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Email">Email *</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.Email', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CPF">CPF *</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.CPF', ['class' => 'span6 cpf']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Telefone">Telefone</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.TelefoneDDD', ['class' => 'span1 ddd', 'maxlength' => '2']);?>
								<?=$this->Form->text('Associados.Telefone', ['class' => 'span2 telefone', 'maxlength' => '9']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Celular">Celular *</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.CelularDDD', ['class' => 'span1 ddd', 'maxlength' => '2']);?>
								<?=$this->Form->text('Associados.Celular', ['class' => 'span2 telefone', 'maxlength' => '9']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Cidade">Cidade *</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.Cidade', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="UF">UF *</label>
							  <div class="controls">
								<?=$this->Form->select('Associados.UF', $estados, ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Descricao">Texto Contra Corrupção</label>
							  <div class="controls">
								<?=$this->Form->textarea('Associados.TextoContraCorrupacao', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoComoConheceuTB">Como conheceu a TB?</label>
							  <div class="controls">
								<?=$this->Form->select('Associados.CodigoComoConheceuTB', $comoConheceu, ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoTipoDoacao">Tipo de doação escolhida</label>
							  <div class="controls">
								<?=$this->Form->select('Associados.CodigoTipoDoacao', $tipoDoacao, ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Aceites">Aceites</label>
							  <div class="controls">
							  	<span>Exibir na lista de associado:&nbsp;</span><?=$this->Form->checkbox('Associados.ExibeLista', ['class' => 'span1', 'checked' => (int)$associado->ExibeLista == 1]);?><br/>
								<span>Novidades:&nbsp;</span><?=$this->Form->checkbox('Associados.AceiteNovidades', ['class' => 'span1', 'checked' => (int)$associado->AceiteNovidades == 1]);?><br/>
								<span>Lembrete de doação:&nbsp;</span><?=$this->Form->checkbox('Associados.AceiteLembreteDoacao', ['class' => 'span1', 'checked' => (int)$associado->AceiteLembreteDoacao == 1]);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Data">Data de cadastro</label>
							  <div class="controls">
								<?=$this->Form->text('Associados.DataCadastro', 
									['class' => 'span3', 'readonly' => 'readonly'],
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
			<script>
				var SPMaskBehavior = function (val) {
				  return val.replace(/\D/g, '').length === 9 ? '00000-0000' : '0000-00009';
				},
				spOptions = {
				  onKeyPress: function(val, e, field, options) {
				      field.mask(SPMaskBehavior.apply({}, arguments), options);
				    }
				};

				$(document).ready(function(){

					$('.ddd').mask('99');
					$('.telefone').mask(SPMaskBehavior, spOptions);
					$('.cpf').mask('000.000.000-00', {reverse: true});

				});

				
			</script>