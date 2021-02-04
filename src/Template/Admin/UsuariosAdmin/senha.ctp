			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Digite a senha atual e a nova senha.</h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<p>A nova senha deve ter no mínimo 8 caracteres, com pelo menos 1 caractere numérico, 1 letra maiúscula, 1 letra minúscula e 1 caractere especial.</p>
						<?=$this->Form->create(null, ['action' => 'mudarSenha', 'class' => 'form-horizontal']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Senha Atual *</label>
							  <div class="controls">
								<?=$this->Form->password('senhaAtual', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Login">Nova senha *</label>
							  <div class="controls">
								<?=$this->Form->password('senhaNova', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="UltimoAcesso">Confirmar senha *</label>
							  <div class="controls">
								<?=$this->Form->password('confirmarSenha', ['class' => 'span3']);?>
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