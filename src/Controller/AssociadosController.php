<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Associado;
use App\Model\Entity\TransacaoDoacao;
use App\Model\Entity\TransacaoUsuarioDado;
use App\Model\Entity\AssociadosComoConheceuTipo;
use Cake\I18n\Time;
use App\Controller\Component\UEmailComponent;
use Cake\Log\Log;

class AssociadosController extends AppController
{
    // carrega infos iniciais e gerais dos métodos
    public function initialize()
    {
        parent::initialize();

        $this->set('showDonationBox', false);
        $this->set('slug_pai', "associados");
        $this->loadModel('Associado');
        $this->loadComponent('Csrf');
        $this->loadComponent('Flash');
        $this->loadComponent('UString');
        $this->loadComponent('UNumero');
    }

    //carrega template da index
    public function index()
    {
        $comoConheceu = TableRegistry::get('AssociadosComoConheceuTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome'])->where('Ativo', 1);

        $escolaridade = TableRegistry::get('AssociadosEscolaridadeTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);
        $estados = $this->UString->SelectEstados();
        $this->set('comoConheceu', $comoConheceu);
        $this->set('estados', $estados);
        $this->set('escolaridade', $escolaridade);
    }

    public function exhibit()
    {
        $this->authenticate_session();
        $id = $this->request->param('id');
        $associado = $this->Associados->find('all')->where(['Codigo' => $id])->first();

        $paypalParams = $this->setPaypalButtonParams($associado->TipoAssinatura);
        $associado->p3 = $paypalParams['p3'];
        $associado->t3 = $paypalParams['t3'];

        $pagseguroParams = $this->setPagseguroButtonParams($associado->TipoAssinatura);
        $associado->code = $pagseguroParams["code"];

        $this->set('associado', $associado);
    }

    public function create()
    {
        $token = $this->request->param('_csrfToken');
        $estados = $this->UString->SelectEstados();
        $comoConheceu = TableRegistry::get('AssociadosComoConheceuTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome'])->where('Ativo', 1);

