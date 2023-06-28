
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
				<img src="/images/topos/camara.jpg" width="100%" class="img-fluid" alt="Apoie a Transparência Brasil">
			</div>
			<div class="col-12 no_pd">
				<h2 class="title-pages">Associe-se</h2>
				<hr/>
				<p>
        <b>É necessário realizar o pagamento para efetivar ou renovar sua associação.</b>
        </p>
        <p>
        A contribuição financeira mínima é de R$ 50 mensais ou R$ 540 anuais para sócios-participantes (pessoas físicas, votantes). A contribuição pode ser maior, a critério do associado.
        </p>
        <p>
        Após concluir o pagamento, sua associação será enviada para aprovação do nosso Conselho. Caso haja algum problema, nós comunicaremos você e, se necessário, realizaremos a devolução da sua contribuição.
        </p>
        <p>
        Escolha um dos meios de pagamento abaixo. Ambos possibilitam pagamento com cartão de crédito e não é necessário ter cadastro no PagSeguro ou no PayPal.
        </p>
			</div>
		</div>
		<!-- Título -->

		<!-- Conteudo -->
    <div class="row">
      <div class="col-12 pb-3">
        <div class="col-md-12">
          <p><strong>Tipo de associação:</strong> <?=$associado->TipoAssinatura?> - <?= str_replace(".",",",Cake\I18n\Number::currency($associado->Valor, 'BRL'));?></p>
          <p><strong>Nome:</strong> <?=$associado->Nome?></p>
          <p><strong>Email:</strong> <?=$UNumero::emailToSecret($associado->Email)?></p>
          <p><strong>CPF:</strong> <?=$associado->CPF?></p>
          <p><strong>Telefone:</strong> <?=$associado->TelefoneDDD?> -  <?=$UNumero::stringToSecret($associado->Telefone)?> </p>
          <p><strong>Celular:</strong> <?=$associado->CelularDDD?> - <?=$UNumero::stringToSecret($associado->Celular)?></p>
        </div>
      </div>
      <div>
        <p>
          Para atualizar dados cadastrais ou em caso de dúvida, entre em contato com a Transparência Brasil pelo telefone <a href="tel:+55 (11) 95050-4257">+55 (11) 95050-4257</a> ou pelo e-mail <a href="mailto:contato@transparencia.org.br">contato@transparencia.org.br</a>.
        </p>
      </div>
    </div>
    <div class="row justify-content-center">
      <!-- Form -->
      <div class="col-12 col-md-2 no_pd pt-5">
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
          <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
        </form>
      </div>
      <div class="col-12 col-md-10 no_pd pt-5">
        <!-- INICIO FORMULARIO BOTAO PAGSEGURO: NAO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
        <form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post" target="_blank">
        <input type="hidden" name="code" value="<?=$associado->code?>" />
        <input type="hidden" name="iot" value="button" />
        <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/120x53-assinar-laranja.gif" name="submit" alt="Pague com PagSeguro - É rápido, grátis e seguro!" width="120" height="53" />
        </form>
        <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
      </div>
    </div>
			<!-- Form -->
	</div>
</div>
<!-- Conteudo -->

