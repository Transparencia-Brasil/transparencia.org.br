<!-- Título -->
<div class="container content-box">
	<div class="container">
		<div class="row">
			<div class="col-12 px-0 pb-3">
				<img src="/images/topos/header-associacao.png" width="100%" class="img-fluid" alt="Apoie a Transparência Brasil">
			</div>
			<div class="col-12 no_pd">
				<h2 class="title-pages">Associe-se</h2>
				<hr/>
				<p>O Artigo 3º do estatuto da Transparência Brasil prevê três tipos de associados:<br /> 
				&nbsp;&nbsp;• Sócios-participantes (pessoas físicas, votantes);<br /> 
				&nbsp;&nbsp;• Institucionais (organizações da sociedade civil, cujos representantes têm os mesmos direitos dos sócios-participantes);<br /> 
				&nbsp;&nbsp;• Apoiadores (empresas, não-votantes).<br />
				</p>
				<p>A inclusão de novos sócio-participantes é dada por meio da aprovação no Conselho Deliberativo da entidade. Para tanto, é necessário estar ciente das normas para associação, preencher a ficha abaixo e comprometer-se a uma contribuição financeira mínima de R$ <?= env('MONTHLY_PRICE')?> mensais ou de R$ <?= env('YEARLY_PRICE')?> anuais (10% de desconto sobre o valor anualizado). A contribuição pode ser maior, a critério do associado.
				</p>
				<p>Para sócios-institucionais ou apoiadores, a contribuição mínima é de R$ 1.000 mensais. Os interessados deverão enviar e-mail para <a class="#" href="mailto:doacoes@transparencia.org.br"
					 class="linkExterno">doacoes@transparencia.org.br</a> para mais instruções.
				</p>
				<p>
					<strong>Saiba mais:<br /></strong>
					<a href="#" data-toggle="modal" data-target=".normas">Normas para associação à Transparência Brasil</a><br />
					<a href="#" data-toggle="modal" data-target=".etica">Código da Ética da Transparência Brasil</a>
				</p>
			</div>
		</div>
		<!-- Título -->

		<!-- Conteudo -->
		<div class="container no_pd">
			<div class="row">
				<!-- Form -->
						<script type="text/javascript">
								$(document).ready(function(){
										<?php 
												if(strlen($mensagemErro) > 0){
														$textoJaExiste = '';
														$linkJaExiste = '';
														if(isset($jaExiste) && $jaExiste === true){
																$textoJaExiste = 'Clique aqui para renovar sua contribuição de associado.';
																$linkJaExiste = $this->Url->build(['controller' => 'Associados', 'action' => 'pagamento']);
														}
														echo "abrirModal('','". $mensagemErro . "', '" . $textoJaExiste . "', '" .  $linkJaExiste . "');";
												}
										?>
								});
						</script>
				<?=$this->Form->create($associado, ["id" => "frmAssociado", "class" => "form-inline donation mgt30"]) ?>
					<?=$this->Form->hidden('Associados.Codigo');?>
					<div class="col-12 pd10">
						<div class="col-md-3 pd10">
							<label class="label-input">Como conheceu a Transparência Brasil?</label><br>
							<?=$this->Form->select('Associados.CodigoComoConheceuTB', $comoConheceu, ['id' => 'CodigoComoConheceuTB', 'class' => 'custom-select col-md-6 no_pd']) ?>
						</div>
						<div class="col-md-3 pd10">
							<label class="label-input">Selecione o tipo de contribuição:</label><br>
							<?= $this->Form->radio('Associados.TipoAssinatura', ['anual' => 'Anual R$ '. env('YEARLY_PRICE').',00','mensal' => 'Mensal R$ '. env('MONTHLY_PRICE').',00'])?>
						</div>
					</div>
					<div class="col-md-4 pdl0">
						<div class="col-12 pd10">
							<?=$this->Form->input('Associados.Nome', ['id' => 'Nome', 'class' => 'form-control col-12', 'tabindex' => '1']) ?>
						</div>

						<div class="col-12 pd10" id="cpf-box">
							<?=$this->Form->input('Associados.CPF', ['id' => 'Cpf', 'label'=>'CPF', 'class' => 'form-control col-12', 'tabindex' => '2']) ?>
						</div>

						<div class="col-12 pd10">
							<?=$this->Form->input('Associados.Email', ['id' => 'Email', 'class' => 'form-control col-12', 'tabindex' => '4']) ?>
						</div>
						<div class="col-12 pd10">
							<label for="DDDTel">(DDD)  Telefone</label>
							<?=$this->Form->input('Associados.TelefoneDDD', ['id' => 'TelefoneDDD', 'label'=>false, 'class'=>'form-control col-12 ddd', 'tabindex' => '6', 'maxlength'=>'2']) ?>
						</div>
						<div class="col-12 pd10">
							<label for="CelularDDD">(DDD) Celular</label>
							<?=$this->Form->input('Associados.CelularDDD', ['id' => 'CelularDDD', 'label'=>false,'class'=>'form-control col-12 ddd', 'tabindex' => '8', 'maxlength'=>'2']) ?>
						</div>
						<div class="col-12 pd10">
							<?=$this->Form->input('Associados.Profissao', ['id' => 'Profissao', 'label' => 'Profissão', 'class' => 'form-control col-12', 'tabindex' => '10']) ?>
						</div>
						<div class="col-12 pd10">
							<?=$this->Form->input('Associados.EntidadeEmpregadora', ['id' => 'EntidadeEmpregadora', 'label' => "Instituição / Empresa Empregadora", 'class' => 'form-control col-12', 'tabindex' => '12']) ?>
						</div>
					</div>
					<div class="col-md-4 pl-0 mt-auto">
						<div class="col-12 	pd10">
							<label class="label-input" for="inlineFormCustomSelect">Estado</label>
							<?=$this->Form->select('Associados.UF', $estados, ['id' => 'UF','empty' => "Selecione",'class' => 'custom-select full-w', 'tabindex' => '3']) ?>
						</div>
						<div class="col-12 pd10">
							<?=$this->Form->input('Associados.Cidade', ['id' => 'Cidade', 'class' => 'custom-select full-w', 'tabindex' => '5']) ?>
						</div>
						<div class="col-12 pd10">
							<label for="Telelefone">Telefone</label>
							<?=$this->Form->input('Associados.Telefone', ['id' => 'Telefone', 'label'=>false, 'class'=>'form-control col-12 tel', 'tabindex' => '7']) ?>
						</div>
						<div class="col-12 pd10">
							<label for="`ular">Celular</label>
							<?=$this->Form->input('Associados.Celular', ['id' => 'Celular', 'label'=>false, 'class'=>'form-control col-12 tel', 'tabindex' => '9']) ?>
						</div>
						<div class="col-12 pd10">
							<?=$this->Form->input('Associados.Endereco', ['id' => 'Endereco', 'label' => 'Endereço', 'class' => 'form-control col-12', 'tabindex' => '11']) ?>
						</div>
						<div class="col-12 pd10">
							<label class="col6" for="inlineFormCustomSelect">Escolaridade</label>
							<?=$this->Form->select('Associados.CodigoEscolaridadeTipo', $escolaridade, ['id' => 'CodigoEscolaridadeTipo', 'empty' => "Selecione", 'class' => 'custom-select full-w', 'tabindex' => '13']) ?>
						</div>
					</div>
					<div class="col-md-8 pd-11 pl-0">
							<label  for="Motivo" class="label-input">Por que decidiu se associar à Transparência Brasil?</label><br>
							<?=$this->Form->textarea('Associados.Motivo', ['id' => 'Motivo', 'class' => 'form-control col-12']) ?>
					</div>
					<div class="col-12 pd10">
						<div class="form-check">
							<label for="AceiteObjetivos" class="form-check-label">
							<?=$this->Form->checkbox('Associados.AceiteObjetivos', ['id' => 'AceiteObjetivos', 'class' => 'form-check-input', 'tabindex' => '14']) ?>
							Declaro estar ciente dos objetivos da Transparência Brasil e me comprometo a cooperar para a consecução de seus fins sociais.
							</label>
						</div>
						<div class="form-check">
							<label for="AceiteNormas" class="form-check-label">
							<?=$this->Form->checkbox('Associados.AceiteNormas', ['id' => 'AceiteNormas', 'class' => 'form-check-input', 'tabindex' => '15']) ?>
							Declaro estar ciente da normas para associação à Transparência Brasil e de seu código de ética.
							</label>
						</div>
						<div class="form-check">
							<label for="AceiteDeclaracaoNaoCondenado" class="form-check-label">
							<?=$this->Form->checkbox('Associados.AceiteDeclaracaoNaoCondenado', ['id' => 'AceiteDeclaracaoNaoCondenado', 'class' => 'form-check-input', 'tabindex' => '16']) ?>
							Declaro que nunca fui condenado na Justiça por razões relacionadas a corrupção.
							</label>
						</div>
						<div class="form-check">
							<label for="AceiteRadarTb" class="form-check-label">
							<?=$this->Form->checkbox('AceiteRadarTb', ['id' => 'AceiteRadarTb', 'class' => 'form-check-input', 'tabindex' => '17']) ?>
							Autorizo receber a comunicação da Transparência Brasil relativa à curadoria de conteúdo e eventos.
							</label>
						</div>
						<div class="form-check">
							<label for="AceiteNovidades" class="form-check-label">
							<?=$this->Form->checkbox('Associados.AceiteNovidades', ['id' => 'AceiteNovidades', 'class' => 'form-check-input', 'tabindex' => '17']) ?>
							Quero receber comunicações da Transparência Brasil
							</label>
						</div>
					</div>
					<div class="col-4 px-0">
					  <input type="hidden" name="r" value="">
						<button type="submit" class="btn btn-warning mobile-fix" value="Associar-se" id="Associar-se" />Associar-se</button>
					</div>
			</div>
		</div>
		<?=$this->Form->end();?>
			<!-- Form -->
	</div>
