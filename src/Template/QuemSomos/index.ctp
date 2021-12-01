<?php
  $this->assign('description', 'A Transparência Brasil é formada por um Conselho Deliberativo, um Conselho Fiscal e uma equipe executiva.');
?>
<!-- Título -->
<div class="container content-box">
    <div class="container">
        <div class="row">
            <div class="col-12 no_pd">
                <h2 class="title-pages" id="quem-somos">Quem somos</h2>
                <hr/>
            </div>
        </div>
    </div>
    <!-- Título -->
    <!-- Submenu -->
    <div class="container">
        <div class="row  d-flex">
            <ul class="nav nav-tabs  flex-column flex-md-row" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#estrutura" role="tab" aria-controls="Estrutura">ESTRUTURA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#missao" role="tab" aria-controls="Missão">MISSÃO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#reconhecimento" role="tab" aria-controls="Reconhecimento">RECONHECIMENTO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#historico" role="tab" aria-controls="Histórico">HISTÓRICO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#estatuto" role="tab" aria-controls="Estatuto">ESTATUTO</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#transparencia" role="tab" aria-controls="Financeiro">TRANSPARÊNCIA</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Submenu -->
    <div class="container">
        <div class="row">
            <!-- Conteudo -->
            <!-- Estrutura -->
            <div class="tab-content responsive col-12">
                <div class="tab-pane active" id="estrutura" role="tabpanel">
                    <h5>ESTRUTURA</h5>
                    <p class="card-text">A Transparência Brasil é formada por um Conselho Deliberativo, um Conselho Fiscal e uma equipe executiva.</p>
                    <?php
                      if (!empty($quem_somos)) {
                          $areaName = "";
                          foreach ($quem_somos as $value) {

                            if ($areaName != $value->QuemSomosArea->Nome) {
?>
                        <h6 class="pdt20 uppercase">
                            <?=$value->QuemSomosArea->Nome?>
                        </h6>
                        <?php
                                                            }
                                                            $areaName = $value->QuemSomosArea->Nome;

?>

                            <div class="row">
                                <?= !empty($value['Imagem']) ? "<div class='col-md-2 col-sm-4 my-3'><img class='full-w' src='".$this->Url->build('/') . 'uploads/quemsomos/' .$value['Imagem']."'></div>" : ""?>
                                    <div class="col-md-10 col-sm-8 my-3">
                                        <h6>
                                            <?=$value['Nome']?>
                                                <?=(!empty($value['Cargo'])) ? '('.($value['Cargo']).')' : "";?>
                                        </h6>
                                        <p class="mgt0">
                                            <?=$value['Descricao']?>
                                        </p>
                                    </div>
                            </div>
                            <?php
                            }
                        }
                    ?>
                </div>
                <!-- Estrutura -->
                <!-- Missao -->
                <div class="tab-pane" id="missao" role="tabpanel">
                    <h5>Missão</h5>
                    <p class="card-text">
                        Promover a transparência e o controle social do poder público, contribuindo para a integridade e o aperfeiçoamento das instituições, das políticas públicas e do processo democrático.
                    </p>
                    <h5>Visão</h5>
                    <p class="card-text">
                        Ser a principal referência no fortalecimento da transparência, controle social e integridade do poder público, por meio de informações qualificadas.
                    </p>
                    <h5>Valores</h5>
                    <p class="card-text">
                        Independência e autonomia<br />
                        Pioneirismo<br />
                        Transparência<br />
                        Democracia<br />
                        Excelência<br />
                    </p>

                </div>
                <!-- Missao -->
                <!-- Reconhecimento -->
                <div class="tab-pane" id="reconhecimento" role="tabpanel">
                    <h5>RECONHECIMENTO</h5>
                    <p class="card-text">A Transparência Brasil é a principal ONG de combate à corrupção do país, sendo a entidade não governamental
                        do tipo mais mencionada nas páginas dos principais veículos de comunicação brasileiros. Como representantes
                        da sociedade civil, fazemos parte dos conselhos de Transparência da Controladoria Geral da União,
                        do Senado Federal e do governo do Estado de São Paulo.
                    </p>
                    <p class="card-text">
                        Ganhador do Prêmio Esso de Melhor Contribuição à Imprensa em 2006, o projeto Excelências foi fundamental para pautar o debate
                        acerca da probidade dos parlamentares brasileiros -- mais do que um problema episódico ou individual
                        de um punhado de representantes que sofrem processos na Justiça, a questão se mostrou sistêmica.
                        A publicação do projeto, no ar há quase 10 anos, culminou na Lei da Ficha Limpa (Lei Complementar
                        135/2010).
                    </p>
                    <p class="card-text">
                        Em 2011 a Transparência Brasil obteve mais uma vitória, em conjunto com outras organizações com objetivos afins: a aprovação
                        da Lei de Acesso à Informação (Lei nº 12.527/2011). A minuta da lei foi redigida pela TBrasil e levada
                        por seus representantes ao Conselho de Transparência da Controladoria Geral da União, de onde seguiu
                        para o Congresso e para a sanção da presidente Dilma Rousseff (PT).
                    </p>
                    <p class="card-text">
                        Por conta de seu trabalho à frente da entidade por quase 15 anos, o matemático e jornalista Claudio Weber Abramo foi premiado
                        em 2015 pela Associação Brasileira de Jornalismo Investigativo.</p>
                    <div class="row">
                        <div class="col-12 px-0 text-center">
                            ​<script type="text/javascript" id="ngos-ed-on-file-widget-script-17336c1f-917d-492b-bc53-225c95e103da">
                                (function() {
                                function async_load()
                                { var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; var theUrl = 'https://www.ngosource.org/sites/default/files/ngos_ed_on_file_widget.js'; s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + 'ref=' + encodeURIComponent(window.location.href); var embedder = document.getElementById('ngos-ed-on-file-widget-script-17336c1f-917d-492b-bc53-225c95e103da'); embedder.parentNode.insertBefore(s, embedder); }
                                if (window.attachEvent)
                                window.attachEvent('onload', async_load);
                                else
                                window.addEventListener('load', async_load, false);
                                })();
                            </script> 
                        </div>
                    </div>
                </div>
                <!-- Reconhecimento -->
                <!-- Historico -->
                <div class="tab-pane" id="historico" role="tabpanel">
                    <h5>HISTÓRICO</h5>
                    <p class="card-text">A Transparência Brasil é uma organização independente e autônoma, fundada em abril de 2000 por um grupo
                        de indivíduos e entidades não-governamentais comprometidos com o combate à corrupção.
                    </p>
                    <p class="card-text">
                        A necessidade de uma organização como a Transparência Brasil pode ser bem compreendida pelas características do país.
                    </p>
                    <p class="card-text">
                        Com uma população de quase 200 milhões de pessoas, o Brasil é o maior país da América Latina e um dos maiores do mundo. O
                        país atravessou mudanças econômicas profundas, que envolveram um extenso programa de privatizações
                        e uma retirada gradual do Estado das atividades econômicas. Seu PIB corresponde à metade de toda
                        a América Latina e o Caribe, excetuando o México. Contudo, sua grande população o coloca em posição
                        pouco privilegiada no que tange o PIB per capita. O índice de Gini do país é dos piores do mundo;
                        os 20% situados no topo da pirâmide de renda são responsáveis por mais de 60% do consumo total, ao
                        passo que os 20% inferiores consomem apenas 2,5%.
                    </p>
                    <p class="card-text">
                        Embora, sob o ponto de vista institucional, o Brasil tenha eleições livres, um Congresso e um Judiciário independentes e
                        todas as demais garantias constitucionais típicas das democracias representativas, as práticas do
                        mundo real nem sempre refletem o arcabouço formal.
                    </p>
                    <p class="card-text">
                        As regras eleitorais se encontram na pauta de preocupações, em especial no que diz respeito ao financiamento de campanhas.
                        A transparência dos atos das três esferas do Estado é pequena, o que em grande parte se deve a padrões
                        de comportamento arraigados e, em menor medida, à falta de coordenação entre os interessados em mudar
                        a situação.
                    </p>
                    <p class="card-text">
                        Outro fator importante é a estrutura do Estado. O sistema federativo brasileiro impõe certas legislações aos demais níveis,
                        mas a autonomia de estados e de municípios confere a estes grande independência na formulação de
                        regulamentos e na adoção de práticas administrativas. Isso leva à ineficiência dos controles locais.
                    </p>
                    <p class="card-text">
                        As disparidades brasileiras nos terrenos social e econômico refletem-se diretamente nos instrumentos disponíveis para o combate
                        à corrupção. Uma imprensa moderna se faz presente nas principais cidades, mas não se distribui uniformemente
                        entre as diversas regiões do país. A lei vale pouco e é na prática inacessível para a grande maioria
                        da população. O grau de transparência é baixo, um problema que afeta não apenas o Executivo como
                        também o Legislativo, o Judiciário e o Ministério Público. Em alguns círculos empresariais, o poder
                        de corromper é encarado como vantagem competitiva.</p>
                </div>
                <!-- Historico -->
                <!-- Estatuto -->
                <div class="tab-pane" id="estatuto" role="tabpanel">
                    <h5>ESTATUTO</h5>

                    <h6 class="mt-5">CAPÍTULO I: DOS OBJETIVOS</h6>
                    <h6>Artigo 1º</h6>
                    <p class="card-text mt-0">
                        A Transparência Brasil, com sede e foro na cidade de São Paulo, na Rua Professor João Marinho, 161 - Paraíso, SP, CEP: 04007-010, é uma associação sem fins econômicos ou lucrativos, destinada a promover a defesa do interesse público por meio da edificação da integridade do Estado brasileiro e o combate à corrupção, contribuindo para o aperfeiçoamento das instituições e do processo democrático.
                    </p>
                    <h6>Artigo 2º</h6>
                    <p class="card-text mb-0 mt-0">
                        Para cumprimento de suas finalidades a Transparência Brasil observará os princípios da legalidade, impessoalidade, moralidade, publicidade, economicidade e da eficiência e poderá desenvolver as seguintes atividades, sem conotação político-partidária:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	Estabelecer redes, parcerias e intercâmbios com organizações não governamentais, universidades, poder público e outras entidades, facilitando a atuação desses órgãos e da sociedade civil, no âmbito nacional e internacional; <br />
                        •	Participar da criação, organização e atuação de entidades locais, internacionais e fóruns que tenham como objetivo a promoção do combate à corrupção;<br />
                        •	Apoiar pessoas, grupos, movimentos e organizações que lutam por reformas institucionais e conscientização pública;<br />
                        •	Estimular e desenvolver estudos e trabalhos com a finalidade de incentivar a implantação de políticas públicas e atitudes privadas, evitando-se o uso indevido do Poder Público para benefício privado;<br />
                        •	Organizar e divulgar dados sobre a corrupção nas diversas esferas de governo e no setor privado;<br />
                        •	Propor medidas para a defesa do interesse público;<br />
                        •	Promover palestras, debates e encontros com outras instituições sobre o combate à corrupção, bem como estimular a participação dos associados em conferências e fóruns internacionais;<br />
                        •	Ajudar órgãos e entidades ligadas ao Poder Público no planejamento, mobilização de recursos e implantação de projetos de combate à corrupção;<br />
                        •	Divulgar e comunicar informações sobre o trabalho desenvolvido pela Transparência Brasil e outras entidades, além de projetos governamentais de combate à corrupção;<br />
                        •	Desenvolver outras atividades necessárias ao cumprimento dos objetivos sociais.
                    </p>

                    <h6 class="mt-5">CAPÍTULO II: DOS ASSOCIADOS</h6>
                    <h6>Artigo 3º</h6>
                    <p class="card-text mb-0 mt-0">
                        São associados da Transparência Brasil as pessoas, entidades e empresas nela regularmente inscritas, em qualquer das seguintes categorias:
                    </p>
                    <p class="card-text ml-3 mb-1 mt-0">
                        •	associados participantes: pessoas físicas, com direito a voz e voto na Convenção;<br />
                        •	associados institucionais: organizações da sociedade civil, cujos representantes credenciados têm direito a voz e voto na Convenção;<br />
                        •	associados apoiadores: empresas, sem direito a voto em Convenção.
                    </p>
                    <p class="card-text ml-5 mt-0">
                        o	§ 1º Os associados participantes e os representantes de associados institucionais têm direito a ocupar cargos nos órgãos eletivos da Transparência Brasil.<br />
                        o	§ 2º Para ingressar no quadro de associados da Transparência Brasil, o interessado deverá ser aprovado pelo Conselho Deliberativo. Em nenhuma hipótese, em caso de rejeição, serão comunicadas as razões da recusa.<br />
                        o	§ 3º No ato de solicitação de associação, os associados institucionais designarão representantes credenciados; a substituição de representante credenciado de associado institucional em qualquer tempo se fará por comunicação à Transparência Brasil.<br />
                    </p>

                    <h6>Artigo 4.º</h6>
                    <p class="card-text mt-0">
                        São considerados fundadores os signatários do ato constitutivo da Transparência Brasil e os que aderiram a esse ato até 4 (quatro) meses a partir da data de sua criação.
                    </p>

                    <h6>Artigo 5º</h6>
                    <p class="card-text mb-0 mt-0">
                    São requisitos para a admissão de associado:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	I estar comprometido com a finalidade da Transparência Brasil;<br />
                        •	II obrigar-se a contribuir para o alcance dos objetivos da Transparência Brasil;<br />
                        •	III apresentar manifestação de intenção de associar-se, em que esteja expressa concordância em efetuar contribuição financeira periódica à Transparência Brasil.
                    </p>

                    <h6>Artigo 6º</h6>
                    <p class="card-text mb-0 mt-0">
                    São direitos dos associados:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	I participar, na forma prevista pelos órgãos competentes, das atividades da Transparência;<br />
                        •	II desligar-se da Transparência Brasil, mediante solicitação dirigida ao Conselho;<br />
                        •	III ter acesso a informações pertinentes à Transparência Brasil.
                    </p>

                    <h6>Artigo 7º</h6>
                    <p class="card-text mb-0 mt-0">
                        São deveres dos associados:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	I cumprir as disposições estatutárias;<br />
                        •	II estar comprometido com os objetivos da Transparência Brasil, cooperando para a consecução dos fins sociais;<br />
                        •	III pagar as contribuições devidas;<br />
                        •	IV manter atualizadas as suas informações cadastrais.
                        <h6 class="ml-3">Parágrafo Único</h6> 
                        <p class="card-text ml-3  mt-0">Os associados não respondem, nem mesmo subsidiariamente, pelas obrigações da Transparência Brasil.</p>
                    </p>

                    <h6>Artigo 8º</h6>
                    <p class="card-text mb-0 mt-0">
                        O associado poderá ser excluído quando:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	I infringir as disposições estatutárias, regimentos ou qualquer decisão dos órgãos da Transparência Brasil;<br />
                        •	II deixar de cumprir seus deveres de associado;<br />
                        •	III praticar ato prejudicial ao patrimônio ou à imagem da Transparência Brasil.
                        <h6 class="ml-3">Parágrafo Único</h6>
                        <p class="card-text ml-3 mt-0">A exclusão de associado se fará pelo Conselho Deliberativo, cabendo recurso à Convenção.</p>
                    </p>

                    <h6 class="mt-5">CAPÍTULO III: DA ORGANIZAÇÃO</h6>
                    <h6>Artigo 9º</h6>
                    <p class="card-text mb-0 mt-0">
                        São órgãos da Transparência Brasil:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	I Convenção<br />
                        •	II Conselho Deliberativo<br />
                        •	III Secretariado<br />
                        •	IV Conselho Fiscal
                    </p>

                    <h6>Da Convenção</h6>
                    <h6>Artigo 10</h6>
                    <p class="card-text mb-0 mt-0">
                        A Convenção é a Assembléia Geral da Transparência Brasil, reunindo os associados. Compete à Convenção:
                    </p>
                    <p class="card-text ml-3 mb-1 mt-0">
                        •	I traçar as diretrizes gerais da Transparência Brasil, assim como avaliar a sua atuação;<br />
                        •	II eleger e destituir os membros do Conselho Fiscal;<br />
                        •	III eleger e destituir os membros do Conselho Deliberativo;<br />
                        •	IV apreciar as contas da Transparência Brasil, aprovadas pelo Conselho Deliberativo;<br />
                        •	V alterar este Estatuto;<br />
                        •	VI deliberar sobre a transformação ou extinção da Transparência Brasil e o destino do patrimônio;<br />
                        •	VII examinar recursos apresentados por associados às decisões do Conselho Deliberativo.
                    </p>
                    <p class="card-text ml-5 mt-0">
                        o	§ 1º A Convenção será realizada anualmente e poderá ser convocada, extraordinariamente, com antecedência de 15 (quinze) dias por deliberação da maioria absoluta do Conselho Deliberativo e/ou por 1/5 (um quinto) dos associados.<br />
                        o	§ 2º O voto de associados em Convenção poderá ser exercido por procuração explícita a outros associados, vedando-se a procuração a não associados.<br />
                        o	§ 3º As Convenções serão convocadas pelo Presidente do Conselho Deliberativo ou seu substituto, mediante correspondência aos associados, mencionando-se dia, hora e local da sua realização, bem como, expressa e claramente, a Ordem do Dia a ser debatida.<br />
                        o	§ 4º A convocação da Convenção dar-se-á por carta remetida ao endereço físico ou eletrônico do associado.<br />
                        o	§ 5º Para as deliberações que tenham por objeto a destituição de administradores ou a alteração do Estatuto Social serão exigidos os votos concordes na forma e quórum previstos na legislação aplicável. Nas demais matérias, as deliberações serão tomadas pela maioria absoluta dos presentes à Convenção, ressalvando que, quando se tratar de dissolução da Transparência Brasil, será exigido um quórum de, pelo menos, 70% (setenta por cento) dos associados.
                    </p>

                    <h6>Do Conselho Deliberativo</h6>
                    <h6>Artigo 11</h6>
                    <p class="card-text mb-0 mt-0">
                        O Conselho Deliberativo será composto de um máximo de 15 (quinze) membros, eleitos pela Convenção para mandatos de 3 (três) anos, permitida a recondução.
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	§ 1º Os mandatos dos membros do Conselho Deliberativo poderão ser prorrogados até que se realize nova eleição para preenchimento dos cargos. Enquanto não houver eleição, ficam os membros investidos no cargo com poderes para tomar decisões.<br />
                        •	§ 2º Os membros do Conselho Deliberativo não serão remunerados.
                    </p>

                    <h6>Artigo 12</h6>
                    <p class="card-text mb-0 mt-0">
                        Ao Conselho Deliberativo compete:
                    </p>
                    <p class="card-text ml-3 mt-0 mb-1">
                        •	I supervisionar as atividades da Transparência Brasil;<br />
                        •	II aprovar a indicação do Diretor Executivo;<br />
                        •	III aprovar o orçamento para o exercício seguinte;<br />
                        •	IV julgar as contas do Secretariado, com base em parecer do Conselho Fiscal;<br />
                        •	V dispor sobre seu próprio funcionamento;<br />
                        •	VI examinar quaisquer atos do Secretariado;<br />
                        •	VII decidir sobre a suspensão ou exclusão de associados;<br />
                        •	VIII deliberar sobre a contribuição dos associados;<br />
                        •	IX adotar e estabelecer, para todos os órgãos da Transparência Brasil, práticas de gestão administrativa, necessárias e suficientes para coibir a obtenção, de forma individual ou coletiva, de benefícios ou vantagens pessoais, em decorrência da participação nos respectivos processos decisórios;
                    </p>
                    <p class="card-text ml-5 mt-0">
                        o	§ 1º O membro do Conselho Deliberativo abster-se-á de votar matérias em que esteja envolvido seu interesse pessoal, de associados e familiares;<br />
                        o	§ 2º As decisões do Conselho Deliberativo serão tomadas pela maioria dos que participarem de suas reuniões.<br />
                        o	§ 3º Das decisões do Conselho Deliberativo caberá recurso à Convenção.
                    </p>

                    <h6>Artigo 13</h6>
                    <p class="card-text mt-0">
                        A cada três anos, os membros do Conselho Deliberativo elegerão o Presidente e o Vice-Presidente do Conselho, os quais poderão ser reconduzidos a esses cargos em eleições subseqüentes.
                    </p>

                    <h6>Artigo 14</h6>
                    <p class="card-text mt-0">
                        O Conselho Deliberativo reunir-se-á, pelo menos, 1 (uma) vez por ano e sempre que convocado pelo seu Presidente ou por 3 (três) dos seus membros.
                    </p>

                    <h6>Artigo 15</h6>
                    <p class="card-text mb-0 mt-0">
                        Compete ao Presidente do Conselho Deliberativo:
                    </p>
                    <p class="card-text ml-3 mt-0"> 
                        •	I convocar as reuniões do Conselho Deliberativo e presidi-las;<br />
                        •	II convocar as Convenções e presidi-las;<br />
                        •	III representar o Conselho Deliberativo perante os demais órgãos da Transparência Brasil e os associados;
                        •	IV indicar o Diretor Executivo;<br />
                        •	V em conjunto com o Diretor Executivo, estabelecer a política de remuneração dos integrantes do Secretariado.
                    </p>

                    <h6>Artigo 16</h6>
                    <p class="card-text mt-0">
                        Compete ao Vice-Presidente substituir o Presidente em suas faltas ou impedimentos, momentâneos ou temporários.
                    </p>

                    <h6>Do Secretariado</h6>
                    <h6>Artigo 17</h6>
                    <p class="card-text mt-0">
                        O Secretariado será dirigido por 1 (um) Diretor Executivo.
                    </p>

                    <h6>Artigo 18</h6>
                    <p class="card-text mb-0 mt-0">
                        Compete ao Diretor Executivo:
                    </p>
                    <p class="card-text ml-3 mt-0">
                        •	I implementar as diretrizes definidas pelo Conselho Deliberativo, agindo de conformidade com sua orientação;<br />
                        •	II elaborar, anualmente, o programa de trabalho e o orçamento da instituição e submetê-los ao Conselho Deliberativo;<br />
                        •	III dirigir as atividades da instituição e praticar os atos de gestão administrativa;<br />
                        •	IV estabelecer diretrizes sobre as atividades do pessoal que presta serviços à Transparência Brasil;<br />
                        •	V representar a Transparência Brasil ativa e passivamente, judicial e extrajudicialmente;<br />
                        •	VI coordenar as atividades da entidade;<br />
                        •	VII participar das reuniões do Conselho Deliberativo, com direito a voz mas sem direito a voto.
                    </p>

                    <h6>Artigo 19</h6>
                    <p class="card-text mt-0">
                        O Diretor Executivo poderá outorgar mandatos para que a Associação seja representada por outros que não ele.
                    </p>

                    <h6>Artigo 20</h6>
                    <p class="card-text mt-0">
                        A contratação de obrigações pela Transparência Brasil dependerá sempre de ato assinado pelo Diretor Executivo ou seu procurador, em conjunto com um membro do Conselho Deliberativo.
                    </p> 
                    <h6 class="ml-3">Parágrafo Único</h6>
                    <p class="card-text ml-3 mt-0">
                        A emissão de cheques e a movimentação financeira de cunho bancário serão efetuadas pela assinatura conjunta do Presidente do Conselho Deliberativo e do Diretor Executivo, ou por procuradores por estes designados.
                    </p>

                    <h6>Do Conselho Fiscal</h6>
                    <h6>Artigo 21</h6>
                    <p class="card-text mt-0">
                        O Conselho Fiscal será composto por 3 (três) membros eleitos pela Convenção para mandato de 3 (três) anos, permitida a recondução para mais 1 (um) mandato.
                    </p>

                    <h6>Artigo 22</h6>
                    <p class="card-text mb-0 mt-0">
                        Ao Conselho Fiscal compete:
                    </p>
                    <p class="card-text ml-3 mt-0">
                    •	I opinar sobre relatórios de desempenho financeiro e contábil e sobre operações patrimoniais realizadas, emitindo os competentes pareceres;<br />
                    •	II zelar pela observância dos princípios fundamentais de contabilidade e das Normas Brasileiras de Contabilidade, na prestação de contas e atos correlatos da Transparência Brasil.
                    </p>

                    <h6>Artigo 23</h6>
                    <p class="card-text mt-0">
                        Os membros do Conselho Fiscal se reunirão ordinariamente uma vez por ano, nos termos do Artigo 35, e a qualquer tempo quando convocados pelo Conselho Deliberativo.
                    </p>
                    <h6 class="ml-3">Parágrafo Único</h6>
                    <p class="card-text ml-3 mt-0">
                        Os membros do Conselho Fiscal não serão remunerados.
                    </p>

                    <h6 class="mt-5">CAPÍTULO IV: DA PUBLICIDADE DOS ATOS</h6>
                    <h6>Artigo 24</h6>
                    <p class="card-text mt-0">
                        A Transparência Brasil dará publicidade, por qualquer meio eficaz, após o encerramento do exercício fiscal, ao relatório de atividades e das demonstrações financeiras referentes ao período, incluindo-se as certidões negativas de débitos junto ao INSS e ao FGTS, colocando-os à disposição para exame de qualquer cidadão.
                    </p>

                    <h6>Artigo 25</h6>
                    <p class="card-text mt-0">
                        A Transparência Brasil publicará resumos de atas de reuniões de todos os seus órgãos.
                    </p>

                    <h6>Artigo 26</h6>
                    <p class="card-text mb-0 mt-0">
                        Para assegurar a transparência na aplicação dos recursos da Transparência Brasil, o Secretariado deverá:
                    </p>
                    <p class="card-text ml-3 mt-0"> 
                        •	I permitir a realização de auditoria, inclusive por auditores externos independentes, da aplicação de eventuais recursos objeto de termos de parceria;<br />
                        •	II prestar contas de todos os recursos e bens de origem pública recebidos pela Transparência Brasil, em conformidade com o que determina o parágrafo único do artigo 70 da Constituição Federal.
                    </p>

                    <h6 class="mt-5">CAPÍTULO V: DO PATRIMÔNIO</h6>
                    <h6>Artigo 27</h6>
                    <p class="card-text mt-0">
                        O patrimônio da Transparência Brasil será constituído pelos bens móveis, imóveis e imateriais que venham a ser acrescentados por meio de doações, legados e pela aplicação de receitas.
                    </p>

                    <h6>Artigo 28</h6>
                    <p class="card-text mb-0 mt-0">
                        Constituem receitas ordinárias:
                    </p>
                    <p class="card-text ml-3 mt-0"> 
                        •	I a contribuição mensal dos associados;<br />
                        •	II a renda patrimonial;<br />
                        •	III contribuições voluntárias, doações, subvenções e dotações.
                    </p>

                    <h6>Artigo 29</h6>
                    <p class="card-text mt-0">
                        Na hipótese de dissolução da Transparência Brasil, o respectivo patrimônio líquido será transferido pessoa jurídica qualificada nos termos da Lei no 9.790/99, preferencialmente para aquela que tenha o mesmo objeto social da extinta.
                    </p>

                    <h6>Artigo 30</h6>
                    <p class="card-text mt-0">
                        Na hipótese de a Transparência Brasil perder a qualificação instituída na Lei no 9.790/99, o respectivo acervo patrimonial disponível, adquirido com recursos públicos durante o período em que perdurou aquela qualificação, será transferido a outra pessoa jurídica qualificada nos termos da referida Lei, preferencialmente que tenha o mesmo objeto social.
                    </p>

                    <h6 class="mt-5">CAPÍTULO VI: DISPOSIÇÕES GERAIS E TRANSITÓRIAS</h6>
                    <h6>Artigo 31</h6>
                    <p class="card-text mt-0">
                        A Transparência Brasil é constituída por prazo indeterminado, competindo à Convenção decidir, nos termos deste estatuto, sobre sua eventual extinção.
                    </p>

                    <h6>Artigo 32</h6>
                    <p class="card-text mt-0">
                        Os casos omissos ou duvidosos no presente estatuto serão resolvidos pelo Presidente do Conselho Deliberativo em conjunto com o Diretor Executivo, cabendo recurso ao Conselho Deliberativo.
                    </p>

                    <h6>Artigo 33</h6>
                    <p class="card-text mt-0">
                        São impedidos de exercer cargos no Conselho Deliberativo, no Secretariado e no Conselho Fiscal os membros do Poder Legislativo em seus diferentes níveis, os dirigentes do Poder Judiciário, do Ministério Público e da Administração Pública direta, indireta e fundacional, bem como pessoas que estejam concorrendo a cargos eletivos ou de indicação sujeita a eleição interna corporis.
                    </p>

                    <h6>Artigo 34</h6>
                    <p class="card-text mt-0">
                        Todos os órgãos da Transparência Brasil poderão reunir-se e tomar decisões presencial ou virtualmente, por troca de mensagens eletrônicas, correio ou outro meio de comunicação que assegure a autenticidade da manifestação.
                    </p>

                    <h6>Artigo 35</h6>
                    <p class="card-text mb-0 mt-0">
                        Reuniões presenciais dos órgãos da Transparência Brasil são sujeitas a quórum de 50% de seus integrantes em primeira convocação e de qualquer número em segunda convocação.
                    </p>
                    <p class="card-text ml-3 mt-0"> 
                        •	§ 1º A segunda convocação far-se-á 30 (trinta) minutos após a primeira.<br />
                        •	§ 2º O quórum de reuniões virtuais será garantido pela manutenção de um prazo mínimo de 5 (cinco) dias úteis para a manifestação dos respectivos integrantes.
                    </p>
                </div>
                <!-- Estatuto -->
                <!-- Balanco financeiro -->
                <div class="tab-pane" id="transparencia" role="tabpanel">
                    <h5>Financiamento</h5>
                    <p class="card-text">
                    A Transparência Brasil acredita que deve dar o exemplo no que tange à transparência de suas atividades. Aqui você encontra informações sobre quem nos financia, em que montante e para quais atividades. 
                    </p>
                    <p class="card-text">
                    Além disso, divulgamos também nosso relatórios de atividades, balanço e resultado das auditorias realizadas, conforme artigo 26 do nosso estatuto. Nós procuramos seguir os melhores padrões mundiais de transparência, tais como os preconizados por organizações como a <a href="http://www.transparify.org/our-methodology/" target="_blank">transparify.org</a>
                    </p>
                    <div id="financia">
                        <h6><strong>Financiamento</strong></h6>
                        <table class="table table-hover table-responsive" id="financiamento">
                            <thead>
                                <tr>
                                    <th>Fonte de financiamento</th>
                                    <th>Valor</th>
                                    <th>Período</th>
                                    <th>Relatórios</th>
                                    <th>Termo de doação</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    if (count($financiamentos) > 0) {
        foreach ($financiamentos as $financiamento) {
?>
                                <tr>
                                        <td scope="row"><?=$financiamento->FonteDeFinanciamento?></td>
                                        <td><?=$financiamento->Valor?></td>
                                        <td><?=$financiamento->Periodo?></td>
                                        <td>
<?php
            $arquivos = $financiamento->FinanciamentosArquivos;
            if (count($arquivos) > 0) {
                foreach ($arquivos as $arquivo) {
                    if ($arquivo->Tipo == 'relatorio') {
?>
                                            <a href="/uploads/financiamentos/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a><br><br>
<?php
                    }
                }
            }
?>
                                        </td>
                                        <td>
<?php
            $arquivos = $financiamento->FinanciamentosArquivos;
            if (count($arquivos) > 0) {
                foreach ($arquivos as $arquivo) {
                    if ($arquivo->Tipo == 'termo-de-doacao') {
?>
                                            <a href="/uploads/financiamentos/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a><br><br>
<?php
                    }
                }
            }
?>
                                        </td>
                                        <td><a href="<?=$financiamento->TipoLink?>" target="_blank"><?=$financiamento->Tipo?></a></td>
                                </tr>
<?php
        }
    } 
