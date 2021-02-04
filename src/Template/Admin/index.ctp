<h1>Painel de Controle</h1>
<p><?php echo $this->Flash->render();?></p>
<?= $this->Form->create('User', ['url' => ['prefix' => 'admin', 'controller'=>'Login', 'action'=>'logar']]) ?>
	<fieldset>
		<div>
			<?php 
			echo $this->Form->input('login');
			echo $this->Form->input('senha', ['type' => 'password']);
			?>
		</div>
		<div>
			<?= $this->Form->button(__('Login')); ?>
		</div>

	</fieldset>

<?= $this->Form->end() ?>