<?php
  $this->assign('description', 'Principais artigos escritos por representantes da Transparência Brasil e reportagens que mencionam a entidade ou se baseiam no seu trabalho.');
?>
<!-- Título -->
<div class="container content-box">
  <div class="container">
      <div class="row">
          <div class="col-12 no_pd">
          <h2 class="title-pages">Notícias</h2>
          <hr/>
          <p>
          Principais artigos escritos por representantes da Transparência Brasil e reportagens que mencionam a entidade ou se baseiam no seu trabalho.
          </p>
          </div>
      </div>
  </div>
  <!-- Título -->
  <!-- Conteudo -->
  <div class="container">
      <div class="row">
        <?php
            $count = 0;
            foreach($itens as $item):
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
              <div class="card bx-<?=$count?> notice">
                <div class='head'>
                  <span>
                  <?=$item->ImprensasCategoria->Nome?></span>
                  <?php
                      if(isset($item->DataPublicacao))
                          echo "<span class='data'>" . $item->DataPublicacao->i18nFormat('MM/Y') . "</span>";
                  ?>
                  </div>
                <?php
                if(strlen($item->Imagem) > 0):?><div class='crop-height'>
                  <a href="<?=$item->Link?>" target="_blank" onclick="registrarEvento('veja_mais', 'clique', '<?=$item->Titulo?>')"><img class='card-img-top img-fluid scale' src="<?=BASE_URL?>uploads/imprensa/<?=$item->Imagem?>" /></a></div>
                <?php endif; ?>
                <div class="card-block">
                  <h6 class="card-title">
                  <?php if(strlen($item->Veiculo) > 0)
                      echo strtoupper($item->Veiculo) . ': ';
                  ?>
                  <?=$item->Titulo?></h6>
                  <p class="card-text char-limit-2"><?=$item->Resumo?></p>
                  <div class="btn-primary text-center mgt20">
                    <a href="<?=$item->Link?>" class="btn" target="_blank" onclick="registrarEvento('veja_mais', 'clique', '<?=$item->Titulo?>')">Veja Mais</a>
                  </div>
                </div>
              </div>
            </div>
        <?php
        $count++;
        endforeach; ?>
      </div>
  </div>
</div>
