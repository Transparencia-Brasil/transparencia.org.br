<?php
$cakeDescription = 'Transparência Brasil';
$base_url = $this->Url->build('/');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <?= $this->Html->charset() ?>
    <title>
    	<?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->fetch('meta');
    echo $this->Html->css('/css/jquery.bxslider.css', ['rel' => 'stylesheet', 'media' => 'all']);
    echo $this->Html->css('/css/main.css', ['rel' => 'stylesheet', 'media' => 'all']);
    echo $this->Html->script('/js/jquery-1.11.3.min.js');
    ?>
    <link rel="stylesheet" href="/css/projetos.css" type="text/css" />
    <script type="text/javascript">
        var base_url = '<?=base_url?>';
    </script>
</head>
<body>
   <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wr wr-site">
        <div class="wr wr-header">
            <div class="ct ct-mn">
                <div class="bx-logo">
                <a href="<?=$this->Url->build(['controller' => 'Home', 'action' => 'index'])?>">
                    <img src="<?=$base_url?>img/logo-header.png" alt="Transparência Brasil" />
                    <h1>
                        Transparência<span>Brasil</span>
                    </h1>
                </a>
                </div>
                <div class="mn">
                    <ul>
                        <li><a href="<?=$this->Url->build(['controller' => 'Home', 'action' => 'index'])?>">Home</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'QuemSomos', 'action' => 'index'])?>">Quem Somos</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Projetos', 'action' => 'index'])?>">Projetos</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Publicacoes', 'action' => 'index'])?>">Publicações</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Associados', 'action' => 'index'])?>">Associe-se</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Imprensa', 'action' => 'index'])?>">TB na imprensa</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Midias', 'action' => 'index'])?>">Mídias</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Contato', 'action' => 'index'])?>">Contato</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Blog', 'action' => 'index'])?>" class="last">Blog</a></li>
                        <li><a href="<?=$this->Url->build(['controller' => 'Newsletter', 'action' => 'index'])?>">Newsletter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wr wr-content">
            <?= $this->fetch('content') ?>
        </div>
        <div class="wr wr-donate">
            <div class="bx-donate">
                <h2>Faça sua doação para o Transparência Brasil</h2>
                <div class="wr bx-img">
                    <img src="<?=$base_url?>img/ico-donate.png" />
                </div>
                <div class="wr bx-btn">
                    <a class="btn">Clique Aqui</a>
                </div>
            </div>
        </div>
        <div class="wr wr-footer">
            <div class="ct ct-footer">
                <p>
                    Endereço: Rua Barão de itapetininga, 88 - Sala 807. CEP: 01042-906 São Paulo (SP).
                    Tel: (11) 3259-6986
                </p>
                <p class="copyright">© 2015 - Todos os direitos reservados à Transparência Brasil</p>
                <div class="trad" id="google_translate_element"></div>
            </div>
        </div>
    </div>
    <?php
        echo $this->Html->script('/js/jquery.fitvids.js');
        echo $this->Html->script('/js/jquery.easing.1.3.js');
        echo $this->Html->script('/js/jquery.bxslider.min.js');
        echo $this->Html->script('/js/FrontEnd.js');
    ?>

</body>
</html>
