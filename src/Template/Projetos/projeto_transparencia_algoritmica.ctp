

<div class="container content-box">

<!-- 1 tela -->
<div class="tadepe-page transparencia-algoritmica">
  <div class="row">
    <div class="col-md-12 col-xs-10">
      <img class="card-img-top img-fluid" src="/images/logos/logo-transparencia-algoritmica.png" alt="Transparência Algorítmica">
        <p class="pt-3">
          <strong>Um projeto de monitoramento do uso de algoritmos de inteligência artificial pelo governo, que visa contribuir para a mais transparência e governança, com a participação da sociedade civil.</strong>
        </p>
        <p>
          Tecnologias de inteligência artificial vêm sendo usadas pelos governos para tomada de decisão em setores importantes como saúde, educação, justiça criminal, habitação e emprego - influenciando decisões que afetam indivíduos e a sociedade como um todo. Seu uso pode ser largamente benéfico para fortalecer processos administrativos, investigatórios, decisórios, e aumentar a eficácia e a eficiência do poder público. 
        </p>
        <p>
          Devido ao seu poder de impactar na vida dos cidadãos e no próprio espaço cívico, é fundamental que o uso de tais ferramentas seja adequadamente transparente para garantir possibilidade de prestação de contas e acompanhamento em seus processos de desenvolvimento, aquisição e implementação, de forma que a sociedade consiga monitorar e corrigir falhas, injustiças e até abusos no uso de algoritmos. <strong>Seu uso deve ser exercido com especial atenção aos seus potenciais efeitos nos direitos e liberdades individuais e coletivos.
        </p>
        <div class="row py-3 cta">
          <div class="col-md-12 col-xs-10 p-3 cta-in">
            <p class="cta-txt px-4">
              Vamos mostrar quais ferramentas de Inteligência Artificial o governo utiliza, seus riscos e recomendações de como obter mais transparência governamental na área. 
            </p>  
            <p class="cta-txt pb-3 px-4">
              <strong>10/02/2021 - 10h30 - Online e ao vivo com convidados especialistas.</strong> <br />
              Deixe seu contato abaixo e receba o convite em primeira mão e nossas comunicações sobre este e outros temas.
            </p>  
              <!-- Form   -->
              <?= $this->Form->create(null, ['url' => '/newsletter/novoContato', "id" => "frmContatoTranspAlgo", "class" => "form-inline contact-form col-12 pb-3"]) ?>
              <div class="col-12 col-lg-4 cta-tit">
                RECEBA NOSSAS <br />COMUNICAÇÕES
              </div>
              <div class="col-12 col-lg-3">
                <?= $this->Form->input('', ['id' => 'news_nome_tb', 'value' => $contato->Nome, 'placeholder' => 'Nome', 'class' => 'form-control nome', 'for' => 'inlineFormInput']) ?>
              </div>

              <div class="col-12 py-2 py-lg-0 col-lg-3">
                <?= $this->Form->input('', ['id' => 'news_email_tb', 'value' => $contato->Email, 'placeholder' => 'Email', 'class' => ' form-control email', 'for' => 'inlineFormInput']) ?>
              </div>
              <div class="col-12 col-lg-auto text-center pt-lg-0 pt-4">
                <input type="hidden" name="origem" value="projeto-transparencia-algoritmica">
                <button type="submit" class="btn-secondary bt_send_newsletter">Enviar</button>
              </div>
            </div>
        </div>      
        <p>
          O projeto<strong>Transparência Algorítmica</strong> é financiado pelo <a href="https://www.icnl.org/" target="_blank"><strong>International Center of Not-for-Profit Law</strong></a>. O projeto conta com parcerias com representantes da academia (Northwestern University), da sociedade civil (Ceweb) e do governo federal (Controladoria-Geral da União e Ministério da Ciência, Tecnologia e Inovações).
        </p>
    </div>
  </div>
</div>
<!-- 1 tela -->
