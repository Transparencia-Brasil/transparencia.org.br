<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Contato;
use App\Model\Entity\Newsletter;
use App\Controller\Component\UEmailComponent;

class NewsletterController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->set('showNewsletterBox', false);

        $this->loadModel('Contato');
        $this->loadModel('Newsletter');
        $this->set('slug_pai', "newsletter");

        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        $this->loadComponent('UString');
        $this->loadComponent('UNumero');
    }

    public function index()
    {
        $newsletter = new Newsletter();
        $guid = $this->UString->guid();
        $estados = $this->UString->SelectEstados();
        $this->set('guid', $guid);
        $this->set('contato', $newsletter);
        $this->set('estados', $estados);        
    }

    public function novoContato()
    {
        if ($this->request->is(['post', 'put'])) {
            $dados = $this->request->data;

            $newsletter = new Newsletter();

            // tentativa de reenvio de formulário
            //$newsletters = TableRegistry::get('Newsletters');
            $newsletter->Origem = $this->UString->AntiXSSComLimite($dados["origem"], 50);
            $newsletter->Nome = $this->UString->AntiXSSComLimite($dados["nome"], 100);
            $newsletter->Email = $this->UString->AntiXSSComLimite($dados["email"], 100);
            $newsletter->Optin_newsletter = $this->UNumero->ValidarNumero($dados["optin_newsletter"]) > 0 ? 1 : 0;
            $newsletter->Optin_press = $this->UNumero->ValidarNumero($dados["optin_press"]) > 0 ? 1 : 0;
            $newsletter->optin_radar_tb = $this->UNumero->ValidarNumero($dados["optin_radar_tb"]) > 0 ? 1 : 0;            
            $newsletter->Cidade = $this->UString->AntiXSSComLimite($dados["Cidade"], 200);
            $newsletter->UF = $this->UString->AntiXSSComLimite($dados["UF"], 2);
            $newsletter->Veiculo = $this->UString->AntiXSSComLimite($dados["Veiculo"], 100);
            $newsletter->Telefone = $this->UString->AntiXSSComLimite($dados["Telefone"], 10);
            $newsletter->DDD = $this->UString->AntiXSSComLimite($dados["DDD"], 3);
		$erro = false;
		if($newsletter != null)
		{
            if ($this->Recaptcha->ValidarToken($dados["token"], $dados["actionOrigem"], "pagina-newsletter") && strlen(trim($dados["apelido"])) <= 0) {
                if ($newsletter->Optin_newsletter == 0 && $newsletter->optin_radar_tb == 0) {
                    $mensagem = "Você precisa selecionar pelo menos uma assinatura.";
                } else {
                    $erros = $newsletter->errors();
                    if(count($erros) > 0){
                        $erro = true;
                        $mensagem = 'Erro ao cadastrar email para newsletter.[1]';
                    }else{
                        // insere um novo usuário de newsletter
                        $token = $this->createDoubleOptinToken($newsletter->Email);
                        $email_encontrado = TableRegistry::get('Newsletters')->inserir($newsletter->Nome, $newsletter->Email,$newsletter->Optin_newsletter,$newsletter->Optin_press,$newsletter->Cidade,$newsletter->UF,$newsletter->Veiculo,$newsletter->Telefone,$newsletter->DDD,$token,$newsletter->Origem,$newsletter->optin_radar_tb);

                        if ($email_encontrado) {
                            $mensagem = 'Seu email já está cadastrado na nossa newsletter.';
                        } else {
                            //dispara email
                            UEmailComponent::EmailNewsletterDoubleOptin($newsletter->Nome, $newsletter->Email,$token);
                            $mensagem = 'Enviamos um email para ' .$newsletter->Email . '.<br><br>Acesse sua caixa de entrada ou de spam para finalizar a assinatura da newsletter.';
                        }

                        //evita reenvio de dados
                        $this->request->session()->write('guidContatoEnviado', $guid);
                        $this->request->data = [];
                    }
                }
            } else {
                $erro = true;
                $mensagem = 'Por favor, complete a validação anti-robo.[2]';
            }
		}else{
			$erro = true;
			$mensagem = 'Erro ao cadastrar email para newsletter.[2]';
		}
    	}else{
            $this->redirect(['action' => 'index']);
            return;
        }

        $estados = $this->UString->SelectEstados();
        $this->set('estados', $estados);
        $this->set('guid', $guid);
        $this->set('erro', $erro);
        $this->set('mensagem', $mensagem);
        $this->set('contato', $newsletter);

        $this->render('index');
    }

    public function novoContatoAjax()
    {
        $erro = false;
        $sucesso = 0;
        if ($this->request->is(['post', 'put'])) {
            $dados = $this->request->data;

            $newsletter = new Newsletter();

            // tentativa de reenvio de formulário
            //$newsletters = TableRegistry::get('Newsletters');
            $dados = $this->request->data;

            
            if (empty($dados["email"])) {
                $mensagem = "O email não pode ficar em branco.";
                $error=true;
            } else {
                if (empty(filter_var($dados["email"], FILTER_VALIDATE_EMAIL))) {
                    $mensagem = "O email precisa estar com um formato válido";
                    $error=true;
                };
            }
            
            if (empty($dados["nome"])) {
                $mensagem = "O nome não pode ficar em branco.";
                $error=true;
            }
            
            $newsletter->Origem = $this->UString->AntiXSSComLimite($dados["origem"], 50);
            $newsletter->Nome = $this->UString->AntiXSSComLimite($dados["nome"], 100);
            $newsletter->Email = $this->UString->AntiXSSComLimite($dados["email"], 100);
            $newsletter->Optin_newsletter = $this->UNumero->ValidarNumero($dados["optin_newsletter"]) > 0 ? 1 : 0;
            $newsletter->Optin_press = $this->UNumero->ValidarNumero($dados["optin_press"]) > 0 ? 1 : 0;
            $newsletter->optin_radar_tb = $this->UNumero->ValidarNumero($dados["optin_radar_tb"]) > 0 ? 1 : 0;
            
            if (!$this->Recaptcha->ValidarToken($dados["token"], $dados["actionOrigem"], "ajax-newsletter")) {
                $error = true;
                $mensagem = 'Por favor, complete a validação anti-robo.[2]';
            }
            if(strlen(trim($dados["apelido"])) > 0) {
                $error = true;
                $mensagem = 'Você não passou na validação anti-robo.[2]';
            }

            if (!$error) {
                if($newsletter != null)
                {
                    if ($newsletter->Optin_newsletter == 0 && $newsletter->optin_radar_tb == 0) {

                        $mensagem = "Você precisa selecionar pelo menos uma assinatura.";
                    } else {
                        $erros = $newsletter->errors();
                        if (count($erros) > 0) {
                            $erro = true;
                            $mensagem = 'Erro ao cadastrar email para newsletter.';
                        } else {
                            // insere um novo usuário de newsletter
                            $token = $this->createDoubleOptinToken($newsletter->Email);
                            $email_encontrado = TableRegistry::get('Newsletters')->inserir($newsletter->Nome, $newsletter->Email,$newsletter->Optin_newsletter,$newsletter->Optin_press,null,null,null,null,null,$token,$newsletter->Origem,$newsletter->optin_radar_tb);
                            if ($email_encontrado) {
                                $mensagem = 'Seu email já está cadastrado na nossa newsletter.';
                            } else {
                                //dispara email
                                UEmailComponent::EmailNewsletterDoubleOptin($newsletter->Nome, $newsletter->Email, $token);
                                $mensagem = 'Enviamos um email para ' .$newsletter->Email . '.<br><br>Acesse sua caixa de entrada ou de spam para finalizar a assinatura da newsletter.';
                                $sucesso = 1;
                            }

                            //evita reenvio de dados
                            $this->request->data = [];
                        }
                    }
                } else {
                    $erro = true;
                    $mensagem = 'Erro ao cadastrar email para newsletter.[2]';
                }
            }
        } else {
            $this->redirect(['action' => 'index']);
            return;
        }


        $resultJ = json_encode(array('resposta' => $mensagem,'sucesso' => $sucesso));
        $this->response->type('json');
        $this->response->body($resultJ);

        return $this->response;
    }

    public function validateDoubleOptinEmail()
    {
        if ($this->request->is(['get'])) {
            $token = $this->request->query['t'];
            $token = $this->UString->AntiXSSComLimite($token, 250);
            $update = TableRegistry::get('Newsletters')->updateDoubleOptin($token);
            $erro = false;
            if (!$update) {
                $erro = true;
                $mensagem = "Erro: A validação do email não foi concluída. O token expirou ou não existe.";
            } else {
                $mensagem = 'Validação do email efetuada com sucesso! Você agora está assinando nossa newsletter.';
            }
        } else {
            $this->redirect(['action' => 'index']);
            return;
        }

        $estados = $this->UString->SelectEstados();
        $this->set('erro', $erro);
        $this->set('mensagem', $mensagem);
        $this->render('index');
    }

    private function createDoubleOptinToken($email)
    {
        //token generator
        $timeStr = str_replace("0.", "", microtime());
        $timeStr = str_replace(" ", "", $timeStr);
        return sha1($email.'_'.$timeStr);
    }
}
