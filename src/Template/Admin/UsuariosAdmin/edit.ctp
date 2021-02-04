			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editando Usuário: <?=$usuario->Login?></h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($usuario, ['class' => 'form-horizontal']) ?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="Nome">Nome *</label>
							  <div class="controls">
								<?=$this->Form->text('UsuariosAdmin.Nome', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Login">Login *</label>
							  <div class="controls">
								<?=$this->Form->text('UsuariosAdmin.Login', ['class' => 'span6']);?>
							  </div>
							</div>
							<?php if($usuario->Codigo == null || $usuario->Codigo == 0){ ?>
							<div class="control-group">
							  <label class="control-label" for="Login">Senha *</label>
							  <div Senhaass="controls">
								<?=$this->Form->password('UsuariosAdmin.Senha', ['class' => 'span6']);?>
							  </div>
							</div>
							<?php } ?>
							<div class="control-group">
							  <label class="control-label" for="UltimoAcesso">Último acesso</label>
							  <div class="controls">
								<?=$this->Form->text('UsuariosAdmin.UltimoAcesso', ['class' => 'span3', 'readonly' => 'readonly']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Bloqueado">Bloqueado</label>
							  <div class="controls">
								<?=$this->Form->checkbox('UsuariosAdmin.Bloqueado');?>
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