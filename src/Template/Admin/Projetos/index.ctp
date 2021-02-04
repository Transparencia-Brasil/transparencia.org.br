<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Projetos</h2>
			<div class="box-icon">
				<a href="javascript:void(0);" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="messagesList">
				<span class='title'>
								<span class="label label-warning"><?= $this->Flash->render();?></span>
				</span>
			</div>
			<div>
				<a href='<?=$this->Url->build(["controller" => "Projetos", "action" => "edit"]);?>' class="btn btn-primary" type="submit">Novo projeto</a>
			</div>
			
			<!-- Accordion Projetos --> 
			<div class="accordion" id="accordion2" style="margin-top:10px;">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Projetos Ativos</a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
						<div class="accordion-inner">
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Criação</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($projetos as $projeto): ?>
									<tr id='item_<?php echo $projeto->Codigo; ?>'>
										<td>
											<?=$projeto->Nome ?>
										</td>
										<td class="center">
											<?=$projeto->Criacao->i18nFormat('dd/MM/Y hh:mm:ss') ?>
										</td>
										<td class="center">
											<a class="btn btn-info" href="/admin/Projetos/edit/<?=$projeto->Codigo?>" title="Editar">
												<i class="halflings-icon white edit"></i>
											</a>
											<!-- <a class="btn btn-success" href="/admin/ProjetosArquivos/<?=$this->Url->build(["controller" => "ProjetosArquivo ", "action " => "index
											 ", $projeto->Codigo]); ?>" title="Editar arquivos"> 
												<i class="halflings-icon white zoom-in"></i>
											</a>-->
											<a class="btn btn-danger btn-excluir" href="/admin/Projetos/delete/<?=$projeto->Codigo?>" title="Excluir">
												<i class="halflings-icon white trash"></i>
											</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
								<?= $this->Form->create('User', ['url' => ['prefix' => 'admin', 'controller'=>'Projetos', 'action' =>'order']]) ?>
								<div>
									<?=$this->Form->hidden('order', ['class' => 'span3', 'id' => 'order']);?>
									<button class="btn" type="submit">Salvar ordem</button>
								</div>
								<?=$this->Form->end();?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Projetos Desativados</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							<table class="sort table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Criação</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($projetosDesativados as $projeto): ?>
									<tr id='item_<?php echo $projeto->Codigo; ?>'>
										<td>
											<?=$projeto->Nome ?>
										</td>
										<td class="center">
											<?=$projeto->Criacao->i18nFormat('dd/MM/Y hh:mm:ss') ?>
										</td>
										<td class="center">
										<a class="btn btn-info" href="/admin/Projetos/edit/<?=$projeto->Codigo?>" title="Editar">
												<i class="halflings-icon white edit"></i>
											</a>
											<!-- <a class="btn btn-success" href="/admin/ProjetosArquivos/<?=$this->Url->build(["controller" => "ProjetosArquivo ", "action " => "index
											 ", $projeto->Codigo]); ?>" title="Editar arquivos"> 
												<i class="halflings-icon white zoom-in"></i>
											</a>-->
											<a class="btn btn-danger btn-excluir" href="/admin/Projetos/delete/<?=$projeto->Codigo?>" title="Excluir">
												<i class="halflings-icon white trash"></i>
											</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<?= $this->Form->create('User', ['url' => ['prefix' => 'admin', 'controller'=>'Projetos', 'action' =>'order']]) ?>
								<div>
									<?=$this->Form->hidden('order', ['class' => 'span3', 'id' => 'order2']);?>
									<button class="btn" type="submit">Salvar ordem</button>
								</div>
							<?=$this->Form->end();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->
<script>
$(function() {
   $( "tbody" ).sortable({
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
  $('#order2').val(finalArray);
}
</script>