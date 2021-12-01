
<?php
  $this->assign('description', 'Com sua doação, podemos manter a organização com sua atuação independente.');
?><!-- Título -->
<div class="container content-box">
  <div class="container">
      <div class="row">
      <div class="col-12 px-0 pb-3">
        <img src="/images/topos/camara.jpg" width="100%" class="img-fluid" alt="Apoie a Transparência Brasil">
        </div>
        <div class="col-12 no_pd pb-3">
        <h2 class="title-pages">Faça sua doação</h2>
        <hr/>
        <p>
        Para doar pontualmente, por favor, escolha se prefere pagar pelo PagSeguro ou pelo PayPal.
        </p>
        <p>
        Para renovar sua associação, <a href="/associados/login/" >clique aqui</a>.
        </p>
      </div>
  </div>
  <!-- Título -->

  <!-- Conteudo -->
  <div class="container no_pd">
    <div class="row pb-5">
      <div class="col-12 col-md-3 px-0 text-center text-md-left">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="68FLUZYMNX6G4">
          <input type="image" class="donation-button img-fluid" src="<?= BASE_URL ?>images/btn-paypal.png" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!" onclick='registrarEvento("botao_<?= str_replace("-", "_", $slug) ?>","clique","botao_paypal")'>
          <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
        </form>
      </div>
      <div class="col-12 col-md px-0 text-center text-md-left pt-4 pt-md-0">
      <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
        <form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post" target="_blank">
          <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
          <input type="hidden" name="currency" value="BRL" />
          <input type="hidden" name="receiverEmail" value="doacoes@transparencia.org.br" />
          <input type="hidden" name="iot" value="button" />
          <input type="image" src="<?= BASE_URL ?>images/btn-pagseguro.png" name="submit" class="donation-button" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
        </form>
      <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
      </div>
    </div>
  </div>
</div>
<!-- Conteudo -->

<script src="/scripts/associados.js"></script>