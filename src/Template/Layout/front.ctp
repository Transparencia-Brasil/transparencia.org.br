<?php
$cakeDescription = 'Transparência Brasil';
$exibeDoacao = isset($exibeDoacao) ? $exibeDoacao : true;
$slug = isset($slug) ? $slug : isset($slug_pai) ? $slug_pai : "";
?>
<!doctype html>
<html class="no-js" lang="pt-BR">

<head>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1034908453696902'); 
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=1034908453696902&ev=PageView
  &noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
  <?= $this->Html->charset() ?>
  <meta name="description" content="<?= $this->fetch('description'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>

  <link rel="icon" type="/image/png" href="<?= BASE_URL ?>favicon.png">
  <link rel="apple-touch-icon" href="<?= BASE_URL ?>TB-Whatsapp.png">
  <meta name="google-site-verification" content="2ECCPiNXGpB90HZCZZx8cI79rUzsXyDF29dJhfeqWcI" />

  <meta property="og:locale" content="pt_BR">
  <meta property="og:site_name" content="Transparência Brasil">
  <meta property="og:description" content="Somos uma entidade sem fins lucrativos que depende de doações para manter atividades de monitoramento do poder público e busca por transparência.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= BASE_URL ?>favicon.png">



  <?= $this->fetch('meta'); ?>

  <link rel="stylesheet" href="/styles/main.css">
  <?php
      if ($this->request->here == '/projetos/obratransparente') {
    ?>
  <link target="_blank" href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="/styles/obra-transparente.css">
  <?php
      }
    ?>

  <script src="/scripts/vendor.js"></script>

  <script src="/scripts/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Ads: 863777578 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-863777578"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-863777578');
    gtag('config', 'UA-64813818-1');
  </script>

  <script type="text/javascript">
    var base_url = '<?= BASE_URL ?>';
  </script>

  <!-- MailChimp -->
  <script id="mcjs">
    ! function(c, h, i, m, p) {
      m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
    }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/e992394b8c3fe378f5c15d1cb/f0120a3476f0763716e6342df.js");
  </script>
</head>

