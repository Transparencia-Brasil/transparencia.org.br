			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Visualizando mensagem de contato</h2>
						<div class="box-icon"></div>
					</div>

					<div class="box-content">
						<div class="alert-error"><?= $this->Flash->render();?></div>
						<div>
							<p><strong>Nome</strong>: <?=$contato->Nome?></p>
							<p><strong>Email</strong>: <?=$contato->Email?></p>
							<p><strong>Assunto</strong>: <?=$contato->CodigoAssunto?></p>
							<p><strong>Mensagem</strong>: <?=$contato->Mensagem?></p>
						</div>
					</div>
				</div><!--/span-->

			</div><!--/row-->