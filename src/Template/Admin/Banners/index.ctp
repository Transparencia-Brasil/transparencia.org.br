<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Banner</h2>
      <div class="box-icon">
        <a href="javascript:void(0);" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
      </div>
    </div>

    <div class="box-content">
      <div class="messagesList">
        <span class='title'>
          <span class="label label-warning"><?= $this->Flash->render();?></span>
        </span>
        <br>
      </div>
      <div>
        <a href='<?=$this->Url->build(["controller" => "Banners", "action" => "edit"]);?>' class="btn btn-primary" type="submit">Novo banner</a>
      </div>
        <br>
        <div class="message-order"><b>Arraste os itens e clique no botão "Salvar ordem" para alterar a ordem de exibição dos Banners.</b></div>
        <ul class="sort" id="carousel-items" style="margin:0;">
          <?php $count=0;?>
          <?php foreach($banners as $banner): ?>
            <?php $count = $count + 1;
            $imagem = $this->Url->build('/') . 'uploads/banners/' . $banner['Imagem'];
            ?>
        <li class='' id='item_<?php echo $banner->Codigo; ?>' style='display:block; margin:20px 0; border:1px solid #ccc; padding:10px; background:#eee; position:relative;'>
          <span style="display: none;" id="id<?php echo $count; ?>">Nome:<?=$banner->Nome?></span>
          <div id="<?php echo $count; ?>"><b><?=$banner->Nome ?></b></div>
          <div>Tipo: <?=$banner->BannersTipo->Nome ?></div>
          <div class="center">Criação: <?=$banner->Criacao->i18nFormat('dd/MM/Y hh:mm:ss') ?></div>
          <div class="center"><img style="height:100px; position: absolute; top: 15px;right: 15px;" src="<?=$imagem?>"> </div>
          <div class="center"><img src="<?=$banner->Imagem?>"> </div>

          <div class="center">
            <a class="btn btn-info" href="<?=$this->Url->build(["controller" => "Banners", "action" => "edit", $banner->Codigo]); ?>" title="Editar">
              <i class="halflings-icon white edit"></i>
            </a>
            <a class="btn btn-danger btn-excluir" href="<?=$this->Url->build(["controller" => "Banners", "action" => "delete", $banner->Codigo]); ?>" title="Excluir">
              <i class="halflings-icon white trash"></i>
            </a>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <div>
        <div style="display: none;">
          <?= $this->Form->create('User', ['url' => ['prefix' => 'admin', 'controller'=>'Banners', 'action' =>'order']]) ?>
          <?=$this->Form->text('order', ['class' => 'span3', 'id' => 'order']);?>
        </div>
        <button class="btn" type="submit">Salvar ordem</button>
      </div>
      <?=$this->Form->end();?>
    </div>
  </div><!--/span-->

</div><!--/row-->
<script>

$(function() {
   $( "ul.sort" ).sortable({
		 	update: function(event, ui){
				var postData = $(this).sortable('serialize');
        var arrayItems = postData.split('&');
        var finalArray = arrayItems.map(function (item) {
          return parseInt(item.substr(7));
        });
        check(finalArray);
			}
	 });
});

function check (finalArray) {
  $('#order').val(finalArray);
}


</script>