        $escolaridade = TableRegistry::get('AssociadosEscolaridadeTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

        if (!isset($token)) {
            $this->Security->requireSecure();
        }

        if ($this->request->is(['post'])) {
            $dados = $this->request->data;

            if ($this->Recaptcha->ValidarToken($dados["token"], $dados["actionOrigem"], "associados-novo") && strlen(trim($dados["apelido"])) <= 0) {
                $novoAssociado = new Associado();
            
            // busca dados e valida informações
            $novoAssociado->Nome = $this->UString->AntiXSSComLimite($dados["Nome"], 150);
            $novoAssociado->CPF = $this->UString->AntiXSSComLimite($dados["Cpf"], 15);
            $novoAssociado->Email = $this->UString->AntiXSSComLimite($dados["Email"], 100);

            $aceiteObjetivos = $this->UNumero->ValidarNumero($dados["AceiteObjetivos"]);
            $aceiteNormas = $this->UNumero->ValidarNumero($dados["AceiteNormas"]);
            $aceiteJustica = $this->UNumero->ValidarNumero($dados["AceiteDeclaracaoNaoCondenado"]);
        
            $novoAssociado->AceiteObjetivos = $aceiteObjetivos;
            $novoAssociado->AceiteNormas = $aceiteNormas;
            $novoAssociado->AceiteDeclaracaoNaoCondenado = $aceiteJustica;

            $novoAssociado->Telefone = $this->UString->AntiXSSComLimite($dados["Telefone"], 15);
            $novoAssociado->TelefoneDDD = $this->UString->AntiXSSComLimite($dados["TelefoneDDD"], 3);
            $novoAssociado->Celular  = $this->UString->AntiXSSComLimite($dados["Celular"], 15);
            $novoAssociado->CelularDDD = $this->UString->AntiXSSComLimite($dados["CelularDDD"], 3);
            $novoAssociado->UF = $this->UString->AntiXSSComLimite($dados["UF"], 2);
            $novoAssociado->Cidade = $this->UString->AntiXSSComLimite($dados["Cidade"], 200);
            $novoAssociado->Motivo = $this->UString->AntiXSSComLimite($dados["Motivo"], 2000);
            $novoAssociado->Endereco = $this->UString->AntiXSSComLimite($dados["Endereco"], 2000);
            $novoAssociado->Profissao = $this->UString->AntiXSSComLimite($dados["Profissao"], 200);
            $novoAssociado->EntidadeEmpregadora = $this->UString->AntiXSSComLimite($dados["EntidadeEmpregadora"], 200);
            

            $novoAssociado->CodigoEscolaridadeTipo = $this->UNumero->ValidarNumero($dados["CodigoEscolaridadeTipo"]);

            $novoAssociado->AceiteRadarTb = $this->UNumero->ValidarNumero($dados["AceiteRadarTb"]) > 0 ? 1 : 0;
			$novoAssociado->AceiteNovidades = $this->UNumero->ValidarNumero($dados["aceiteNovidades"]) > 0 ? 1 : 0;

            $tipo_id = $this->get_id_como_conheceu_tipo($dados["CodigoComoConheceuTB"]);
            if ($tipo_id) {
                $novoAssociado->CodigoComoConheceuTB = $tipo_id;
            } else {
                $mensagemErro = "O campo Outros deve ser preenchido";
            }

            // verifica se já existe um usuário com e-mail ou CPF digitados
            $usuario_jaExiste = $this->Associados->find('all')->where(['Email' => $novoAssociado->Email])->first();
            $mensagemErro = "";
            $jaExiste = false;
            $erroValidacao = false;

                // verifica se já existe um usuário com e-mail ou CPF digitados
                $usuario_jaExiste = $this->Associados->find('all')->where(['Email' => $novoAssociado->Email])->first();
                $mensagemErro = "";
                $jaExiste = false;
                $erroValidacao = false;

                if ($usuario_jaExiste != null) {
                    $mensagemErro = "Já existe um usuário para o e-mail digitado.";
                    $jaExiste = true;
                } else {
                    $usuario_jaExiste = $this->Associados->find('all')->where(['CPF' => $novoAssociado->CPF])->first();

                    if ($usuario_jaExiste != null) {
                        $mensagemErro .= "Já existe um usuário para o CPF digitado.";
                        $jaExiste = true;
                    } elseif ($aceiteObjetivos == 0 || $aceiteNormas == 0 || $aceiteJustica == 0) {
                        $mensagemErro .= "Você não aceitou os termos da Transparência Brasil.";
                        $erroValidacao = true;
                    }
                }

                switch ($dados["TipoContribuicao"]) {
                case 1:
                    $novoAssociado->Valor = 540;
                    $novoAssociado->TipoAssinatura = 'Anual';
                    break;
                case 2:
                    $novoAssociado->Valor = 50;
                    $novoAssociado->TipoAssinatura = 'Mensal';
                    break;
                case 3:
                    if ($dados["OutroValor"] > 50) {
                        $novoAssociado->Valor = $dados["OutroValor"];
                    } else {
                        $mensagemErro .= "Valor inserido é menor que R$ 50,00.";
                        $erroValidacao = true;
                    }
                    $novoAssociado->TipoAssinatura = 'Mensal';
                    break;
                case 4:
                    if ($dados["OutroValor"] > 540) {
                        $novoAssociado->Valor = $dados["OutroValor"];
                    } else {
                        $mensagemErro .= "Valor inserido é menor que R$ 540,00.";
                        $erroValidacao = true;
                    }
                    $novoAssociado->TipoAssinatura = 'Anual';
                    break;
            }

                // se não houver erros de validação
                if ($novoAssociado != null && !$erroValidacao) {
                    // validar cadastro e salvar usuário no banco
                    $novoAssociado->DataCadastro = Time::now();
                    // erros de validação da entidade
                    $erros = $novoAssociado->errors();
                    // senão existir, gravar novo usuário
                    if (!$jaExiste) {
                    // sem erros de validação da entidade
                    if(count($erros) > 0)
                    {
                        $mensagemErro .= 'Erro ao salvar associado [1].';
                        $this->set('erros', $erros);
                    }
    		    	else if($this->Associados->save($novoAssociado)){
                        if($novoAssociado->AceiteNovidades || $novoAssociado->AceiteRadarTb) {
                            TableRegistry::get('Newsletters')->inserir($novoAssociado->Nome, $novoAssociado->Email,$novoAssociado->AceiteNovidades,0,null,null,null,null,null,null,null,$novoAssociado->AceiteRadarTb);
                        }

                            try {
                                // enviar e-mail
                                UEmailComponent::EmailAdmAvisoNovoAssociado($novoAssociado->Nome, $novoAssociado->Email);
                            } catch (\Exception $ex) {
                                Log::write('error', "Falha ao Enviar o Email: " .  $ex->getMessage());
                            }

                            $this->Flash->success('Informações salvas com sucesso! Você será redirecionado para o site do PagSeguro para fazer sua doação. Obrigado!');                    
                            $this->set('redirectDoacao', true);
                            // cria nova transaçação
                            try {
                                $transacao_table  = new TransacaoDoacao();
                                $novaTransacaoUsuario = new TransacaoUsuarioDado();
                                $novaTransacaoUsuario->CodigoAssociado = $novoAssociado->Codigo;
                                $novaTransacaoUsuario->ValorDoacao = $novoAssociado->valor;
                                $transacao_table->NovaTransacao($novaTransacaoUsuario);
                            } catch (Exception $ex) {
                            }
                            $session = $this->request->session();
                            $session->write('auth', true);
   
                            $this->redirect('/apoie/associados/confirmacao/'.$novoAssociado->Codigo);
                            return;
                        } else {
                            $mensagemErro .= 'Erro ao salvar associado [2].';
                        }
                    }
                }
            } else {
                $mensagemErro .= 'Por favor, complete a validação anti-robo.[2]';
            }
        } else {
            $this->redirect(array('action' => 'index'));
            return;
        }

        $comoConheceu = TableRegistry::get('AssociadosComoConheceuTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome'])->where('Ativo', 1);

