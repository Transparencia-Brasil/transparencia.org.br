<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Quem Somos</h2>
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
        <a href='<?=$this->Url->build(["controller" => "QuemSomos", "action" => "edit"]);?>' class="btn btn-primary" type="submit">Novo Registro</a>
      </div>
      <br>
      <div class="message-order"><b>Arraste os itens e clique no botão "Salvar ordem" para alterar a ordem de exibição de Quem somos.</b></div>
      <br>
      <ul class="sort-qs" id="quem-somos" style="margin:0;">
        <?php $count=0;
        $areaName = "";?>
        <?php foreach($quemsomos as $quemsomositem):
          if ($areaName != $quemsomositem->QuemSomosArea->Nome) {
        ?>
        <h1 class="pdt20 uppercase">
            <?=$quemsomositem->QuemSomosArea->Nome?>
        </h1>
          <?php
          }
          $areaName = $quemsomositem->QuemSomosArea->Nome;

          ?>
          <?php $count = $count + 1;
          $imagem = $this->Url->build('/') . 'img/quemsomos/' . $quemsomositem['Imagem'];
          ?>

        <li class='' id='item_<?php echo $quemsomositem->Codigo; ?>' style='display:block; margin:20px 0; border:1px solid #ccc; padding:10px; background:#eee; position:relative;'>
          <span style="display: none;" id="id<?php echo $count; ?>">Nome:<?=$quemsomositem->Nome?></span>

          <div id="<?php echo $count; ?>"><b><?=$quemsomositem->Nome ?></b></div>
          <div>Categoria: <?=$quemsomositem->QuemSomosArea->Nome ?></div>


          <div><?=(!empty($quemsomositem['Cargo'])) ? 'Cargo: '.($quemsomositem['Cargo']) : "";?></div>
          <div style="width:70%;">Descrição: <?=$quemsomositem->Descricao ?></div>
          <div class="center"><img style="height:100px; position: absolute; top: 15px;right: 15px;" src="<?=$imagem?>"> </div>
          <div class="center"><img src="<?=$quemsomositem->Imagem?>"> </div>


          <div class="center">
            <a class="btn btn-info" href="<?=$this->Url->build(["controller" => "QuemSomos", "action" => "edit", $quemsomositem->Codigo]); ?>" title="Editar">
              <i class="halflings-icon white edit"></i>
            </a>
            <a class="btn btn-danger btn-excluir" href="<?=$this->Url->build(["controller" => "QuemSomos", "action" => "delete", $quemsomositem->Codigo]); ?>" title="Excluir">
              <i class="halflings-icon white trash"></i>
            </a>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <div>
        <div style="display: none;">
          <?= $this->Form->create('User', ['url' => ['prefix' => 'admin', 'controller'=>'QuemSomos', 'action' =>'order']]) ?>
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
   $( "ul.sort-qs" ).sortable({
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
