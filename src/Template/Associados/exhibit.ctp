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
					A Transparência Brasil agradece seu interesse em se associar à nossa organização. O apoio de associadas e associados é fundamental para que continuemos nosso trabalho de combate à corrupção e de promoção da transparência, do controle social e da integridade do poder público.
				</p>
				<p>
					Seu pedido de associação ainda precisa ser aprovado na próxima reunião do Conselho da Transparência Brasil, conforme rege o nosso <a href="/quem_somos#estatuto" target="_blank">estatuto</a>. Em alguns dias entraremos em contato para dar continuidade no seu processo de associação. 
				</p>
				<p>
					Confira seus dados abaixo para que possamos entrar em contato:
				</p>
			</div>
		</div>
		<!-- Título -->

		<!-- Conteudo -->
    <div class="row">
      <!-- Form -->
      <div class="col-12">
        <div class="col-md-12">
          <p><strong>Nome:</strong> <?=$associado->Nome?></p>
          <p><strong>Email:</strong> <?=$associado->Email?></p>
          <p><strong>CPF:</strong> <?=$associado->CPF?></p>
          <p><strong>Celular:</strong> <?=$associado->CelularDDD?> - <?=$associado->Celular?></p>
          <p><strong>Estado:</strong> <?=$associado->UF?></p>
          <p><strong>Cidade:</strong> <?=$associado->Cidade?></p>
          <p><strong>Tipo de associação:</strong> <?=$associado->TipoAssinatura?> - <?= Cake\I18n\Number::currency($associado->Valor, 'BRL');?></p>
        </div>
      </div>

			<div class="btn-primary text-center mgt20 mr-5">
				<a href="/apoie/associados/editar/<?=$associado->Codigo?>" class="btn">Editar</a>
			</div>
			<div class="btn-primary text-center mgt20">
				<a href="/associados/pagamento/<?=$associado->Codigo?>" class="btn">Confirmar</a>
			</div>
    </div>
			<!-- Form -->
  </div>
</div>
<!-- Conteudo -->