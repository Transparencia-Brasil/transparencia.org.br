<?php
  $this->assign('description', 'Um dos principais objetivos da transparência Brasil é oferecer ferramentas de monitoramento de instituições públicas para a sociedade.');
?>

<!-- Título -->
<div class="container content-box">
  <div class="container">
      <div class="row">
          <div class="col-12 no_pd">
          <h2 class="title-pages">Projetos</h2>
          <hr/>
          <p class="">
          Um dos principais objetivos da Transparência Brasil é oferecer ferramentas de monitoramento de instituições públicas para a sociedade. Para tanto, a entidade criou ao longo dos anos uma série de projetos que disponibilizam informações na Internet.
          </p>
          <br>
          </div>
      </div>
  </div>
  <!-- Título -->

  <!-- Conteudo -->
  <div class="container project">
    <div class="row">

            <?php $count = false;
                  $lenght = 0;
                  foreach($projetosAtivos as $item) {
                    $lenght = $lenght + 1;
                  }
                  ?>
            <?php foreach($projetosAtivos as $key=>$projeto):
              $url = $projeto['Link'];
              $imagemLogo = $this->Url->build('/') . 'img/projetos/' . $projeto['Imagem_logo'];
              $imagemBg = $this->Url->build('/') . 'img/projetos/' . $projeto['Imagem'];
              ?>
              <?php if ($count == false) {
                echo '<div class="card-group">';
              } ?>
            <?php $bg_color = !empty($projeto["Mouseover_cor"]) ? $projeto["Mouseover_cor"] : '#ccc'?>
            <div class="card m-1 p-3" style="background-color:<?=$bg_color?>;background-size:cover;background-image:url(<?=$imagemBg?>)">
              <a href="<?=$url?>" class="card-link" <?= $projeto["LinkTarget"] ? "target='_blank'" : "target='_top'"?>>
                <img class="img-fluid" src="<?=$imagemLogo?>" alt="<?=$projeto['Nome'];?>">
                <div class="card-block pdl0">
                  <p class="card-text"><?=$projeto['Descricao'];?></p>
<?php
              if ($projeto['CaptacaoRecursos']) {
?>
                  <p class="text-footer">Em fase de captação de recursos.</p>
<?php
              }
?>
                </div>
              </a>
            </div>
            <?php if ($count == true) {
              echo '</div>';
              $count = false;
            } else {
              if ($lenght == $key + 1) {
                echo '</div>';
              }
              $count = true;
            } ?> 
            <?php
                endforeach;
            ?>
    </div>
  </div>

  <!-- Projetos Desativados -->
<?php
if (!empty($projetosDesativados)) {
?>
  <div class="container">
      <div class="row">
          <div class="col-12 pjd">
          <h5 class="title-pages mgt30">Projetos Desativados<h5>
          <hr/>
            <?php foreach($projetosDesativados as $key=>$projeto):            
            ?>
            <h6>- <?=$projeto["Nome"]?> <?= !empty($projeto["DesativadoPeriodoVigencia"]) ? "(".$projeto["DesativadoPeriodoVigencia"].")" : ""?></h6>
            <p><?=$projeto['Descricao']?></p>
            <?php
                endforeach;
            ?>
          </div>
      </div>
  </div>
<?php
}
?>
</div>
<!-- Projetos Desativados -->
