
<?php
  $this->assign('description', 'Com sua doação, podemos manter a organização com sua atuação independente.');
?>


<!-- Título -->
<div class="container content-box">
  <div class="container">
      <div class="row">
        <div class="col-12 px-0 pb-3">
        <img src="images/topos/camara.jpg" width="100%" class="img-fluid" alt="Apoie a Transparência Brasil">
        </div>
        <div class="col-12 no_pd">
        <h2 class="title-pages">Apoie a Transparência Brasil</h2>
        <hr/>
        <p>A Transparência Brasil é uma organização independente, sem fins lucrativos que depende do apoio da sociedade para manter atividades de monitoramento do poder público e busca por transparência.</p>
        <p>Com sua doação, podemos manter a organização com sua atuação independente e você também colabora com o desenvolvimento de novos projetos que visam a aumentar o controle social sobre a administração pública.</p>
      </div>
  </div>
  <!-- Título -->

  <!-- Conteudo -->
<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-block">
                <h3 class="card-title">Faça uma doação pontual!</h3>
                <p class="card-text">Doe e contribua com nosso trabalho de combate à corrupção e fortalecimento do controle social por meio do uso de tecnologia.</p>
                <p class="card-text">Ajude a Transparência Brasil a continuar cobrando por mais transparência e a criar novas ferramentas que facilitem a fiscalização das contas e serviços públicos.</p>
                <div class="card-block px-0">
                <div class="btn-primary">
                <a href="/apoie/doacoes" class="btn">Fazer uma doação pontual</a>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-block">
                <h3 class="card-title">Associe-se!</h3>
                <p class="card-text">A promoção da transparência e do acesso à informação é uma medida indispensável para o fortalecimento da democracia e para a melhoria da gestão pública.</p>
                <p class="card-text">Ao se tornar um associado, você fortalece uma das mais respeitadas organizações de combate à corrupção e contribui com sua estruturação.</p>
                <div class="btn-primary">
                <a href="/apoie/associados" class="btn">Associar-se</a>
                </div>
            </div>
        </div>
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