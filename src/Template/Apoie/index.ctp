
<?php
  $this->assign('description', 'Com sua doação, podemos manter a organização com sua atuação independente.');
?>

<!-- Título -->
<div class="container content-box">
  <div class="container">
  <div class="row">
    <div class="col pt-4"></div>
  </div>
      <div class="row pt-5">
        <div class="col-12 no_pd">
        <h2 class="title-pages">Apoie a Transparência Brasil</h2>
        <hr/>
        <p>
            A Transparência Brasil é uma organização independente e sem fins lucrativos que conta com o apoio da sociedade para manter atividades de monitoramento, 
            transparência e integridade do poder público. 
          <b> Sua contribuição é essencial para continuarmos atuando! </b>
        </p>
        </div>
  </div>
  <!-- Título -->

  <!-- Conteudo -->
  <div class="container">
<div class="row apoie-button">
    <div class="col-sm-2 apoie-icon">
        ICONE
    </div>
    <div class="col">
        <h3 class="apoie-title"><a href="/apoie/associados" class="btn btn-apoie">ASSOCIE-SE</a></h3>
        <p>Ao se associar, você, sua organização da sociedade civil ou sua empresa fortalecem uma das mais respeitadas organizações de combate 
            à corrupção e promoção da transparência pública, além de participarem diretamente na estrutura de governança da Transparência Brasil.</p>

        <p>A associação de pessoas físicas é feita por meio de contribuição mensal ou anual e dá a você o poder de:</p>

        <ul>
            <li>Participar com voz e voto na Convenção, a Assembleia Geral que, dentre outras atribuições, elege os Conselhos Fiscal e Deliberativo da TB;</li>
            <li>Contribuir com sugestões em processos institucionais, como planejamento estratégico;</li>
            <li>Ocupar cargos eletivos no Conselho Fiscal e Conselho Deliberativo;</li>
            <li>Acessar em primeira mão informações sobre atividades internas, projetos futuros e articulações da TB com outras organizações.</li>
        </ul>

        <p>Empresas apoiadoras não têm direito a voto nem a cargos em Conselhos.</p>

        <h5>Para onde vai a minha contribuição?</h5>

        <p>Ao se associar à TB, você garante a permanência de atividades transversais a todos os nossos projetos, 
            como iniciativas para aperfeiçoar propostas de lei e políticas públicas, e para pressionar órgãos públicos pelo 
            cumprimento dos deveres de transparência e integridade.
        </p>

        <p>Sua contribuição também assegura a continuidade de nossa interlocução com órgãos públicos com vistas a 
            colaborar com eles para o aprimoramento de sua integridade e transparência e, conforme necessário,
             provocá-los a agir em casos de violações.
        </p>

        <p>A produção de análises que revelam gargalos no acesso a informações e na eficiência do gasto público e
             a atuação da Transparência Brasil em demandas judiciais (como a que proibiu o Orçamento Secreto) 
             também são financiadas, em parte, pelas anuidades.
        </p>
    </div>
</div>

<div class="row apoie-button">
    <div class="col-sm-2 apoie-icon">
        ICONE
    </div>
    <div class="col">
        <h3 class="apoie-title"><a href="/associados/login" class="btn btn-apoie">RENOVE SUA ASSOCIAÇÃO OU ATUALIZE SEU CADASTRO</a></h3>
        <p>Deixou de ser associado(a) da Transparência Brasil ou sua associação está próxima de expirar? 
            Renove agora mesmo e continue sua participação em atividades, previstas no estatuto, 
            e contribua com o fortalecimento do nosso trabalho independente!</p>

        <p>Você pode atualizar seus dados cadastrais a partir <a href="https://docs.google.com/forms/d/e/1FAIpQLScloWXPsVKJ4Vrr8kyaFcx_B33TKL5BBd95ysTfWeB3sWli7w/viewform"> deste formulário.</a></p>
    </div>
</div>
</div>



<div class="row apoie-button">
    <div class="col-sm-2 apoie-icon">
        ICONE
    </div>
    <div class="col">
        <h3 class="apoie-title"><a href="/apoie/doacoes" class="btn btn-apoie">FAÇA UMA DOAÇÃO PONTUAL</a></h3>
        <p>Contribua com o valor que desejar para garantir a continuidade do nosso trabalho de controle social,
             criação de novas ferramentas que facilitem a fiscalização das contas e serviços públicos e promoção da democracia!</p>
    </div>
</div>

<!-- Conteudo -->

  <div class="container no_pd">
      <div class="row">

            <div class="col-12 text-center">
                    <?php
                        // printa o botão caso o bloqueador de popus esteja ligado
                        if(isset($redirectDoacao) && $redirectDoacao === true)
                        {
                            echo "<p><h2 style='color:red;'>Clique no botão abaixo caso a página do PagSeguro não seja aberta (bloqueio de popups):</h2>";
                            echo '<form target="_blank" action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post"><input type="hidden" name="currency" value="BRL" /><input type="hidden" name="receiverEmail" value="doacoes@transparencia.org.br" /><input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/209x48-doar-assina.gif" onclick="registrarEvento(\'botao_doacao_pos_cadastro\', \'clique\', \'doacao\')" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></form></p>';
                            ?>
                            <!-- Google Code for convers&atilde;o doa&ccedil;&atilde;o Conversion Page  -->
                            <script type="text/javascript">
                            /* <![CDATA[ */
                            var google_conversion_id = 863777578;
                            var google_conversion_language = "en";
                            var google_conversion_format = "3";
                            var google_conversion_color = "ffffff";
                            var google_conversion_label = "t3DRCI6Ikm0QqubwmwM";
                            var google_remarketing_only = false;
                            /* ]]> */
                            </script>
                            <script type="text/javascript"
                            src="//www.googleadservices.com/pagead/conversion.js">
                            </script>
                            <noscript>
                            <div style="display:inline;">
                            <img height="1" width="1" style="border-style:none;" alt=""

                            src="//www.googleadservices.com/pagead/conversion/863777578/?label=t3DRCI6Ikm0QqubwmwM&amp;guid=ON&amp;script=0"/>
                            </div>
                            </noscript>
                            <?php
                        }

                    ?>
            </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        <?php
            $mensagem = $this->Flash->render();
            if(strlen($mensagem) > 0)
                echo "abrirModal('','". $mensagem . "');";

            if(strlen(isset($redirectDoacao)) && $redirectDoacao === true)
                echo "abrirDoacao();";
        ?>

    });
</script>
<!-- Conteudo -->