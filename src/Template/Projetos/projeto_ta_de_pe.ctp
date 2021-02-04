

<div class="container content-box">

  <!-- 1 tela -->
  <div class="tadepe-page">
    <div class="row">
      <div class="col-md-6 col-xs-10">
        <img class="card-img-top img-fluid" src="/images/logos/logo-ta-de-pe.png" alt="Tá De Pé">
        <div class="title">a cobrança move a obra</div>
        <p>Fiscalize obras de escolas e creches públicas perto de você e pressione por uma gestão mais eficiente de recursos públicos!</p>
        <h5>#fiquenopé</h5>
        <div class="row">
          <div class="col-12 col-lg-6">
            <a href="https://play.google.com/store/apps/details?id=br.com.tadepe&referrer=utm_source%3Dsite%26utm_medium%3Dbottom%26utm_content%3Dbaixe_tdp%26utm_campaign%3Dbottom_site" target="_blank"><img class="card-img-top gimage" src="/images/app-google-play.png" alt="Baixe agora!"></a>
          </div>
          <div class="col-12 col-lg-6">
            <a href="https://itunes.apple.com/br/app/t%C3%A1-de-p%C3%A9-fiscalize-a-escola/id1312975610?mt=8" target="_blank"><img class="card-img-top gimage" src="/images/app-store.png" alt="Baixe agora!"></a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-10">
       <img class="card-img-top img-fluid mgb30" src="/images/TDP_cel.png" alt="Tá De Pé">
      </div>
    </div>
    <!-- 1 tela -->

    <!-- 2 tela -->
    <div class="row">
      <div class="col-md-6 col-xs-10">
        <img class="card-img-top img-fluid" src="/images/TDP_working.png" alt="Tá De Pé">
      </div>
      <div class="col-md-6 col-xs-10 my-auto">
        <div class="im-title-box mgb30">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/tijolo.png" alt="tijolo!">
          <h4 class="inline-b im-text">COMO FICAR NO PÉ DO GOVERNO?</h4>
        </div>
        <div class="txt-p mt-3">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/one.png" alt="tijolo!">
          <p class="im-text inline-b mt-3">Encontre pelo app uma escola ou creche em construção perto de você e vá até lá.</p>
        </div>
        <div class="txt-p pb-4">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/two.png" alt="tijolo!">
          <p class="im-text inline-b">Tire fotos da obra com o app.</p>
        </div>
        <div class="txt-p">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/three.png" alt="tijolo!">
          <p class="im-text inline-b mt-1">Engenheiros avaliam a situação da obra por meio da sua foto, e cobramos a Prefeitura no caso de atrasos.</p>
        </div>
        <div class="txt-p">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/four.png" alt="tijolo!">
          <p class="im-text inline-b mt-3">Se a Prefeitura não responder, cobramos os vereadores da cidade e o Governo Federal.</p>
        </div>
      </div>
    </div>
    <!-- 2 tela -->

    <!-- Mapa -->
    <div class="tadepe-page text-center tbox orange">
      <div class="row">
        <div class="col-12">
          <h4>OBRAS</h4>
          <h5>Veja como estão as obras na sua região e ajude a fiscalizá-las!</h5>
        </div>
        <div class="col-12">
          <input id="pac-input" class="controls" type="text" placeholder="Pesquisar endereço" style="margin-top:10px; padding:10px; height:40px; width: 500px; border-radius:2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border:white; font-size:14px; z-index: 1; position: absolute; left: 205px; top: 0px;" autocomplete="on">
          <div id="map"></div>
          <br/>
          <div class="row">
            <div class="col-6 text-left">
              <h6>Filtrar obras</h6>
              <input type="checkbox" onchange="filterMarkers(this);" class="can-overlap" name="map-filters" value="delayed" checked>Atrasadas<br>
              <input type="checkbox" onchange="filterMarkers(this);" class="can-overlap" name="map-filters" value="paralyzed" checked>Paralisadas<br>
              <input type="checkbox" onchange="filterMarkers(this);" class="can-overlap" name="map-filters" value="not-started" checked>Não iniciadas<br>
              <input type="checkbox" onchange="filterMarkers(this);" class="can-overlap" name="map-filters" value="no-address" checked>Sem endereço informado<br>
              <input type="checkbox" onchange="filterMarkers(this);" class="can-overlap" name="map-filters" value="no-problems" checked>Sem evidência de problemas<br>
            </div>
            <div class="col-6">
            <h6>Legenda</h6>
              <div class="text-left"> <div class="map-subtitle-box" style="background:#0000ff"></div> Obra sem evidência de problema¹</div>
              <div class="text-left"> <div class="map-subtitle-box" style="background:#da7144"></div> Obra com problemas</div>
              <div class="text-left">Obras com contorno <b>preto</b> estão no app²</div>
              <p class="text-left"><b>Total de obras: <span id="count-number">0</span></b></p>
            </div>
          </div>
        </div>
        <div class="grey px-3 mt-5">
          <p class="legenda">¹ A falta de evidência de problemas não significa que não haja atrasos ou outras incongruências na obra, mas apenas que não foi possí­vel identificá-los a partir do cruzamento de dados públicos, sem a fiscalização cidadã in loco. Envie fotos de obras perto de você pelo app para que possamos avaliar o andamento da obra.</p>
          <p class="legenda">² No mapa estão 5,3 mil obras de escolas e creches que ainda não foram entregues. Dessas, 3,7 mil podem ser fiscalizadas pelo app Tá de Pé ou pelo Twitter, compartilhando foto das obras com a hashtag #tadepeobras ou com o perfil @tadepeapp. As demais obras não estão no app, porque seus cronogramas oficiais não foram disponibilizados pelo governo. A falta de transparência limita a fiscalização cidadã.  </p>
          <p class="legenda"><b>Última atualização realizada em 08 de Janeiro de 2019.</b></p>
        </div>
      </div>
    </div>
    <!-- Mapa -->

    <!-- Impacto -->
    <div class="text-center">
      <div class="row">
        <div class="col-12">
         <img class="img-fluid pdtb30" src="/images/icon-TDP.jpg" alt="COMO AS MINHAS FOTOS PODEM CAUSAR IMPACTO?">
        </div>
        <div class="col-12">
          <div class="im-title-box text-center">
            <img class="card-img-top img-fluid inline-b im-title-b" src="/images/tijolo.png" alt="tijolo!">
            <h4 class="inline-b vb">COMO AS MINHAS FOTOS PODEM CAUSAR IMPACTO?</h4>
          </div>
        </div>
        <div class="d-flex mx-auto tbox extra">
          <p class="card-text">Engenheiros avaliam sua foto e cobramos a Prefeitura no caso de atrasos</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <img class="card-img-top img-fluid pdtb30" src="/images/icon2-TDP.jpg" alt="A Prefeitura tem 15 dias para responder e informar uma nova data de entrega da obra">
          <p class="card-text fs">A Prefeitura tem 15 dias para responder e informar uma nova data de entrega da obra</p>
        </div>
        <div class="col-md-6">
          <img class="img-fluid pdtb30" src="/images/icon3-TDP.jpg" alt="Se a Prefeitura não responder, cobraremos os vereadores e o Governo Federal">
          <p class="card-text fs">Se a Prefeitura não responder, cobraremos os vereadores e o Governo Federal</p>
        </div>
      </div>
      <div class="row">
        <div class="d-flex mx-auto tbox extra">
          <p class="card-text">Continue fiscalizando: envie mais fotos e veremos se a data da entrega Tá de Pé!</p>
        </div>
      </div>
    </div>
    <!-- Impacto -->
  </div>
    <!-- Financiamento -->
  <div class=" tadepe-page text-center tbox orange">
    <div class="row">
      <div class="col-12">
        <h4>FINANCIAMENTO</h4>
      </div>
      <div class="col-12 mgt30">
        <p class="card-text">O Tá de Pé foi vencedor do Desafio Google de Impacto Social 2016 na categoria voto popular com 200 mil votos. O prêmio foi utilizado para a construção do aplicativo. Apoie a continuidade desse projeto, clique aqui para contribuir.
        </p>
        <img class="img-fluid" src="/images/logos/logo-google-org.png" alt="google">
      </div>
    </div>
  </div>
  <!-- Financiamento -->

  <!-- Parceiros -->
  <div class=" tadepe-page text-center tbox">
    <div class="row">
      <div class="col-12">
        <h4>PARCEIROS</h4>
      </div>
      <div class="col-12 mgt30">
        <p class="card-text fs">A viabilização do projeto só é possível graças a parcerias com associações<br /> de engenheiros em todo o país.</p>
        <p class="card-text fs">Junte-se a este time de engenheiros voluntários! <br />
        Entre em contato por e-mail: <a href="mailto:tadepe@transparencia.org.br">tadepe@transparencia.org.br.</a></p><br />
      </div>
      <div class="col-md-4">
        <img class="img-fluid" src="/images/logos/logo-engenheiros.png" alt="Engenheiros Sem Fronteiras - Brasil">
          <p class="card-text mg-fix">
          Núcleo Vitória - ES<br />
          Núcleo Goiânia - GO<br />
          Núcleo Uberaba - MG<br />
          Núcleo Curitiba - PR<br />
          Núcleo São Paulo - SP<br />
          Núcleo Feevale - RS
          </p>
      </div>
      <div class="col-md-4 pdr40">
        <img class="img-fluid" src="/images/logos/logo-crea.png" alt="Conselho Regional de Engenharia e Agronomia de Pernambuco">
      </div>
      <div class="col-md-4 text-left align-self-start pdl40">
        <img class="img-fluid" src="/images/logos/logo-caindo_no_brasil.png" alt="Caindo no Brasil">
      </div>
    </div>
  </div>
  <!-- Parceiros -->

  <!-- FAQ -->
  <div class="accord faq tadepe-page">
      <div class="" id="accordion">
          <h4 class="text-center mgb30">DÚVIDAS FREQUENTES</h4>