        $escolaridade = TableRegistry::get('AssociadosEscolaridadeTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);
        $estados = $this->UString->SelectEstados();

        $this->set('mensagemErro', $mensagemErro);
        $this->set('jaExiste', $jaExiste);
        $this->set('escolaridade', $escolaridade);
        $this->set('comoConheceu', $comoConheceu);
        $this->set('estados', $estados);
        $this->set('novoAssociado', $novoAssociado);

        $this->render('index');
    }

    public function edit()
    {
        $this->authenticate_session();
        $id = $this->request->param('id');
        
        $email_form = $this->request->data['Associados']['Email'];
        $cpf_form = $this->UNumero->SomenteNumeros($this->request->data['Associados']['CPF']);

        $aceiteObjetivos = $this->UNumero->ValidarNumero($this->request->data['Associados']["AceiteObjetivos"]);
        $aceiteNormas = $this->UNumero->ValidarNumero($this->request->data['Associados']["AceiteNormas"]);
        $aceiteJustica = $this->UNumero->ValidarNumero($this->request->data['Associados']["AceiteDeclaracaoNaoCondenado"]);
        $associado = isset($id) ? $this->Associados->find('all')->where(['Codigo' => $id])->first() : new Associado();

        if ($associado == null && $id != null) {
            $this->Flash->error('Associado não encontrado');
            $this->redirect(array('action' => 'index'));
            return;
        }

        if ($this->request->is(['post', 'put'])) {
            $mudou_email = false;
            if ($email_form != $associado->Email) {
                $mudou_email = true;
            }
            $mudou_cpf = false;
            if ($cpf_form != $associado->CPF) {
                $mudou_cpf = true;
            }
            $usuario_jaExiste = null;
            if ($mudou_email) {
                $usuario_jaExiste = $this->Associados->find('all')->where(['Email' => $email_form])->first();
            }
            $erroValidacao = false;
            if ($usuario_jaExiste != null) {
                $mensagemErro = "Já existe um usuário para o e-mail digitado.";
                $erroValidacao = true;
            } else {
                $usuario_jaExiste = null;
                if ($mudou_cpf) {
                    $usuario_jaExiste = $this->Associados->find('all')->where(['CPF' => $cpf_form])->first();
                }
    
                if ($usuario_jaExiste != null) {
                    $mensagemErro .= "Já existe um usuário para o CPF digitado.";
                    $erroValidacao = true;
                } elseif ($aceiteObjetivos == 0 || $aceiteNormas == 0 || $aceiteJustica == 0) {
                    $mensagemErro .= "Você não aceitou os termos da Transparência Brasil.";
                    $erroValidacao = true;
                }
            }

            switch ($this->request->data['Associados']["TipoAssinatura"]) {
                case 'anual':
                    $associado->Valor = 540;
                    break;
                case 'mensal':
                    $associado->Valor = 50;
                    break;
            }

			$associadoRequest = $this->Associados->newEntity($this->request->data);	

			if($associado->isNew()){
				$associado->DataCadastro = Time::now();
			}else{
				$associadoRequest->DataCadastro = $associado->DataCadastro;
			}

			$this->Associados->patchEntity($associado, $this->request->data);

			// validações
			$associado->CPF = $this->UNumero->SomenteNumeros($associadoRequest->CPF);
			$associado->TelefoneDDD = $this->UNumero->SomenteNumeros($associadoRequest->TelefoneDDD);
			$associado->Telefone = $this->UNumero->SomenteNumeros($associadoRequest->Telefone);
			$associado->CelularDDD = $this->UNumero->SomenteNumeros($associadoRequest->CelularDDD);
			$associado->Celular = $this->UNumero->SomenteNumeros($associadoRequest->Celular);

            $associado->AceiteObjetivos = $this->UNumero->ValidarNumero($associadoRequest->AceiteObjetivos);
            $associado->AceiteNormas = $this->UNumero->ValidarNumero($associadoRequest->AceiteNormas);
            $associado->AceiteDeclaracaoNaoCondenado = $this->UNumero->ValidarNumero($associadoRequest->AceiteDeclaracaoNaoCondenado);

			$associado->AceiteNovidades = $this->UNumero->SomenteNumeros($associadoRequest->AceiteNovidades) == 1 ? 1 : 0;
			$associado->AceiteLembreteDoacao = $this->UNumero->ValidarNumero($associadoRequest->AceiteLembreteDoacao) == 1 ? 1 : 0;
            $associado->AceiteRadarTb = $this->UNumero->ValidarNumero($this->request->data["AceiteRadarTb"]) == 1 ? 1 : 0;

            $associado->ExibeLista = $this->request->data["Associados"]["ExibeLista"] == 1 ? 1 : 0;
            $associado->CodigoEscolaridadeTipo = $this->UNumero->ValidarNumero($associadoRequest->CodigoEscolaridadeTipo);
            $associado->Endereco = $this->UString->AntiXSSComLimite($associadoRequest->Endereco, 2000);
            $associado->Profissao = $this->UString->AntiXSSComLimite($associadoRequest->Profissao, 200);
            $associado->EntidadeEmpregadora = $this->UString->AntiXSSComLimite($associadoRequest->EntidadeEmpregadora, 200);

            $tipo_id = $this->get_id_como_conheceu_tipo($this->request->data["Associados"]["CodigoComoConheceuTB"]);
            if ($tipo_id) {
                $associado->CodigoComoConheceuTB = $tipo_id;
            } else {
                $mensagemErro = "O campo Outros deve ser preenchido";
            }

            //die(debug($associado));
            // não salvar a data de cadastro
            $associado->unsetProperty('DataCadastro');
            
            if (!$erroValidacao) {
                if ($associado->errors()) {
                    $this->Flash->success('Erro ao salvar associado. Verifique os campos obrigatórios.');
                } else {
                    if ($this->Associados->save($associado)) {
                        
                        TableRegistry::get('Newsletters')->update($associado->Nome, $associado->Email,$associado->AceiteNovidades,0,null,null,null,null,null,null,null,$associado->AceiteRadarTb);

                        $this->Flash->success('Associado salvo com sucesso!');
                        $redirect = $this->request->query['r'];
                        if ($redirect == 'pg') {
                            $this->redirect("/associados/pagamento/".$associado->Codigo);
                        } else {
                            $this->redirect("/apoie/associados/confirmacao/".$associado->Codigo);
                        }
                    } else {
                        $this->Flash->error('Erro ao salvar associado!');
                    }
                }
            }
        }

        //$associado->DataCadastro = $this->UData->ConverterDataBrasil($associado->DataCadastro, true);

        $estados = $this->UString->SelectEstados();
        $comoConheceu = TableRegistry::get('AssociadosComoConheceuTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome'])->where('Ativo', 1);
        $escolaridade = TableRegistry::get('AssociadosEscolaridadeTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);
        $this->set('estados', $estados);
        $this->set('mensagemErro', $mensagemErro);
        $this->set('comoConheceu', $comoConheceu);
        $this->set('tipoDoacao', $tipoDoacao);
        $this->set('associado', $associado);
        $this->set('escolaridade', $escolaridade);

        $this->render('edit');
    }
    
