			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Transações de doações</h2>
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
							  	  <th>Código</th>	
								  <th>Status</th>
								  <th>E-mail doador</th>
								  <th>Valor doado</th>
								  <th>Valor escolhido no site</th>
								  <th>Criação</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php foreach($transacoes as $transacao): 

						  	$email = "";
						  	$valorDoado = 0;
						  	if($transacao->UsuarioDado != null){
						  		if($transacao->UsuarioDado->CodigoAssociado != null){
						  			$email = $transacao->UsuarioDado->Associado->Email;
						  			$valorDoado = $transacao->UsuarioDado->Associado->ValorDoacao;
						  		}else{
						  			$email = $transacao->UsuarioDado->Email;
						  			$valorDoado = $transacao->UsuarioDado->ValorDoacao;
						  		}
						  	}
						  	?>
							<tr>
								<td><?=$transacao->Codigo ?></td>
								<td><?=$transacao->Status->Nome ?></td>
								<td><?=$email ?></td>
								<td><?=$transacao->ValorDoado ?></td>
								<td><?=$transacao->UsuarioDado != null ? $transacao->UsuarioDado->ValorDoacao : $valorDoado ?></td>
								<td class="center"><?=$transacao->Criacao->i18nFormat('dd/MM/Y hh:mm:ss') ?></td>
								<td class="center">
									<a class="btn btn-info" href="<?=$this->Url->build(["controller" => "TransacoesDoacao", "action" => "edit", $transacao->Codigo]); ?>" title="Visualizar.">
										<i class="halflings-icon white edit"></i>  
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->