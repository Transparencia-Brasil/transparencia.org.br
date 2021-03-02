
<div class="container content-box">
<!-- 1 tela -->
  <div class="tadepe-page transparencia-algoritmica mr-1">
    <div class="row">
      <div class="col-md-12 col-xs-10 pb-4">
        <img class="card-img-top img-fluid" src="/images/logos/logo-transparencia-algoritmica.png" alt="Transparência Algorítmica">
      </div>
      <div class="col-md-12 col-xs-10">
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
          O projeto <strong>Transparência Algorítmica</strong> é financiado pelo <a href="https://www.icnl.org/" target="_blank"><strong>International Center of Not-for-Profit Law</strong></a>. O projeto conta com parcerias com representantes da academia (Northwestern University), da sociedade civil (Ceweb) e do governo federal (Controladoria-Geral da União e Ministério da Ciência, Tecnologia e Inovações).
        </p>
        <h6 class="pt-5">
          Publicações realizadas por este projeto:
        </h6>
        <p>
          <strong>Policy paper<br />
          Recomendações de governança<br /> 
          Uso de Inteligência Artificial pelo poder público
          </strong>
          <div class="btn-primary">
            <a href="/downloads/publicacoes/Recomendacoes_Governanca_Uso_IA_PoderPublico.pdf" class="btn" target="_blank">Leia na íntegra</a>
          </div>
        </p>
        <p class="pb-5">
          O documento apresenta as recomendações da ​Transparência Brasil para o desenvolvimento e uso de tecnologias relacionadas à Inteligência Artificial pelo setor público, elaboradas de  forma colaborativa com organizações da sociedade civil, atuantes na promoção de diferentes causas e direitos. O policy paper  traz uma análise de impactos negativos a direitos fundamentais para, ao final, oferecer recomendações de governança quanto à aplicação de sistemas de IA no setor público.
        </p>  
        <!-- <hr>
        <p class="pt-2">
          <strong>Estrutura de avaliação de riscos a direitos e de transparência no uso de algoritmos de inteligência artificial no setor público</strong>
          <div class="btn-primary">
            <a href="#" class="btn">Leia na íntegra</a>
          </div>
        </p>
        <p class="pb-5">
          O documento apresenta uma proposta para avaliação de riscos no uso de algoritmos de inteligência artificial pelo setor público, numa busca de alinhamento entre promoção de inovação e tecnologia e responsabilidade pública e transparência.
        </p>   -->
      </div>
    </div>
    <div class="row py-3 cta h-100">
      <div class="col-md-12 col-xs-10 p-3 cta-in">
        <!-- Form   -->
        <?= $this->Form->create(null, ['url' => '/newsletter/novoContato', "id" => "frmContatoTranspAlgo", "class" => "form-inline contact-form col-12 pb-3"]) ?>
        <div class="col-12 cta-tit text-center py-3">
          Quer receber novidades a respeito do uso de IA pelo governo?<br />
          Inscreva-se na nossa newsletter mensal: 
        </div>
        <div class="col-12 py-3">
          <?= $this->Form->input('', ['id' => 'news_nome_tb', 'value' => $contato->Nome, 'placeholder' => 'Nome', 'class' => 'form-control nome', 'for' => 'inlineFormInput']) ?>
        </div>
        <div class="col-12 py-3">
          <?= $this->Form->input('', ['id' => 'news_email_tb', 'value' => $contato->Email, 'placeholder' => 'Email', 'class' => ' form-control email', 'for' => 'inlineFormInput']) ?>
        </div>
        <div class="col-12 text-center">
          <input type="hidden" name="origem" value="projeto-transparencia-algoritmica">
          <button type="submit" class="btn-secondary bt_send_newsletter">Enviar</button>
        </div>
      </div>
    </div>      
    <div class="row">
      <div class="col-md-12 col-xs-10 pt-4">
        <h6 class="pt-5">Conheça as ferramentas de IA usada por órgãos governamentais</h6>
          <p>
            O catálogo de uso de Inteligência Artificial por órgãos governamentais visa contribuir para a transparência e controle social dos casos de uso de tecnologias de IA no setor público.
          </p>
          <p>
            <strong><a href="https://catalogoia.omeka.net/" target="_blank">Acesse aqui o catálogo.</a></strong>
          </p>
          <p>
            As informações foram coletadas por meio de pedidos de acesso à informação, busca nos sites oficiais e por um questionário elaborado em parceria com a Controladoria-Geral da União (CGU), o Ministério da Ciência, Tecnologia e Inovação (MCTI) e o Centro de Estudos sobre Tecnologias Web (Ceweb.br). O questionário foi enviado em setembro de 2020 a órgãos da administração pública direta e indireta do Executivo federal.
          </p>
          <p>
            O catálogo foi elaborado pelo Centro de Estudos sobre Tecnologias Web (Ceweb.br) do Núcleo de Informação e Coordenação do Ponto BR (NIC.br).
          </p>  
          <h6 class="pt-4">Monitore novas ferramentas de IA usadas pelo setor público por meio de algoritmo de busca automática</h6>
          <p>
            No nosso <strong><a href="https://github.com/Transparencia-Brasil/algoritmos-brasil" target="_blank">repositório público do GitHub</a></strong> é possível ter acesso ao código construído pela Transparência Brasil, com apoio da Northwestern University, que visa contribuir para que a sociedade civil possa monitorar novos casos de uso de tecnologias de IA que venham a ter menção em sites governamentais. 
          </p>
      </div>
    </div>
  </div>
</div>


