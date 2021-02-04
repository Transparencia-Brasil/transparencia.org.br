
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<p><h1>ATALHOS</h1></p>
			<div class="row-fluid">	

				<a class="quick-button metro yellow span2" href="<?=$this->Url->build(['controller' => 'Associados', 'action' =>'index'])?>">
					<i class="icon-group"></i>
					<p>Associados</p>
					<span class="badge"></span>
				</a>
				<a class="quick-button metro red span2" href="<?=$this->Url->build(['controller' => 'Contatos', 'action' =>'index'])?>">
					<i class="icon-comments-alt"></i>
					<p>Mensagens de contato</p>
					<span class="badge"></span>
				</a>
				<a class="quick-button metro blue span2" href="<?=$this->Url->build(['controller' => 'Publicacoes', 'action' =>'index'])?>">
					<i class="icon-barcode"></i>
					<p>Publicacoes</p>
					<span class="badge"></span>
				</a>
				<a class="quick-button metro black span2" href="<?=$this->Url->build(['controller' => 'Blogs', 'action' =>'index'])?>">
					<i class="icon-calendar"></i>
					<p>Blog</p>
				</a>
				
				<div class="clearfix"></div>
								
			</div><!--/row-->
			<p><h1>DADOS</h1></p>
			<div class="row-fluid" >
				
				<div class="box black span4" onTablet="span6" onDesktop="span4" >
					<div class="box-header">
						<h2><i class="halflings-icon white list"></i><span class="break"></span>Últimas mensagens de contato</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<?php foreach($ultimos_contatos as $contato): 
								$mensagem = strlen($contato->Mensagem) > 100 ? substr($contato->Mensagem, 0, 97) . "..." : $contato->Mensagem;
							?>
							<li style="padding:5px;">
								<a href="<?=$this->Url->build(['controller' => 'Contatos', 'action' => 'edit', $contato->Codigo])?>">
									<strong>Data: <?=$contato->Criacao?></strong><br/>
									<strong>Nome: <?=$contato->Nome?></strong><br/>
									<strong>Mensagem: <?=$mensagem?></strong>
								</a>
							</li>
						  	<?php endforeach; ?>
						</ul>
					</div>
				</div><!--/span-->
				
				<div class="box black span4" onTablet="span6" onDesktop="span4" >
					<div class="box-header">
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Últimos associados cadastrados</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<?php foreach($ultimos_usuarios as $usuario): ?>
							<li class="green" style="padding:5px;">
								<strong>Nome:</strong> <?=$usuario->Nome?> | 
								<strong>Data de cadastro:</strong> <?=$usuario->Criacao->nice()?>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div><!--/span-->
				
				<div class="box black span4 noMargin" onTablet="span12" onDesktop="span4" style="display:none;">
					<div class="box-header">
						<h2><i class="halflings-icon white check"></i><span class="break"></span>To Do List</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="todo metro">
							<ul class="todo-list">
								<li class="red">
									<a class="action icon-check-empty" href="#"></a>	
									Windows Phone 8 App 
									<strong>today</strong>
								</li>
								<li class="red">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>today</strong>
								</li>
								<li class="yellow">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>tommorow</strong>
								</li>
								<li class="yellow">
									<a class="action icon-check-empty" href="#"></a>
									Windows Phone 8 App
									<strong>tommorow</strong>
								</li>
								<li class="green">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>this week</strong>
								</li>
								<li class="green">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>this week</strong>
								</li>
								<li class="blue">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>this month</strong>
								</li>
								<li class="blue">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>this month</strong>
								</li>
							</ul>
						</div>	
					</div>
				</div>
			
			</div>
			
			
       

	</div><!--/.fluid-container-->