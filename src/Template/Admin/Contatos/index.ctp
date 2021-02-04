			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Contatos</h2>
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Nome</th>
								  <th>Respondido</th>
								  <th>Criação</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php foreach($contatos as $contato): ?>
							<tr>
								<td><?=$contato->Nome ?></td>
								<td class="center">
									<span class="label label-success">
										<?=$contato->Respondido == 1 ? 'Já respondido' : 'Pendente de resposta' ?>
									</span>
								</td>
								<td class="center"><?=$contato->Criacao->i18nFormat('dd/MM/Y hh:mm:ss') ?></td>
								<td class="center">
									<a class="btn btn-success" href="<?=$this->Url->build(["controller" => "Contatos", "action" => "answered", $contato->Codigo]); ?>" title="Marcar como respondido.">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="<?=$this->Url->build(["controller" => "Contatos", "action" => "edit", $contato->Codigo]); ?>" title="Visualizar.">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger btn-excluir" href="<?=$this->Url->build(["controller" => "Contatos", "action" => "delete", $contato->Codigo]); ?>" title="Excluir">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->