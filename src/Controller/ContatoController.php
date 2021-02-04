<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Contato;
use App\Model\Entity\Newsletter;

class ContatoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        
        $this->loadModel('Contato');
        $this->loadModel('Newsletter');
        $this->set('slug_pai', "contato");

        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        $this->loadComponent('UString');
        $this->loadComponent('UNumero');
    }

    public $assuntos = [
                        // 1 => "Projeto Excelências / Congresso", 
                        // 2 => "Projeto Às Claras / financiamento eleitoral", 
                        // 3 => "Projeto Meritíssimos / STF", 
                        4 => "Solicitação de entrevista", 
                        // 5 => "Como ajudar a Transparência Brasil", 
                        // 6 => "Outros", 
                        7 => "Informações sobre voluntariado", 
                        8 => "Dúvidas gerais", 
                        9 => "Sugestões",
                    ];

	public function index()
    {
        $contato = new Contato();
        $mensagem = '';
        $guid = $this->UString->guid();

        $this->set('guid', $guid);
        $this->set('contato', $contato);
        $this->set('mensagem', $mensagem);
        $this->set('assuntos', $this->assuntos);

        ini_set("allow_url_fopen", 1);
        $json = file_get_contents('dados/faq-contato.json');
        $obj = json_decode($json);
        
        $this->set('faq_contato', $obj);
    
    }

    public function novoContato(){

        /*$token = $this->request->param('_csrfToken');

        if(!isset($token))
            $this->Security->requireSecure();*/

    	if ($this->request->is(['post', 'put'])) {

            $dados = $this->request->data;
            $contato = new Contato();

            $guid_anterior = $this->request->session()->read('guidContatoEnviado');
            $guid = $this->UString->AntiXSSComLimite($dados["guid"], 100);

            // tentativa de reenvio de formulário
            if($guid == null || ($guid_anterior != null && $guid == $guid_anterior)){
                $erro = true;
                $mensagem = 'Erro ao enviar contato.[3]';
                $this->request->data = [];
            }else{
       		
                $contatos = TableRegistry::get('Contatos');
                $dados = $this->request->data;

                $contato->Nome = $this->UString->AntiXSSComLimite($dados["nome"], 100);
                $contato->Email = $this->UString->AntiXSSComLimite($dados["email"], 100);
                $contato->CodigoAssunto = $this->UNumero->ValidarNumero($dados["codigoassunto"]);
                $contato->Mensagem = $this->UString->AntiXSSComLimite($dados["mensagem"], 800);

                // $novidades = $this->UNumero->ValidarNumero($dados["novidades"]) > 0 ? 1 : 0;

                $mensagem = "";
                $erro = false;
        		if($contato != null)
        		{
        			$erros = $contato->errors();
        			if(count($erros) > 0){
                        $erro = true;
        				$mensagem = 'Erro ao enviar contato.[1]';
        			}else{
        				$contato->Respondido = 0;
        				if($contatos->save($contato))
        				{
                            // insere um novo usuário de newsletter
                            if($novidades)
                                TableRegistry::get('Newsletters')->inserir($contato->Nome, $contato->Email,$novidades,0);

                            // evita reenvio de dados
                            $this->request->session()->write('guidContatoEnviado', $guid);

                            $contato = new Contato();
                            $this->request->data = [];
                            $mensagem = 'Mensagem enviada com sucesso.';
        				}
        			}
        		}else{
                    $erro = true;
                    $mensagem = 'Erro ao enviar contato.[2]';
        		}
            }
    	}else{
            $this->redirect(['action' => 'index']);
            return;
        }
        $this->set('guid', $guid);
        $this->set('erro', $erro);
        $this->set('mensagem', $mensagem);
        $this->set('contato', $contato);
        $this->set('assuntos', $this->assuntos);

        $this->render('index');
    }
}
?>