    // exibe tela de normas da tb
    public function normas()
    {
        $this->set('slug', "associados-normas");
    }

    // exibe código de ética da tb
    public function codigoetica()
    {
        $this->set('slug', "associados-codigo-de-etica");
    }

    // carrega parametros do paypal button
    private function setPaypalButtonParams($tipoAssinatura)
    {
        //a3 Regular subscription price.
        //p3 Subscription duration. Specify an integer value in the Valid range for the units of duration that you specify with t3.
        //t3 Regular subscription units of duration.
        $params = [];
        if ($tipoAssinatura == "anual") {
            $params['p3'] = "1";
            $params['t3'] = "Y";
        } elseif ($tipoAssinatura == "mensal") {
            $params['p3'] = "1";
            $params['t3'] = "M";
        }
        return $params;
    }

    // carrega parametros do pagseguro button
    private function setPagseguroButtonParams($tipoAssinatura)
    {
        $params = [];
        //anual 540.00
        //mensal 50.00
        if ($tipoAssinatura == "anual") {
            $params['code'] = "36E2E2284E4E857554320FBAA1A24FE6";
        } elseif ($tipoAssinatura == "mensal") {
            $params['code'] = "5A1425E34D4DC65DD4616F9EA567B4DD";
        }
        return $params;
    }
     