<?php
    if (!empty($ta_de_pe)) {
    $count = 0;
        foreach ($ta_de_pe as $value) {
        $count++;
?>
          <div class="card ">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$count?>">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        <?=$value->pergunta?>
                    </div>
                </div>
            </a>
              <div id="collapse<?=$count?>" class="panel-collapse collapse in">
                  <div class="card-block">
                      <?=$value->resposta?>
                  </div>
              </div>
          </div>
<?php
        }
     }
?>

      </div>
  </div>
  <!-- FAQ -->

  <!-- Baixe -->
  <div class=" jumbotron container text-center tadepe-page">
    <div class="row">
      <div class="col-12">
        <h4>BAIXE O APP TÁ DE PÉ</h4>
      </div>
      <br>
      <div class="row mx-auto">
        <div class="col-12 col-lg-6">
          <a href="https://play.google.com/store/apps/details?id=br.com.tadepe&referrer=utm_source%3Dsite%26utm_medium%3Dbottom%26utm_content%3Dbaixe_tdp%26utm_campaign%3Dbottom_site" target="_blank"><img class="card-img-top gimage" src="/images/app-google-play.png" alt="Baixe agora!"></a>
        </div>
        <div class="col-12 col-lg-6">
          <a href="https://itunes.apple.com/br/app/t%C3%A1-de-p%C3%A9-fiscalize-a-escola/id1312975610?mt=8" target="_blank"><img class="card-img-top gimage" src="/images/app-store.png" alt="Baixe agora!"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Baixe -->
  <!-- Contato -->
  <div class="container text-center tadepe-page fix-mb">
    <div class="row">
      <div class="col-12">
        <h4>CONTATO</h4>
      </div>
      <div class="col-12">
        <p class="card-text fs">Ainda tem dúvidas ou deseja contribuir como engenheiro(a) no projeto Tá de Pé?</p>
        <p class="card-text fs">Entre em contato conosco pelo <a href="mailto:tadepe@transparencia.org.br">tadepe@transparencia.org.br</a></p>
        </p>
      </div>
    </div>
  </div>
  <img class="card-img-top img-fluid" src="/images/bottom.jpg" alt="Contato!">
</div>
</div>
<!-- Contato -->
<!-- Script do mapa -->
<script src="https://maps.googleapis.com/maps/api/js?&key=AIzaSyCtIIoMer4QzSmlqKiapmdWSzt57j04KCY&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="/scripts/mapa.js"></script>