?>                             
                            </tbody>
                        </table>
                        <h6><strong>Auditorias e contabilidade</strong></h6>
                        <table class="table table-hover table-responsive" id="auditorias">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ano</th>
                                    <th>Documento</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    if (count($auditorias) > 0) {
        foreach ($auditorias as $key => $auditoria ) {
?>
                                <tr>
                                    <td><?=$key +1?></td>
                                    <td><?=$auditoria->Ano?></td>
                                    <td><?=$auditoria->Documento?></td>
                                    <td>
<?php
            $arquivos = $auditoria->AuditoriasContabilidadeArquivos;
            if (count($arquivos) > 0) {
                foreach ($arquivos as $arquivo) {
?>
                                    <a href="/uploads/auditoriascontabilidade/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a><br><br>
<?php
                }
            }
?>
                                    </td>
                                </tr>
                                <?php
        }
    } 
?>  
                            </tbody>
                        </table>
                        <h6><strong>Relatório de atividades</strong></h6>
                        <table class="table table-hover table-responsive" id="atividades">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ano</th>
                                    <th>Documento</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    if (count($relatorios) > 0) {
        foreach ($relatorios as $key => $relatorio ) {
?>
                                <tr>
                                    <td><?=$key +1?></td>
                                    <td><?=$relatorio->Ano?></td>
                                    <td><?=$relatorio->Documento?></td>
                                    <td>
<?php
            $arquivos = $relatorio->RelatoriosAtividadesArquivos;
            if (count($arquivos) > 0) {
                foreach ($arquivos as $arquivo) {
?>
                                    <a href="/uploads/relatoriosatividades/<?=$arquivo->Arquivo?>" target="_blank"><?=$arquivo->Arquivo?></a><br><br>
<?php
                }
            }
?>
                                    </td>
                                </tr>
                                <?php
        }
    } 
?>  
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<script>
    //$('.carousel').carousel()

</script>
<script type="text/javascript">
    $(function () {
        // $('#myTab a:first').tab('show')

        console.log("entrou no function");
        var $tabs = $('a[data-toggle="tab"]');
        
        managehash = function()
        {
            // $(window).on('hashchange', function()
            // {
                $tabs.each(function()
                {
                    console.log(this.hash)
                    if(this.hash === window.location.hash)
                    {
                        console.log("entrou no if")
                        $(this).tab('show');
                    }
                });
            // });
        }
        
        $tabs.on('click', function()
        {
            window.location.hash = this.hash
            var scrollHeight = $(document).scrollTop();

            $(this).tab('show');

            setTimeout(function() {
                $(window).scrollTop(scrollHeight );
            }, 5);
        });

        $(window).on('hashchange', function()
        {
            managehash();
        });

        if(window.location.hash === '')
        {
            $('#myTab a:first').tab('show')
            window.location.hash = $tabs[0].hash
        }
        
        managehash();

    })
</script>