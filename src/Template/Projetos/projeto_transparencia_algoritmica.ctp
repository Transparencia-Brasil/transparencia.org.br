
<div class="container content-box">
<!-- 1 tela -->
  <div class="tadepe-page transparencia-algoritmica">
    <div class="row">
      <div class="col-md-12 col-xs-10 pb-4">
        <img class="card-img-top img-fluid" src="/images/logos/logo-transparencia-algoritmica.png" alt="Transparência Algorítmica">
          <p class="pt-3">
          <h2 class="text-center">WEBSEMINÁRIO AO VIVO E GRATUITO, PARTICIPE!</h2>
          <p class="text-center">
            Desafios de governança e riscos no uso de inteligência artificial pelo governo <br />
            Lançamento de policy paper com recomendações da sociedade civil <br />
            <strong>10/02 - quarta - feira - 10h30</strong>
          </p>
      </div>
      <div class="col-lg-6 col-12">
        <div class="row py-3">
          <div class="col-md-12 col-xs-10 p-0">
            <img class="card-img-top img-fluid" src="/images/webinar.png" alt="Webnirar">
          </div>
        </div>      
      </div>
      <div class="col-lg-6 col-12 py-3">
        <div class="row py-3 cta h-100">
          <div class="col-md-12 col-xs-10 p-3 cta-in">
            <!-- <p class="cta-txt px-4">
              1) Lançamento do policy paper com apresentação de recomendações para regulação de IA 
            </p>  
            <p class="cta-txt pb-3 px-4">
              2) Debate com representantes do governo, do Congresso e da sociedade sobre os riscos e desafios no uso de IA
            </p>   -->
            <!-- Form   -->
            <?= $this->Form->create(null, ['url' => '/newsletter/novoContato', "id" => "frmContatoTranspAlgo", "class" => "form-inline contact-form col-12 pb-3"]) ?>
            <div class="col-12 cta-tit text-center pb-3 pt-5">
              Deixe seu e-mail abaixo para ativar o LEMBRETE do Webseminário. 
            </div>
            <div class="col-12">
              <?= $this->Form->input('', ['id' => 'news_nome_tb', 'value' => $contato->Nome, 'placeholder' => 'Nome', 'class' => 'form-control nome', 'for' => 'inlineFormInput']) ?>
            </div>

            <div class="col-12 py-4">
              <?= $this->Form->input('', ['id' => 'news_email_tb', 'value' => $contato->Email, 'placeholder' => 'Email', 'class' => ' form-control email', 'for' => 'inlineFormInput']) ?>
            </div>
            <div class="col-12 text-center">
              <input type="hidden" name="origem" value="projeto-transparencia-algoritmica">
              <button type="submit" class="btn-secondary bt_send_newsletter">Enviar</button>
            </div>
          </div>
        </div>      
      </div>
      <h4 class="pt-5"> PAINELISTAS</h4>
      <div class="col-12 pt-lg-4 pt-1">
        <div class="row">
          <div class="col-md-3 cta-in">
            <p class="cta-tit px-4">
              <strong>Deputado federal Bosco Costa (PL-SE)</strong></p>
            </p>  
            <p class="cta-txt pb-3 px-4">
              <strong>Autor do PL 4120/2020 que disciplina o uso de algoritmos pelas plataformas digitais na internet.</strong>
            </p>  
          </div>     
          <div class="col-md-3 cta-in cta-border-l">
            <p class="cta-tit px-4">
              <strong>Lahis Kurtz</strong></p>
            </p>  
            <p class="cta-txt pb-3 px-4">
              <strong>Representante da Coalizão Direitos na Rede e Pesquisadora e coordenadora de projetos no Instituto de Referência em Internet e Sociedade (IRIS).</strong>
            </p>   
          </div>  
          <div class="col-md-3 cta-in cta-border-l">
            <p class="cta-tit px-4">
              <strong>José Gontijo</strong></p>
            </p>  
            <p class="cta-txt pb-3 px-4">
              <strong>Diretor do Departamento de Ciência, Tecnologia e Inovação Digital e secretário Substituto da Secretaria de Empreendedorismo e Inovação, do Ministério da Ciência, Tecnologia, Inovações e Comunicação (MCTIC).</strong>
            </p>  
          </div>  
          <div class="col-md-3 cta-in cta-border-l">
            <p class="cta-tit px-4">
              <strong>Juliana Sakai</strong></p>
            </p>  
            <p class="cta-txt pb-3 px-4">
              <strong>Diretora de operações da Transparência Brasil.</strong>
            </p>   
          </div>  
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-10">
        <h4 class="pt-5">CONHEÇA O PROJETO TRANSPARÊNCIA ALGORÍTMICA</h4>
          <p>
            <strong>Um projeto de monitoramento do uso de algoritmos de inteligência artificial pelo governo, que visa contribuir para a mais transparência e governança, com a participação da sociedade civil.</strong>
          </p>
          <p>
            Tecnologias de inteligência artificial vêm sendo usadas pelos governos para tomada de decisão em setores importantes como saúde, educação, justiça criminal, habitação e emprego - influenciando decisões que afetam indivíduos e a sociedade como um todo. Seu uso pode ser largamente benéfico para fortalecer processos administrativos, investigatórios, decisórios, e aumentar a eficácia e a eficiência do poder público. 
          </p>
          <p>
            Devido ao seu poder de impactar na vida dos cidadãos e no próprio espaço cívico, é fundamental que o uso de tais ferramentas seja adequadamente transparente para garantir possibilidade de prestação de contas e acompanhamento em seus processos de desenvolvimento, aquisição e implementação, de forma que a sociedade consiga monitorar e corrigir falhas, injustiças e até abusos no uso de algoritmos. <strong>Seu uso deve ser exercido com especial atenção aos seus potenciais efeitos nos direitos e liberdades individuais e coletivos.
          </p>
          <p>
            O projeto<strong>Transparência Algorítmica</strong> é financiado pelo <a href="https://www.icnl.org/" target="_blank"><strong>International Center of Not-for-Profit Law</strong></a>. O projeto conta com parcerias com representantes da academia (Northwestern University), da sociedade civil (Ceweb) e do governo federal (Controladoria-Geral da União e Ministério da Ciência, Tecnologia e Inovações).
          </p>
          <h4 class="pt-5">Conheça as ferramentas de IA usada por órgãos governamentais</h4>
          <p>
            O catálogo de uso de Inteligência Artificial por órgãos governamentais visa contribuir para a transparência e controle social dos casos de uso de tecnologias de IA no setor público.
          </p>
          <p>
            <a href="https://catalogoia.omeka.net/" target="_blank">Acesse aqui o catálogo.</a>
          </p>
          <p>
            As informações foram coletadas por meio de pedidos de acesso à informação, busca nos sites oficiais e por um questionário elaborado em parceria com a Controladoria-Geral da União (CGU), o Ministério da Ciência, Tecnologia e Inovação (MCTI) e o Centro de Estudos sobre Tecnologias Web (Ceweb.br). O questionário foi enviado em setembro de 2020 a órgãos da administração pública direta e indireta do Executivo federal.
          </p>
          <p>
            O catálogo foi elaborado pelo Centro de Estudos sobre Tecnologias Web (Ceweb.br) do Núcleo de Informação e Coordenação do Ponto BR (NIC.br).
          </p>  
      </div>
  </div>
</div>