    // carrega pagina confirmacao
    public function sucess()
    {
    }

    // carrega pagina login
    public function auth()
    {
        $session = $this->request->session();
        $session->write('auth', true);
        $Cpf = $this->UNumero->SomenteNumeros($this->request->data['Cpf']);

        if ($this->request->is(['post', 'put'])) {
            $dados = $this->request->data;
            if ($this->Recaptcha->ValidarToken($dados["token"], $dados["actionOrigem"], "associados-entrar") && strlen(trim($dados["apelido"])) <= 0) {
                $Cpf_db = TableRegistry::get('associados')->find()->where(['CPF' => $Cpf])->first();
                if (empty($Cpf_db)) {
                    $this->redirect('/associados/login?err=1');
                } else {
                    $id = $Cpf_db->Codigo;
                    $this->redirect('/associados/pagamento/'.$id);
                }
            } else {
                $this->redirect('/associados/login?err=2');
            }
        }
        return;
    }

    public function login()
    {
        $erro = $this->request->query('err');
        $mensagemErro = "";
        if ($erro == 1) {
            $mensagemErro = "CPF não encontrado.";
        }

        if ($erro == 2) {
            $mensagemErro = "Por favor, complete a validação anti-robo.";
        }

        $this->set('mensagemErro', $mensagemErro);
        $this->set('showNewsletterBox', false);
        $exibeDoacao = true;
        $this->set('slug_pai', "associados");

        $this->set('showHeader', false);
        $exibeDoacao = true;
        $this->set('slug_pai', "associados");
    }

    //carrega template Pagamento (LP)
    public function pagamento()
    {
        $this->authenticate_session();
        $id = $this->request->param('id');
        $email_form = $this->request->data['Associados']['Email'];
        $cpf_form = $this->UNumero->SomenteNumeros($this->request->data['Associados']['CPF']);

        $associado = $this->Associados->find('all')->where(['Codigo' => $id])->first();
        $paypalParams = $this->setPaypalButtonParams($associado->TipoAssinatura);

        $associado->p3 = $paypalParams['p3'];
        $associado->t3 = $paypalParams['t3'];

        $pagseguroParams = $this->setPagseguroButtonParams($associado->TipoAssinatura);
        $associado->code = $pagseguroParams["code"];

    
        if ($associado == null && $id != null) {
            $this->Flash->error('Associado não encontrado');
            $this->redirect(array('action' => 'index'));
            return;
        }
        $this->set('estados', $estados);
        $this->set('mensagemErro', $mensagemErro);
        $this->set('comoConheceu', $comoConheceu);
        $this->set('tipoDoacao', $tipoDoacao);
        $this->set('associado', $associado);
        $this->set('escolaridade', $escolaridade);
        $this->set('UNumero', $this->UNumero);
        
        $this->set('showNewsletterBox', false);
        $exibeDoacao = true;
        $this->set('slug_pai', "associados");

        $this->set('showHeader', false);
        $exibeDoacao = true;
        $this->set('slug_pai', "associados");
    }

    private function get_id_como_conheceu_tipo($tipo_id)
    {
        if ($tipo_id == 10) {
            $outros = $this->request->data['Outros'];
            if (empty($outros)) {
                return false;
            }
            $comoConheceu = TableRegistry::get('AssociadosComoConheceuTipo')->find()->where(['Nome' => $outros])->first();

            if (empty($comoConheceu)) {
                $associadosComoConheceuTipo_obj = new AssociadosComoConheceuTipo();
                $associadosComoConheceuTipo = TableRegistry::get('associados_como_conheceu_tipo');
                $associadosComoConheceuTipo_obj->Nome = $outros;
                $associadosComoConheceuTipo_obj->Ativo = 0;
                $associado_como_conheceu_tipo_id = $associadosComoConheceuTipo->save($associadosComoConheceuTipo_obj);

                return $associado_como_conheceu_tipo_id->Codigo;
            } else {
                return $comoConheceu->Codigo;
            }
        } else {
            return $tipo_id;
        }
    }

    private function authenticate_session()
    {
        $session = $this->request->session();
        if (!$session->read('auth')) {
            $this->redirect('/');
        }
    }
}