</div>
</div>
</div>
<!-- Conteudo -->

<!-- Modal -->

<div class="modal fade normas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="title-pages" id="Normas">Normas para associação à Transparência Brasil</h4>
			</div>
			<div class="content">
				<ul>
					<li>
						<p>Artigo 1º – Constitui condição prévia para associação à Transparência Brasil manifestação expressa de tal intenção,
							em que também se declarem:<br /> a) compromisso de cooperar para a consecução das finalidades sociais da entidade;<br
							/> b) ciência quanto ao Código da Ética da entidade e manifestação de que obedecerá a ele;<br /> c) conhecimento a
							respeito das estipulações da presente norma.</p>
					</li>

					<li>
						<p>Artigo 2º – Em conformidade com o Artigo 3° do estatuto da entidade, a admissão de novos sócios é condicionada à aprovação
							do Conselho Deliberativo.</p>
					</li>

					<li>
						<p>Artigo 3° – Os associados participarão, na forma prevista pelos órgãos competentes, das atividades da entidade. § Único
							– Os associados contarão com uma conta de correio eletrônico no domínio da entidade. O uso dessa conta será regulado
							por Norma dada a conhecimento dos associados quando de sua admissão.</p>
					</li>

					<li>
						<p>Artigo 4° – Os associados participantes e institucionais pagarão contribuições estipuladas conforme o procedimento
							estatutário correspondente.</p>
					</li>

					<li>
						<p>Artigo 5° – Os associados participantes e os representantes autorizados de associados institucionais terão direito
							de voto e de ser votados na Convenção da Transparência Brasil.</p>
						<ul>
							<li>
								<p>§ 1º – O direito de voto vigorará a partir do 6º (sexto) mês de associação do sócio, desde que satisfeita a condição
									expressa no § 3º do presente artigo.</p>
							</li>
							<li>
								<p>§ 2º – Os associados enquadrados nas condições expressas no Art. 35 do Estatuto da entidade são isentos da condição
									expressa no parágrafo anterior.</p>
							</li>
							<li>
								<p>§ 3º – O direito de voto é condicionado ao pagamento de todas as mensalidades porventura devidas.</p>
							</li>
							<li>
								<p>§ 4º – O presidente do Conselho Deliberativo poderá, após consulta aos demais membros do órgão, estipular anistias
									de forma a adequar o estipulado no parágrafo anterior às circunstâncias do momento econômico da entidade e do país.</p>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="modal fade etica container" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg container">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="title-pages" id="Etica">Código de ética</h4>
			</div>
			<div class="container content">
				<p>
					Considerando que a Transparência Brasil é uma entidade apartidária e não sectária, que deve trabalhar na educação e no esclarecimento
					da sociedade, e que no exercício de sua missão deve estabelecer padrões de excelência, seus integrantes adotam o seguinte
				</p>
			</div>
			<div class="container content">
					<p>
					<strong>Declaração de visão</strong><br />	
					Por uma sociedade democrática e justa, construída com transparência, e na qual o combate à corrupção se faça de forma
					efetiva.
					</p>
				
					<p>
					<strong>Declaração da missão</strong><br />
					Combater a corrupção no país por meio do enfrentamento de suas causas e do aperfeiçoamento das instituições e dos mecanismos
					sociais de controle.</p>

					<p>
					<strong>Valores básicos</strong><br />
						• Apartidarismo<br />
						• Coragem<br />
						• Ética<br />
						• Imparcialidade<br />
						• Independência<br />
						• Justiça<br />
						• Responsabilidade social<br />
						• Transparência
					</p>

					<p>
					<strong>Princípios</strong><br />
						• Como formadores de coalizões, trabalharemos em cooperação com todas as pessoas e grupos, organizações sem fins lucrativos, empresas, governos e órgãos internacionais engajados na luta contra a corrupção, sujeitos apenas às políticas e prioridades estabelecidas pelos órgãos diretivos da Transparência Brasil.<br />
						• Comprometemo-nos a ser abertos, honestos e responsáveis em nosso relacionamento com nossos colegas e com todas as pessoas com quem trabalharmos.<br />
						• Seremos democráticos e não sectários em nosso trabalho.<br />
						• Condenaremos vigorosa e corajosamente a corrupção e o pagamento de subornos onde forem claramente identificados.<br />
						• As posições que tomarmos serão baseadas em análises profundas, objetivas e profissionais, derivadas de pesquisas com metodologia cientificamente reconhecida.<br />
						• Os posicionamentos de representantes da entidade e seus processos deliberativos e administrativos serão conduzidos de forma a propiciar ampla oportunidade de debate e crítica.<br />
						• Somente aceitaremos ajuda financeira que não comprometa nossa capacidade de lidar com todos os assuntos de forma livre, completa e objetiva.<br />
						• Divulgaremos regularmente relatórios precisos de nossas atividades.<br />
						• Encorajaremos o respeito à liberdade, aos direitos fundamentais e às atitudes de inconformismo com relação à corrupção.<br />
						• Estimularemos o equilíbrio e a diversidade, em especial de raça e gênero, na composição de nossos órgãos diretivos.
					</p>

					<p>
					<strong>Regras de conduta</strong><br />
						• Somente serão admitidos como integrantes da entidade aqueles que não tenham sido condenados judicialmente por razões relacionadas à corrupção, devendo eles declarar a inexistência de tais condenações.<br />
						• Os integrantes não envolverão o nome da entidade em processos eleitorais ou de indicação de quaisquer dos três poderes.<br />
						• Os integrantes conduzirão os negócios e contratações da entidade de forma a evitar favorecimentos.
						• Os integrantes não se utilizarão de suas posições nos órgãos dirigentes da Transparência Brasil em benefício próprio, de suas entidades ou empresas.<br />
						• Os integrantes recusarão o recebimento de presentes, descontos, cortesias, facilidades ou favores que tenham influência ou que configurem influência no exercício de suas funções na Transparência Brasil.
					</p>

					<p>
					<strong>Mecanismos</strong><br />
						• A entidade contará com uma Comissão de Ética, composta por 3 (três) membros, sendo 2 (dois) deles eleitos pela Convenção e 1 (um) indicado pelo Conselho Deliberativo, para mandato de 2 (dois) anos. Em ocasião a ser determinada pelo Conselho Deliberativo, a Comissão passará a incluir um represente do Secretariado, eleito pelos integrantes deste.<br />
						• A Comissão de Ética terá a atribuição de responder a consultas formuladas por qualquer pessoa acerca da interpretação e aplicação prática deste Código.<br />
						• A Comissão conduzirá suas atividades de forma a garantir ampla oportunidade de argumentação por parte de tantos quantos forem envolvidos em casos levados a sua apreciação.<br />
						• Após exame dos casos que lhe forem encaminhados, a Comissão de Ética formulará recomendação ao Conselho Deliberativo, ao qual caberá tomar as medidas que julgar necessárias.<br />
						• As decisões do Conselho Deliberativo em matéria ética serão passíveis de recurso à Convenção.<br />
						• O Secretariado da Transparência Brasil contará com um Código de Ética que regerá suas atividades, o qual será elaborado com a participação dos funcionários e não poderá divergir do presente Código em nenhum aspecto.
					</p>

					<p>
					<strong>Das sanções</strong><br />
						• A Comissão de Ética poderá aplicar as seguintes sanções por descumprimento deste Código:<br />
							&nbsp;&nbsp;➝ Advertência<br />
							&nbsp;&nbsp;➝ Suspensão por até 6 (seis) meses<br />
							&nbsp;&nbsp;➝ Exclusão do quadro de associados<br />
						• No caso de aplicação da pena de Exclusão, o fato será acompanhado de publicação no sítio de Internet da Transparência Brasil.
					</p>

					<p>
					<strong>Disposições gerais e transitórias</strong><br />
						• As normas para associação à Transparência Brasil incorporarão declaração de ciência do interessado quanto a este Código e de que obedecerá a ele.<br />
						• A primeira Comissão de Ética será eleita pelo Conselho Deliberativo para mandato provisório até a próxima • Convenção da Transparência Brasil.<br />
						• Caberá à primeira Comissão encaminhar à aprovação do Conselho Deliberativo proposta de Regimento para as suas atividades.<br />
						• Enquanto o Secretariado não dispuser de Código de Ética próprio, será subsumido a este.
					</p>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal -->