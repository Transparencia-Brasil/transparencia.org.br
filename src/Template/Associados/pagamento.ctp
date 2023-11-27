
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
				<h2 class="title-pages">Associe-se</h2>
				<hr/>
				<p>
        <b>É necessário realizar o pagamento para efetivar ou renovar sua associação.</b>
        </p>
			</div>
		</div>
		<!-- Título -->
		<!-- Conteudo -->
    <div class="row justify-content-center">
      <!-- Form -->
      <div class="d-block d-md-flex no_pd pt-5">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
          <input type="hidden" name="cmd" value="_xclick-subscriptions">
          <!-- Identify your business so that you can collect the payments. -->
          <input type="hidden" name="business" value="mgaldino@transparencia.org.br">
          <input type="hidden" name="hosted_button_id" value="GFB8CF7HMGTQA">
          <input type="hidden" name="currency_code" value="BRL">
          <input type="hidden" name="item_name" value="Associação - Transparência Brasil">
          <input type="hidden" name="p3" value="<?=$associado->p3?>">
          <input type="hidden" name="t3" value="<?=$associado->t3?>">
          <input type="hidden" name="a3" value="<?=$associado->Valor?>">
          <input type="hidden" name="src" value="1">
          <input type="hidden" name="country" value="Brazil">
          <input type="hidden" name="city" value="<?=$associado->Cidade?>">
          <input type="hidden" name="email" value="<?=$associado->Email?>">
          <input type="hidden" name="night_phone_a" value="55">
          <input type="hidden" name="night_phone_b" value="<?=$associado->CelularDDD?><?=$associado->Celular?>">
          <input type="hidden" name="lc" value="BR">
          <input type="hidden" name="charset" value="UTF-8">
          <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_subscribeCC_LG.gif" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!"  height="60" class="mr-md-5" style="border:none;box-shadow:none;">
          <img alt="" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif">
        </form>
        <!-- INICIO FORMULARIO BOTAO PAGSEGURO: NAO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
        <form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post" target="_blank">
        <input type="hidden" name="code" value="<?=$associado->code?>" />
        <input type="hidden" name="iot" value="button" />
        <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/120x53-assinar-laranja.gif" name="submit" alt="Pague com PagSeguro - É rápido, grátis e seguro!" height="66" class="mt-5 mt-md-0 ml-md-5" />
        </form>
        <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->        
      </div>
    </div>
			<!-- Form -->
    <div class="row">
			<div class="col-12 no_pd mt-2">
				<p>
        Após concluir o pagamento, sua associação será enviada para aprovação do nosso Conselho. Caso haja algum problema, nós comunicaremos você e, se necessário, realizaremos a devolução da sua contribuição.
        </p>
			</div>
		</div>
	</div>
</div>
<!-- Conteudo -->

