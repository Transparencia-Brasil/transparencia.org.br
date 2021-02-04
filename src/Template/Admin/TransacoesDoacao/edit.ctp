			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Visualizando transação</h2>
						<div class="box-icon"></div>
						
					</div>

					<div class="box-content">
						<p><strong>Atenção: Em caso de atualização de dados, somente o Valor Doado (real) e a data de pagamento poderão ser alteradas</strong></p>
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<?=$this->Form->create($transacao, ['class' => 'form-horizontal']) ?>
						  <fieldset>
						  	<div class="control-group">
							  <label class="control-label" for="CodigoStatusTransacao">Status</label>
							  <div class="controls">
								<?=$this->Form->select('TransacoesDoacao.CodigoStatusTransacao', $statusTransacao, ['class' => 'span3']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="ValorDoado">Valor doado (real)</label>
							  <div class="controls">
								<?=$this->Form->text('TransacoesDoacao.ValorDoado', ['class' => 'span3', 'id' => 'valorDoado']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoTargetTipo">Valor doado (escolhido no site)</label>
							  <div class="controls">
								<?=$this->Form->text('TransacoesDoacao.UsuarioDado.ValorDoacao', ['class' => 'span3']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Email">Email</label>
							  <div class="controls">
								<?=$this->Form->text('TransacoesDoacao.UsuarioDado.Email', ['class' => 'span6']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Email">CPF / CNPJ</label>
							  <div class="controls">
								<?=$this->Form->text('TransacoesDoacao.UsuarioDado.CPF', ['class' => 'span3']);?>
								<?=$this->Form->text('TransacoesDoacao.UsuarioDado.CNPJ', ['class' => 'span3']);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="CodigoStatusTransacaoSP">Status PagSeguro</label>
							  <div class="controls">
							  	<strong>
								<?php 
									if($transacao->CodigoStatusTransacaoSP != null)
									switch($transacao->CodigoStatusTransacaoSP) {
										case 1: // aguardando pagamento. 
											echo "1 - Aguardando pagamento.";
											break;
										case 2: // em análise. atualiza pra pendente (somente transações novas)
											echo "2 - Em análise.";
											break;
										case 3: // paga. atualiza transação para paga
											echo "3 - Pagamento efetuado.";
											break;
										case 4: // paga e disponível para consulta. atualiza transação para paga
											echo "5 - Pagamento efetuado.";
											break;
										case 5: // em disputa. transação pendente
											echo "5 - Em disputa. Transação pendente.";
											break;
										case 6: // devolvida. atualizar transação para cancelada
											echo "6 - Valor devolvido. Transação cancelada.";
											break;
										case 7: // devolvida. atualizar transação para cancelada
											echo "7 - Valor devolvido. Transação cancelada.";
											break;
										case 8: // chargeback (devolução do valor). atualizar transação para cancelada
											echo "8 - Em processo de devolução do valor pago. Transação cancelada.";
											break;
										case 9: // em contestação. atualiza transação para pendente
											echo "9 - Em contestação. Transação pendente.";
											break;
									}
									else
										echo "Status indisponível no momento.";
								?>
								</strong>
							  </div>
							</div>
							<?php if($transacao->UsuarioDado->CodigoAssociado != null){ ?>
							<div class="control-group">
							  <label class="control-label" for="Associado">Associado</label>
							  <div class="controls">
							  	 <p>
							  	 	<?php
							  	 	echo "<a href='" . $this->Url->build(['controller' => 'Associados', 'action' => 'edit', $transacao->UsuarioDado->CodigoAssociado]) . "' style='text-decoration:underline;' target='_blank'>Clique aqui para ver as informações do doador</a>";
							  	 	?>
							  	 </p>
							  </div>
							</div>
							<?php } ?>
							<div class="control-group">
							  <label class="control-label" for="DataPagamento">Data de pagamento</label>
							  <div class="controls">
								<?=$this->Form->text('TransacoesDoacao.DataPagamento', 
									['class' => 'input-xlarge datepicker']
									);?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Criacao">Criação</label>
							  <div class="controls">
								<?=$this->Form->text('TransacoesDoacao.Criacao', 
									['class' => 'input-xlarge datepicker', 'readonly' => 'readonly']
									);?>
							  </div>
							</div>
							<hr/>
							<?php 
							if($transacao->StatusHistorico != null){
								echo "<h3 style='text-align:center;'>Histórico de status</h3>";
							
								foreach($transacao->StatusHistorico as $historico):
							?>
								<div class="control-group">
									<label class="control-label" for="Termino">Data:</label>
									<div class="controls"><?=$historico->Criacao?></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Termino">Código Status interno: </label>	
									<div class="controls"><?=$historico->CodigoStatusTransacao?></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Termino">Código Status PagSeguro: </label>	
									<div class="controls"><?=$historico->CodigoStatusTransacaoSP?></div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="Termino">XML Retorno: </label>
								  <div class="controls">
									<?=$this->Form->textarea('XmlRetorno', ['value' => $historico->XMLRetorno, 'rows' => '15', 'cols' => '50']);?>
								  </div>
								</div>
								<hr/>
							<?php
								endforeach;
							}
							?>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Salvar</button>
							  	<button type="button" onclick='javascript:history.back(-1);' class="btn">Voltar</button>
							</div>
						  </fieldset>
						<?=$this->Form->end();?>
					</div>
				</div><!--/span-->

			</div><!--/row-->
			<script>
				$("#valorDoado").mask("#.##0,00", {reverse: true});
			</script>