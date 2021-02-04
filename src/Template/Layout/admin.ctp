<!DOCTYPE html>
<html lang="pt">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Transparência Brasil - Administração</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<?php
		echo $this->Html->css('/assets_admin/css/bootstrap.min.css', ['id' => 'bootstrap-style', 'rel' => 'stylesheet']);
		echo $this->Html->css('/assets_admin/css/bootstrap-responsive.min.css', ['rel' => 'stylesheet']);
		echo $this->Html->css('/assets_admin/css/style.css', ['id' => 'base-style', 'rel' => 'stylesheet']);
		echo $this->Html->css('/assets_admin/css/style-responsive.css', ['id' => 'base-style-responsive', 'rel' => 'stylesheet']);
		echo $this->Html->css('/assets_admin/js/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css');
	?>
	<?= $this->fetch('css') ?>
	<?php
		echo $this->Html->meta('/assets_admin/img/favicon.ico','/favicon.ico', ['type' => 'icon']);
		echo $this->Html->script('/assets_admin/js/jquery-1.9.1.min.js');
	?>
	<!--<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link id="base-style" href="css/style.css" rel="stylesheet" />
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet" />-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/assets_admin/css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="/assets_admin/css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	<!-- start: JavaScript-->
	<?php
		echo $this->Html->script('/assets_admin/js/jquery.mask.min.js');
		echo $this->Html->script('/assets_admin/js/jquery-migrate-1.0.0.min.js');
		echo $this->Html->script('/assets_admin/js/jquery-ui-1.10.0.custom.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.ui.touch-punch.js');
		echo $this->Html->script('/assets_admin/js/modernizr.js');
		echo $this->Html->script('/assets_admin/js/bootstrap.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.cookie.js');
		echo $this->Html->script('/assets_admin/js/fullcalendar.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.dataTables.min.js');
		echo $this->Html->script('/assets_admin/js/excanvas.js');
		echo $this->Html->script('/assets_admin/js/jquery.flot.js');
		echo $this->Html->script('/assets_admin/js/jquery.flot.pie.js');
		echo $this->Html->script('/assets_admin/js/jquery.flot.stack.js');
		echo $this->Html->script('/assets_admin/js/jquery.flot.resize.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.chosen.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.uniform.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.cleditor.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.noty.js');
		echo $this->Html->script('/assets_admin/js/jquery.elfinder.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.raty.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.iphone.toggle.js');
		echo $this->Html->script('/assets_admin/js/jquery.uploadify-3.1.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.gritter.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.imagesloaded.js');
		echo $this->Html->script('/assets_admin/js/jquery.masonry.min.js');
		echo $this->Html->script('/assets_admin/js/jquery.knob.modified.js');
		echo $this->Html->script('/assets_admin/js/jquery.sparkline.min.js');
		echo $this->Html->script('/assets_admin/js/counter.js');
		echo $this->Html->script('/assets_admin/js/retina.js');
		echo $this->Html->script('/assets_admin/js/custom.js');
		echo $this->Html->script('/assets_admin/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js');
		//echo $this->Html->script('/assets_admin/js/jquery.sortable.js');

	?>
	<?= $this->fetch('scripts') ?>
	<!-- end: JavaScript-->
</head>
<body>
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?=BASE_URL?>" target="_blank"><span>Transparência Brasil</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav" >
					<ul class="nav pull-right" >
						<li>
							<a class="btn" href="<?=$this->Url->build(['controller' => 'UsuariosAdmin', 'action' => 'edit', $this->Session->read('Auth.User.id')])?>" >
								<i class="halflings-icon white wrench" title="Ver meus dados"></i>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="Sistema/Configuracao">
								<i class="halflings-icon white user"></i> <?php echo $this->Session->read('Auth.User.username') ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Configurações</span>
								</li>
								<li><a href="<?=$this->Url->build(["controller" => "UsuariosAdmin", "action" => "senha"]); ?>"><i class="halflings-icon user"></i> Mudar senha</a></li>
								<li><a href="<?=$this->Url->build(["controller" => "Login", "action" => "logout"]); ?>"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

		<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "index"]); ?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "QuemSomos", "action" => "index"]); ?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Quem Somos</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Financiamentos</span></a>
							<ul>
								<li><a class="submenu" href="<?php echo $this->Url->build(["controller" => "Financiamentos", "action" => "index"]); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Financiamentos</span></a></li>
								<li><a class="submenu" href="<?php echo $this->Url->build(["controller" => "AuditoriasContabilidade", "action" => "index"]); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Auditorias e contabilidade</span></a></li>
								<li><a class="submenu" href="<?php echo $this->Url->build(["controller" => "RelatoriosAtividades", "action" => "index"]); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Relatórios de atividades</span></a></li>
							</ul>
						</li>
						<li><a href="<?php echo $this->Url->build(["controller" => "Banners", "action" => "index"]); ?>"><i class="icon-picture"></i><span class="hidden-tablet"> Banners</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "Projetos", "action" => "index"]); ?>"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Projetos</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "PublicacoesCategoria", "action" => "index"]); ?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Publicações (categorias e itens)</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Associados</span></a>
							<ul>
								<li><a class="submenu" href="<?php echo $this->Url->build(["controller" => "AssociadosDoacaoTipo", "action" => "index"]); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Tipos de doação</span></a></li>
								<li><a class="submenu" href="<?php echo $this->Url->build(["controller" => "Associados", "action" => "index"]); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Usuários cadastrados</span></a></li>
								<li><a class="submenu" href="<?php echo $this->Url->build(["controller" => "TransacoesDoacao", "action" => "index"]); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Transações de doação</span></a></li>
							</ul>
						</li>
						<li><a href="<?php echo $this->Url->build(["controller" => "Newsletters", "action" => "index"]); ?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Newsletter</span></a></li>
						<li><a href="https://www.transparencia.org.br/blog/wp-admin" target="_blank"><i class="icon-list-alt"></i><span class="hidden-tablet"> Blog</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "Midias", "action" => "index"]); ?>"><i class="icon-picture"></i><span class="hidden-tablet"> Mídia</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "Imprensas", "action" => "index"]); ?>"><i class="icon-picture"></i><span class="hidden-tablet"> Notícias</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "Contatos", "action" => "index"]); ?>"><i class="icon-font"></i><span class="hidden-tablet"> Mensagens de contato</span></a></li>
						<li><a href="<?php echo $this->Url->build(["controller" => "UsuariosAdmin", "action" => "index"]); ?>"><i class="icon-lock"></i><span class="hidden-tablet"> Usuários do Sistema</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">
				<?= $this->fetch('content') ?>
			<!-- end: Content -->
			</div>
			<!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>
		<p><span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
		</p>

	</footer>
	</body>
</html>
