

<div class="container content-box">
  
  <div class="tadepe-page">
    <div class="row">
      <div class="col-md-6 col-xs-10">
        <img class="card-img-top img-fluid" src="/images/logos/logo-ta-de-pe.png" alt="Tá De Pé">
        <div class="title">a cobrança move a obra</div>
        <p>Mais de 5 mil obras de escolas financiadas pelo governo federal país afora ainda precisam ser concluídas. Metade já deveria ter sido entregue! Pressione os governantes a entregar essas creches e escolas, fiscalizando a obra com o chatbot Tá de Pé.
		<p>Para saber mais sobre a situação das obras, confira nosso último <a href="https://www.transparencia.org.br/blog/mais-de-2-mil-construcoes-de-creches-e-escolas-financiadas-pelo-fnde-estao-paralisadas-maioria-ja-deveria-ter-sido-entregue/" target="_blank">levantamento</a> a respeito.</p>
        <h5>#fiquenopé</h5>
        <div class="row">
          <div class="col-12 col-lg-6 my-auto">
            <a href="https://bit.ly/ChatbotTaDePe" target="_blank"><img src="/images/Botao_Wapp.png" alt="Comece a conversa!"></a>
          </div>
        <div class="col-12 col-lg-6">
            <img src="/images/QRCode_TDP.png" width="130" alt="Fiscalize!"></a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-10">
        <img class="card-img-top img-fluid mgb30" src="/images/TDP_cel.png" alt="Tá De Pé">
      </div>
    </div>
    

    
    <div class="row">
      <div class="col-md-6 col-xs-10">
        <video width="250" controls autoplay muted><source src="/images/TDP2.mp4" type="video/mp4"></video>
      </div>
      <div class="col-md-6 col-xs-10 my-auto">
        <div class="im-title-box mgb30">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/tijolo.png" alt="tijolo!">
          <h4 class="inline-b im-text">COMO FICAR NO PÉ DO GOVERNO?</h4>
        </div>
        <div class="txt-p mt-3">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/one.png" alt="tijolo!">
          <p class="im-text inline-b mt-3">Inicie a conversa com o chatbot Tá de Pé no WhatsApp por meio do link acima.</p>
        </div>
        <div class="txt-p pb-4">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/two.png" alt="tijolo!">
          <p class="im-text inline-b">Compartilhe sua localização ou informe seu estado e município para encontrar obras perto de você.</p>
        </div>
        <div class="txt-p">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/three.png" alt="tijolo!">
          <p class="im-text inline-b mt-1">Vá até o local e nos informe de possíveis problemas, seja no andamento das obras (paralisação, atraso, ausência de placa etc.), ou nos dados oficiais (endereço incorreto, escola ou quadra já inaugurada etc.).</p>
        </div>
        <div class="txt-p">
          <img class="card-img-top img-fluid inline-b im-title" src="/images/four.png" alt="tijolo!">
          <p class="im-text inline-b mt-3">Se possível, envie uma foto que retrate bem o estado da obra.</p>
        </div>
      </div>
    </div>
    
  
    <div class="tadepe-page text-center tbox orange">
      <div class="row">
        <div class="col-12">
          <h4>OBRAS</h4>
          <h5>Veja como estão as obras na sua região e ajude a fiscalizá-las!</h5>
        </div>
        <div class="col-12">
          <input id="pac-input" class="controls" type="text" placeholder="Pesquisar endereço" style="margin-top:10px;padding:10px;height:40px;width:500px;border-radius:2px;box-shadow:rgba(0,0,0,.3) 0 1px 4px -1px;border:#fff;font-size:14px;z-index:1;position:absolute;left:205px;top:0" autocomplete="on">
          <div id="map"></div>
          <br>
          <div class="row">
            <div class="col-6 text-left">
              <h6>Filtrar obras</h6>
              <input type="checkbox" onchange="filterMarkers(this)" class="can-overlap" name="map-filters" value="delayed" checked="checked">Atrasadas<br>
              <input type="checkbox" onchange="filterMarkers(this)" class="can-overlap" name="map-filters" value="paralyzed" checked="checked">Paralisadas<br>
              <input type="checkbox" onchange="filterMarkers(this)" class="can-overlap" name="map-filters" value="not-started" checked="checked">Não iniciadas<br>
              <input type="checkbox" onchange="filterMarkers(this)" class="can-overlap" name="map-filters" value="no-address" checked="checked">Sem endereço informado<br>
              <input type="checkbox" onchange="filterMarkers(this)" class="can-overlap" name="map-filters" value="no-problems" checked="checked">Sem evidência de problemas<br>
            </div>
            <div class="col-6">
            <h6>Legenda</h6>
              <div class="text-left"> <div class="map-subtitle-box" style="background:#00f"></div> Obra sem evidência de problema¹</div>
              <div class="text-left"> <div class="map-subtitle-box" style="background:#da7144"></div> Obra com problemas</div>
              <div class="text-left">Obras com contorno <b>preto</b> estão no chatbot²</div>
              <p class="text-left"><b>Total de obras: <span id="count-number">0</span></b></p>
            </div>
          </div>
        </div>
        <div class="grey px-3 mt-5">
          <p class="legenda">¹ A falta de evidência de problemas não significa que não haja atrasos ou outras incongruências na obra, mas apenas que não foi possível identificá-los a partir do cruzamento de dados públicos, sem a fiscalização cidadã in loco. Envie fotos de obras perto de você pelo app para que possamos avaliar o andamento da obra.</p>
          <p class="legenda">² No mapa estão 5,3 mil obras de escolas e creches que ainda não foram entregues. Dessas, 3,7 mil podem ser fiscalizadas pelo app Tá de Pé ou pelo Twitter, compartilhando foto das obras com a hashtag #tadepeobras. As demais obras não estão no app, porque seus cronogramas oficiais não foram disponibilizados pelo governo. A falta de transparência limita a fiscalização cidadã.  </p>
          <p class="legenda"><b>Última atualização realizada em 19 de Abril de 2021.</b></p>
        </div>
      </div>
    </div>


    
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
    
  </div>
    
  <div class="tadepe-page text-center tbox orange">
    <div class="row">
      <div class="col-12">
        <h4>FINANCIAMENTO</h4>
      </div>
      <div class="col-12 mgt30">
        <p class="card-text">Esta versão do Tá de Pé é financiada pela <b>Tinker Foundation</b>.
        </p>
        <img class="img-fluid" src="/images/logos/logo-tinker.png" alt="Tinker Foundation">
		<p class="card-text">O Tá de Pé surgiu como um aplicativo premiado com o Desafio Google de Impacto Social 2016 na categoria voto popular, com a participação de 200 mil pessoas. Em 2021, o chatbot no WhatsApp substituiu o app.</p>
      </div>
    </div>
  </div>
  

  
  <div class="tadepe-page text-center tbox">
    <div class="row">
      <div class="col-12">
        <h4>PARCEIROS</h4>
      </div>
      <div class="col-12 mgt30">
        <p class="card-text fs">A viabilização do projeto só é possível graças a parcerias com engenheiros voluntários em todo o país.</p>
        <p class="card-text fs">Junte-se a este time de engenheiros voluntários! <br>
        Entre em contato por e-mail: tadepe@transparencia.org.br<br>
      </div>
      <!-- <div class="col-md-4">
        <img class="img-fluid" src="/images/logos/logo-engenheiros.png" alt="Engenheiros Sem Fronteiras - Brasil">
          <p class="card-text mg-fix">
          Núcleo Vitória - ES<br>
          Núcleo Goiânia - GO<br>
          Núcleo Uberaba - MG<br>
          Núcleo Curitiba - PR<br>
          Núcleo São Paulo - SP<br>
          Núcleo Feevale - RS
          </p>
      </div>
      <div class="col-md-4 pdr40">
        <img class="img-fluid" src="/images/logos/logo-crea.png" alt="Conselho Regional de Engenharia e Agronomia de Pernambuco">
      </div>
      <div class="col-md-4 text-left align-self-start pdl40">
        <img class="img-fluid" src="/images/logos/logo-caindo_no_brasil.png" alt="Caindo no Brasil">
      </div> -->
    </div>
  </div>
  

  
  <div class="accord faq tadepe-page">
      <div id="accordion">
          <h4 class="text-center mgb30">DÚVIDAS FREQUENTES</h4>
          
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Como eu devo tirar as fotos da obra?                    </div>
                </div>
            </a>
              <div id="collapse1" class="panel-collapse collapse in">
                  <div class="card-block">
                      A Transparência Brasil aconselha que os cidadãos não tentem entrar em uma obra, esteja ela parada ou em execução. Você deverá tirar fotos do lado de fora, prestando atenção nas paredes, telhados, colunas, estruturas expostas, janelas, portas e em qualquer coisa que você considere não estar certo naquela obra. Tire também fotos da placa da obra, pois ela pode apresentar irregularidades.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        É possível saber a identidade de quem enviou o alerta?                    </div>
                </div>
            </a>
              <div id="collapse2" class="panel-collapse collapse in">
                  <div class="card-block">
                      Somente a Transparência Brasil terá acesso ao número da pessoa que enviou o alerta, e não compartilhará essa informação com ninguém - nem os órgãos públicos, nem o financiador do projeto.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Por que o Tá de Pé só trabalha com obras de escolas e creches?                    </div>
                </div>
            </a>
              <div id="collapse3" class="panel-collapse collapse in">
                  <div class="card-block">
                      A Transparência Brasil considera fundamental o acesso a infraestrutura educacional para a melhoria da educação no Brasil, e por isso decidimos escolher esse conjunto de obras para lançar a ferramenta. Futuramente, o Tá de Pé irá trabalhar com outros tipos de obras públicas.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Porque não consigo ver a obra do lado da minha casa?                    </div>
                </div>
            </a>
              <div id="collapse4" class="panel-collapse collapse in">
                  <div class="card-block">
                      O Tá de Pé atualmente trabalha com escolas e creches financiadas pelo governo federal em parceria com prefeituras municipais cujos cronogramas estão disponíveis. Se a obra que você procura não está no aplicativo, ou ela não compreende a esses critérios ou ela ainda será adicionada ao aplicativo.                  </div>
              </div>
          </div>

          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Quais são os critérios para requisitar que uma obra seja inserida na lista?                    </div>
                </div>
            </a>
              <div id="collapse5" class="panel-collapse collapse in">
                  <div class="card-block">
                      Basta enviar uma foto da placa da obra com o endereço completo de onde está sendo construída por e-mail para tadepe@transparencia.org.br.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        O aplicativo só mostra obras nas cidades vizinhas, mas não na minha.                    </div>
                </div>
            </a>
              <div id="collapse6" class="panel-collapse collapse in">
                  <div class="card-block">
                      Nem todos os municípios brasileiros têm obras de escolas ou creches financiadas pelo governo federal. Quando isso acontece, o aplicativo mostra as obras mais próximas, que às vezes se encontram em municípios vizinhos.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Posso enviar mais de uma foto por alerta?                    </div>
                </div>
            </a>
              <div id="collapse7" class="panel-collapse collapse in">
                  <div class="card-block">
                      Não. No momento, o chatbot só aceita o envio de uma imagem. Em breve, será possível enviar mais de uma foto.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        O que acontece com o alerta que eu enviei?                    </div>
                </div>
            </a>
              <div id="collapse8" class="panel-collapse collapse in">
                  <div class="card-block">
                      Seu alerta é encaminhado para os nossos engenheiros voluntários, que irão verificar se elas apresentam ou não indícios de atrasos em relação ao cronograma oficial daquela obra. Caso sejam verificados indícios de atraso, a Transparência Brasil entrará em contato com a prefeitura do seu município, que terá 15 dias para responder. Se  dentro desse prazo a prefeitura não se pronunciar, entraremos em contato com os vereadores do seu município e com o Ministério da Educação, que também têm 15 dias para responder. Se mesmo assim o alerta permanecer sem resposta, a Transparência Brasil acionará a Controladoria-Geral da União (CGU), órgão de controle do governo federal, para tomar as medidas cabíveis.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Como saberei o que aconteceu com o meu alerta?                    </div>
                </div>
            </a>
              <div id="collapse9" class="panel-collapse collapse in">
                  <div class="card-block">
                      O seu alerta gerará um número de protocolo que você usará para acompanhar pelo chatbot se o governo respondeu.                 </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Outras pessoas poderão ver as fotos que eu enviei?                    </div>
                </div>
            </a>
              <div id="collapse10" class="panel-collapse collapse in">
                  <div class="card-block">
                      Não. Apenas você, os engenheiros e as instâncias notificadas terão acesso a essas fotos.                  </div>
              </div>
          </div>
          <div class="card">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse11">
                <div class="card-header link-q">
                    <div class="faq-q card-header">
                        Outras pessoas terão acesso às respostas que eu recebi para o meu alerta?                    </div>
                </div>
            </a>
              <div id="collapse11" class="panel-collapse collapse in">
                  <div class="card-block">
                      Não, apenas você e a Transparência Brasil terão acesso às respostas.                  </div>
              </div>
          </div>

      </div>
  </div>
  

  
  <div class="jumbotron container text-center tadepe-page">
    <div class="row">
      <div class="col-12">
        <h4>USE O CHATBOT TÁ DE PÉ</h4>
      </div>
      <br>
      <div class="row mx-auto">
        <div class="col-12 col-lg-6 my-auto">
          <a href="https://bit.ly/ChatbotTaDePe" target="_blank"><img class="card-img-top gimage" src="/images/Botao_Wapp.png" alt="Comece a conversa!"></a>
        </div>
        <div class="col-12 col-lg-6">
          <img class="card-img-top gimage" src="/images/QRCode_TDP.png" width="130" alt="Fiscalize!"></a>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="container text-center tadepe-page fix-mb">
    <div class="row">
      <div class="col-12">
        <h4>CONTATO</h4>
      </div>
      <div class="col-12">
        <p class="card-text fs">Ainda tem dúvidas ou deseja contribuir como engenheiro(a) no projeto Tá de Pé?</p>
        <p class="card-text fs">Entre em contato conosco pelo tadepe@transparencia.org.br</p>
        <p></p>
      </div>
    </div>
  </div>
  <img class="card-img-top img-fluid" src="/images/bottom.jpg" alt="Contato!">
</div>
<!-- Contato -->
<!-- Script do mapa -->
<script src="https://maps.googleapis.com/maps/api/js?&key=AIzaSyCtIIoMer4QzSmlqKiapmdWSzt57j04KCY&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="/scripts/mapa.js"></script>