<body>
  <?php
  if (!isset($showHeader)) {
  ?>
    <header class="new-header">
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="container pb-2 pt-3 pr-0">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="row new-menu">
            <div class="col-3">
             <a href="/"><img src="/img/logos/logo.svg?cache=3" class="d-inline-block logo-image"></a>
            </div>
            <div class="col-lg-9 col-8 pr-0 pt-4">
              <div class="navbar-nav justify-content-end new-social d-none d-lg-block">
                <a class="nav-item nav-link" onclick='registrarEvento("home_social","clique","facebook")' href="https://www.facebook.com/pages/Transpar%C3%AAncia-Brasil/280994653587" target="_blank"><img src="<?= BASE_URL ?>images/icon-facebook.png" alt="Facebook"></a>
                <a class="nav-item nav-link" onclick='registrarEvento("home_social","clique","twitter")' href="https://twitter.com/trbrasil" target="_blank"><img src="<?= BASE_URL ?>images/icon-twitter.png" alt="Twitter"></a>
                <a class="nav-item nav-link" href="https://www.youtube.com/channel/UC0u-wEXIkxqq1hVUMtETfcA" onclick='registrarEvento("home_social","clique","youtube")' target="_blank"><img src="<?= BASE_URL ?>images/icon-youtube.png" alt="Sound Cloud"></a>
                <a class="nav-item nav-link" href="https://soundcloud.com/transpar-ncia-brasil" onclick='registrarEvento("home_social","clique","soundcloud")' target="_blank"><img src="<?= BASE_URL ?>images/icon-soundcloud.png" alt="Youtube"></a>
              </div>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav menu justify-content-end">
                  <a title="Quem Somos" class="nav-item nav-link menu <?= $slug_pai == "quem-somos" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","quem-somos")' href="<?= $this->Url->build(['controller' => 'QuemSomos#quem-somos', 'action' => 'index']) ?>">Quem somos</a>
                  <a title="Apoie" class="nav-item nav-link menu <?= $slug_pai == "apoie" ? "ativo" : "" ?>" onclick="registrarEvento('menu_superior', 'clique', 'apoie')" href="<?= $this->Url->build(['controller' => 'Apoie', 'action' => 'index']) ?>">Apoie</a>
                  <a title="Projetos" class="nav-item nav-link menu <?= $slug_pai == "projetos" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","projetos")' href="<?= $this->Url->build(['controller' => 'Projetos', 'action' => 'index']) ?>">Projetos</a>
                  <a title="Blog" class="nav-item nav-link menu <?= $slug_pai == "blog" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","blog")' href="https://www.transparencia.org.br/blog">Blog</a>
                  <a title="Publicações" class="nav-item nav-link menu <?= $slug_pai == "publicacoes" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","publicacoes")' href="<?= $this->Url->build(['controller' => 'Publicacoes', 'action' => 'index']) ?>">Publicações</a>
                  <a title="Notícias" class="nav-item nav-link menu <?= $slug_pai == "noticias" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","noticias")' href="<?= $this->Url->build(['controller' => 'Noticias', 'action' => 'index']) ?>">Notícias</a>
                  <a title="Contato" class="nav-item nav-link menu <?= $slug_pai == "contato" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","contato")' href="<?= $this->Url->build(['controller' => 'Contato', 'action' => 'index']) ?>">Contato</a>
                  <a title="Newsletter" class="nav-item nav-link menu <?= $slug_pai == "newsletter" ? "ativo" : "" ?>" onclick='registrarEvento("menu_superior","clique","newsletter")' href="<?= $this->Url->build(['controller' => 'Newsletter', 'action' => 'index']) ?>">Newsletter</a>
                </div>
                <div class="d-block d-lg-none new-social-mobile">
                  <a class="nav-item nav-link" onclick='registrarEvento("home_social","clique","facebook")' href="https://www.facebook.com/pages/Transpar%C3%AAncia-Brasil/280994653587" target="_blank"><img src="<?= BASE_URL ?>images/icon-facebook.png" alt="Facebook"></a>
                  <a class="nav-item nav-link" onclick='registrarEvento("home_social","clique","twitter")' href="https://twitter.com/trbrasil" target="_blank"><img src="<?= BASE_URL ?>images/icon-twitter.png" alt="Twitter"></a>
                  <a class="nav-item nav-link" href="https://www.youtube.com/channel/UC0u-wEXIkxqq1hVUMtETfcA" onclick='registrarEvento("home_social","clique","youtube")' target="_blank"><img src="<?= BASE_URL ?>images/icon-youtube.png" alt="Sound Cloud"></a>
                  <a class="nav-item nav-link" href="https://soundcloud.com/transpar-ncia-brasil" onclick='registrarEvento("home_social","clique","soundcloud")' target="_blank"><img src="<?= BASE_URL ?>images/icon-soundcloud.png" alt="Youtube"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>

  <?php
  }
  ?>


  <div class="wr wr-content">
    <?= $this->fetch('content') ?>
  </div>

  <?php
  if ((isset($showDonationBox) && $showDonationBox) || !isset($showDonationBox)) {
  ?>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="donate-box text-center">
            <p class="text-gray">Ajude-nos nesta causa, doe para a Transparência Brasil</p>
            <p>Somos uma entidade sem fins lucrativos que depende de doações para manter atividades de monitoramento do poder público e busca por transparência. Ajude-nos a continuar esse trabalho independente.</p>
            <a href="/apoie/doacoes">
              <img class="donate" src="<?= BASE_URL ?>images/ico-doacao.png" onclick='registrarEvento("botao_<?= str_replace("-", "_", $slug) ?>","clique","doacao_pontual")' alt="Pague com PagSeguro - é rápido, grátis e seguro!">
            </a>
            <p class="text-gray"> Doe com Paypal</p>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="68FLUZYMNX6G4">
              <input type="image" class="donation-button" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!" onclick='registrarEvento("botao_<?= str_replace("-", "_", $slug) ?>","clique","botao_paypal")'>
              <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>


  <footer>
    <?php
    if ((isset($showNewsletterBox) && $showNewsletterBox) || !isset($showNewsletterBox)) {
    ?>
      <div class="container-fluid" style="background-color: #f9a521;">
        <div class="container py-2">
          <div class="row pb-3">
            <!-- Form   -->
            <?= $this->Form->create(null, ['url' => '/newsletter/novoContato', "id" => "frmNewsletter", "class" => "form-inline contact-form col-12"]) ?>
            <div class="col-12 col-lg-4 details">
              ASSINE NOSSA NEWSLETTER MENSAL
            </div>
            <div class="col-12 col-lg-3">
              <?= $this->Form->input('', ['id' => 'news_nome', 'value' => $contato->Nome, 'placeholder' => 'Nome', 'class' => 'form-control nome', 'for' => 'inlineFormInput']) ?>
            </div>

            <div class="col-12 py-2 py-lg-0 col-lg-3">
              <?= $this->Form->input('', ['id' => 'news_email', 'value' => $contato->Email, 'placeholder' => 'Email', 'class' => ' form-control email', 'for' => 'inlineFormInput']) ?>
            </div>

            <div class="col-12 col-lg-auto text-center">
              <input type="hidden" name="origem" value="rodape">
              <button class="g-recaptcha btn-secondary bt_send_newsletter" 
                  id="grecaptcha-btn-news" 
                  data-formid="#frmNewsletter"
                  data-sitekey="<?=$grsiteKey?>"   
                  data-callback='onSubmitRecaptchaNewsltter' 
                  data-actionOrigem = "ajax-newsletter"
                  data-action='submit'>Enviar</button>
            </div>
            <?= $this->Form->end(); ?>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="details">
            <!--<p>R. Prof. João Marinho, 161, São Paulo - SP, 04007-010.<br>Tel.: +55 (11) 3259-6986 e +55 (11) 95050-4257.-->
            <p>R. Prof. João Marinho, 161, São Paulo - SP, 04007-010.<br> +55 (11) 95050-4257
              <br />
              E-mail: <a href="mailto:contato@transparencia.org.br">contato@transparencia.org.br</a>
            </p>
            <small>© <?= date('Y') ?> - TODOS OS DIREITOS RESERVADOS À TRANSPARÊNCIA BRASIL</small>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid fixed-bottom" style="background-color: #fccd83; display: none" id="divDisclaimer">
      <div class="disclaimer-layout container">
        Utilizamos cookies conforme descrito em nossa <a href="/politica-de-privacidade" style="color: #3d3d3c"><u>Política de Privacidade</u></a> e, ao seguir navegando, você concorda com essas condições.
        <button type="button" class="close btnClosedivDisclaimer" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </footer>
  <!-- footer -->

  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script src="/scripts/recaptcha.js"></script>
  <script src="/scripts/plugins.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>

  <div class="overlay" style="display:none"></div>
  <div class="all">
    <div class="container pop">
      <div class="bx-modal col-md-5" style="display:none">
        <div class="header">
          <h2 id="modal-titulo"></h2>
          <a class="btn-fechar"></a>
        </div>
        <div class="content">
          <p id="modal-texto"></p>
          <div id="modal-conteudo"></div>
        </div>
        <div class="footer" style="display:none">
          <div class="bx-btn">
            <a class="btn">Botão - esquerda</a>
          </div>
          <div class="bx-btn center">
            <a class="btn">Botão - centralizado</a>
          </div>
          <div class="bx-btn">
            <a class="btn fRight">Botão - direita</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {

      <?php
      if (strpos($_SERVER['REQUEST_URI'], 'politica-de-privacidade') === false) {
      ?>
        if ($.cookie('hasClosedModalDisclaimer') != 'true') {
          $('#divDisclaimer').show();
        }
      <?php
      }
      ?>
      $('.btnClosedivDisclaimer').on('click', function(e) {
        $('#divDisclaimer').hide();
        $.cookie('hasClosedModalDisclaimer', 'true', {
          expires: (1 / 24)
        });
      });


      $('#frmNewsletter').on('submit', function(e) {
        e.preventDefault();
        var _nome =  this.parentElement.parentElement.getElementsByClassName("nome")[0].value;
        var _email = this.parentElement.parentElement.getElementsByClassName("email")[0].value;
        var origem = this.parentElement.parentElement.querySelector('[name="origem"]').value;
        var token = this.parentElement.parentElement.querySelector('[name="token"]').value;
        var actionOrigem = this.parentElement.parentElement.querySelector('[name="actionOrigem"]').value;
        var this_click = this
        $.ajax({
          method: "POST",
          url: "/newsletter/novoContatoAjax",
          data: {
            optin_press: 1,
            optin_newsletter: 1,
            nome: _nome,
            email: _email,
            origem: origem,
            actionOrigem: actionOrigem,
            token: token
          }
        }).done(function(response) {
          if (response.sucesso == 1) {
            this_click.parentElement.parentElement.getElementsByClassName("nome")[0].value = "";
            this_click.parentElement.parentElement.getElementsByClassName("email")[0].value = "";
            gtag('event', 'conversion', {
              'send_to': 'AW-863777578/7BrZCOi8uJkBEKrm8JsD'
            });
          }
          abrirModal('', response.resposta, '', '');
        }).fail(function(error) {
          alert("error");
        })
        e.preventDefault();
      })
      $('#google_translate_element').hide();
      $('#translate').click(function(evt) {
        if (!$('#google_translate_element').is(':visible')) {
          $('#google_translate_element').show('slow');
        } else {
          $('#google_translate_element').hide('slow');
        }
      });


    });
  </script>
</body>

</html>