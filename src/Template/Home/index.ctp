<?php
  $this->assign('description', 'A Transparência Brasil é uma organização da sociedade civil que há mais de 20 anos luta por transparência, controle social e integridade do poder público.');
?>
<!-- Carrossel -->
<div class="container content-box">
  <div class="container">
      <div class="row justify-content-end">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <?php if($banners): ?>
              <ol class="carousel-indicators">
              <?php
                for($i=0;$i<count($banners);$i++) {
                    $active = '';
                    if ($i==0)
                        $active = 'active';
              ?>
                  <li data-target="#carouselExampleControls" data-slide-to="<?=$i?>" class="<?=$active?>"></li>
             <?php
                }
              ?>
              </ol>
              <div class="carousel-inner" role="listbox">
                <?php
                    $count = 0;
                ?>
                <?php foreach($banners as $banner):
                    $active = "";

                    if ($count == 0)
                        $active = "active";

                    if($banner['CodigoBannerTipo'] == 1 && strlen($banner['Imagem']) > 0){ // tipo imagem com link
                        $imagem = $this->Url->build('/') . 'uploads/banners/' . $banner['Imagem'];
                        $target = $banner['CodigoTargetTipo'] == 1 ? "" : "target='_blank'";
                        echo '<div class="carousel-item crop-height-carousel ' . $active . '"><a href="' . $banner['Link'] . '" ' . $target . ' onclick="registrarEvento(\'destaque_intermediario_home\', \'clique\', \'' . $banner['Nome'] . '\')"><img src="' . $imagem . '" title="' . $banner['Nome'] . '" class="d-block img-fluid" /></a></div>';
                    }else{ // tipo video
                        $url = $banner['Link'];
                    ?>
                        <li>
                            <div class="carousel-item crop-height-carousel <?=$active?>">
                                <iframe src="<?=$url?>" width="560" height="315" frameborder="0"></iframe>
                            </div>
                        </li>
                <?php } ?>
                <?php
                    $count++;
                    endforeach;
                ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
            <?php endif; ?>
          </div>
      </div>
  </div>
  <!-- Carrossel -->

  <!-- Cards -->
  <div class="container">
      <div class="row">
          <div class="card-group">
              <div class="card">
                <div class="content-card">
                  <img class="card-img-top" src="images/home/blog.png" alt="Blog">
                  <div class="card-block text-center">
                      <h4 class="card-title">blog</h4>
                      <p class="card-text fix-h">Confira nossas atividades e informe-se sobre combate à corrupção, controle social e integridade.</p>
                      <div class="btn-primary"><a href="https://www.transparencia.org.br/blog" class="btn" onclick="registrarEvento(\'destaque_principal_bolinhas\', \'clique\', \'reportagens\')">Veja Mais</a></div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="content-card">
                  <img class="card-img-top" src="images/home/relatorios.png" alt="Relatórios">
                  <div class="card-block text-center">
                      <h4 class="card-title">relatórios</h4>
                      <p class="card-text fix-h">Leia nossos relatórios de análise e monitoramento do poder público.</p>
                      <div class="btn-primary"><a href="<?=$this->Url->build(["controller"=> "Publicacoes", 'action' => 'index'])?>" class="btn" onclick="registrarEvento(\'destaque_principal_bolinhas\', \'clique\', \'publicacoes\')">Veja Mais</a></div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="content-card">
                  <img class="card-img-top" src="images/home/associe-se.png" alt="Associe-se">
                  <div class="card-block text-center">
                      <h4 class="card-title">associe-se</h4>
                      <p class="card-text fix-h">Ao se associar, você fortalece uma das mais respeitadas organizações de combate à corrupção.</p>
                      <div class="btn-primary"><a href="<?=$this->Url->build('apoie'.$midia->Arquivo, true)?>" class="btn" onclick="registrarEvento(\'destaque_principal_bolinhas\', \'clique\', \'reportagem\')">Veja Mais</a></div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Cards -->