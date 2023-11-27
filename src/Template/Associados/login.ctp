<header>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/"><img src="<?=BASE_URL?>images/logo.png" class="d-inline-block logo-image"></a>
  </div>
</nav>
</header>
<!-- Título -->
<div class="container content-box">
	<div class="container">
		<div class="row">
			<div class="col-12 px-0 pb-3">
				<img src="/images/topos/header-associacao.png" width="100%" class="img-fluid" alt="Apoie a Transparência Brasil">
			</div>
			<div class="col-12 no_pd">
				<h2 class="title-pages">RENOVE SUA ASSOCIAÇÃO</h2>
				<hr/>
				<p>Insira seu CPF no campo abaixo para confirmar seus dados:
				</p>
			</div>
		</div>
		<!-- Título -->

		<!-- Conteudo -->
		
			<div class="row">
				<!-- Form -->
				<?=$this->Form->create(null, ['url' => '/associados/auth', "id" => "frmAssociado", "class" => "form-inline donation"]) ?>
				<div class="col-12 pd10" id="cpf-box">
					<?=$this->Form->input('Cpf', ['id' => 'Cpf', 'label'=>'CPF', 'class' => 'form-control col-12', 'tabindex' => '2']) ?>
				</div>
				<div class="col-12 px-0 py-3">
					<button class="g-recaptcha btn btn-warning mobile-fix" 
						id="grecaptcha-btn" 
						data-formid="#frmAssociado"
						data-sitekey="<?=$grsiteKey?>" 
						data-callback='onSubmitRecaptcha' 
						data-actionOrigem = "associados-entrar"
						data-action='submit'>Entrar</button>
				</div>
			</div>
		
		<?=$this->Form->end();?>
			<!-- Form -->
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      <?php 
          if(strlen($mensagemErro) > 0){
              $textoJaExiste = '';
              $linkJaExiste = '';
              echo "abrirModal('','". $mensagemErro . "', '" . $textoJaExiste . "', '" .  $linkJaExiste . "');";
          }
      ?>
  });
</script>
<!-- Conteudo -->
