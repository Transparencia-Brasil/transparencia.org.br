<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use App\Model\Entity;
use App\Model\Entity\Publicacao;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class PublicacoesController extends AppController {

    public $helpers = ['Ativo'];
    public $PASTA_UPLOAD = WWW_ROOT . 'uploads/publicacoes/';

	public function initialize()
	{
        parent::initialize();
		$this->layout = 'admin';
        $this->loadComponent('Flash');
        $this->loadComponent('UData');
        $this->loadComponent('UString');
	}
	
	public function index($id = null)
    {
        if($id == null){
            $this->Flash->success('Categoria de publicação inválida!');
            $this->redirect(array('controller' => 'PublicacoesCategoria', 'action' => 'index'));
            return;
        }else{
            $publicacoes = $this->Publicacoes->find('all')->where(['CodigoCategoria' => $id, 'ativo' => true])->order(['Criacao' => 'DESC']);
            $categoria = TableRegistry::get('PublicacoesCategoria')->find()->where(["Codigo" => $id])->first();
            $idCategoria = $id;
        }
        $this->set('publicacoes', $publicacoes);
        $this->set('categoria', $categoria);
    }

    // cria um novo ou edita 
    public function edit($idCategoria, $id = null)
    {
        $publicacao = isset($id) ? $this->Publicacoes->find()->where(['codigo' => $id, 'ativo' => true])->first() : new Publicacao();
        $categorias = TableRegistry::get('PublicacoesCategoria')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

        $temErro = false;
        $retMensagem = "";

        if ($this->request->is(['post', 'put'])) {
            
            $this->Publicacoes->patchEntity($publicacao, $this->request->data);
   
            $arquivo = $this->request->data['Publicacoes']['Arquivo'];
            $possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if(isset($arquivo) && !empty($arquivo['name']) ){
                $nomeArquivo =  $this->UString->ValidarNomeArquivo($arquivo['name']);
                if ($arquivo['size'] >= 20971520  || $arquivo['error'] == 1) {
                    $retMensagem = 'Erro ao salvar. O Tamanho do Logo é superior há 20MB. (' . $this->UString->BytesParaHumano($arquivoLogo['size'])  . ')';
                    $temErro = true;
                } else {
                    $publicacao->Arquivo = $nomeArquivo;
                    $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $nomeArquivo);
                    $temErro = false;
                }
                // var_dump($boolArquivoOk);
                // echo $this->PASTA_UPLOAD . $arquivo['name'];
                // print_r ($boolArquivoOk);
                // die();
            }else{
                $publicacao->unsetProperty('Arquivo');
            }

            if (!$temErro) {
                // se der erro ao mover o arquivo, retornar mensagem de erro
                if (!$boolArquivoOk && $possuiArquivo) {
                    $retMensagem = 'Erro ao salvar a publicação.';
                    $temErro = true;
                } else {
                    $publicacao->DataPublicacao = $this->UData->ConverterMySQL($publicacao->DataPublicacao);

                    if ($this->Publicacoes->save($publicacao)) {
                        $retMensagem = 'Publicação salva com sucesso!';
                        $temErro = false;
                    } else {
                        $retMensagem = 'Erro ao salvar a publicação.';
                        $temErro = true;
                    }
                }
            }

            if ($temErro) {
                $this->Flash->error($retMensagem);
            } else {
                $this->Flash->success($retMensagem);                
                $this->redirect(array('action' => 'index', $idCategoria));
            }
        }

        if($publicacao->DataPublicacao)
            $publicacao->DataPublicacao = $this->UData->ConverterDataBrasil($publicacao->DataPublicacao);

        $publicacao->CodigoCategoria = $idCategoria;
        $this->set('publicacao', $publicacao);
        $this->set('categorias', $categorias);
    }

    // desabilita um usuário no banco
    public function delete($id = null)
    {
        $publicacao = null;
        if(isset($id)){
            $publicacao = $this->Publicacoes->find()->where(['codigo' => $id, 'ativo' => true])->first();
            if($publicacao != null){
                $publicacao->Ativo = false;
                $this->Publicacoes->save($publicacao);
                $this->Flash->success('Publicação excluída com sucesso.');
            }else{
                $this->Flash->error('Publicação não encontrada.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
    }
}
?>