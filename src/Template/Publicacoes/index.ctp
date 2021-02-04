<?php
  $this->assign('description', 'Há cinco tipos de publicações (artigos, acadêmicos, manuais, cartilhas e relatórios), sobre diversos temas.');
?>
<!-- Título -->
<div class="container content-box">
  <div class="container">
      <div class="row">
          <div class="col-12 no_pd">
          <h2 class="title-pages">Publicações</h2>
          <hr/>
          <p>
          Há cinco tipos de publicações (artigos, acadêmicos, manuais, cartilhas e relatórios), sobre diversos temas.
          </p>
      </div>
  </div>
  <!-- Título -->

  <!-- Conteudo -->
  <div class="form">
      <div class="row">
      <!-- Form -->
      <div class="col-md-12 no_pd">
        <form class="form-inline">
          <div class="col-md-3 ">
            <?=$this->Form->select('ano', $anos, ['id' => 'Ano','class' => 'custom-select full-w', 'empty' => 'Selecione um ano']) ?>
          </div>
          <div class="col-md-3 mobile-fix">
            <?=$this->Form->select('categoria', $categorias, ['id' => 'Categoria','class' => 'custom-select full-w', 'empty' => 'Selecione uma categoria']) ?>
          </div>
          <div class="col-md-12 mgtb20">
              <div class="col-md-3 inline-b pd0 ">
                <label class="" for="inlineFormInput">Ou se preferir, faça uma busca:</label>
              </div>
              <div class="col-md-3 inline-b pd0 ">
                <?=$this->Form->text('busca', ['id' => 'Busca','class'=>'form-control inline-b '])?>
              </div>
              <button type="button" class="btn btn-warning mobile-fix" id="btnPesquisar">Pesquisar</button>
          </div>
        </form>
      </div>
      <!-- Form -->
      </div>
      <div class="row itensPublicacoes"></div>
    </div>
  </div>
</div>
<!-- Conteudo -->
<script src="/scripts/publicacoes.js"></script>
