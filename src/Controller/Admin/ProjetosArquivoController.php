<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Entity\ProjetoArquivo;
use Cake\ORM\TableRegistry;

class ProjetosArquivoController extends AppController {

    public $helpers = ['Ativo'];
    public $PASTA_UPLOAD = WWW_ROOT . 'downloads/projetos/arquivos/';

	public function initialize()
	{
        parent::initialize();
		$this->layout = 'admin';
        $this->loadComponent('Flash');
	}

	public function index($idProjeto = null)
    {
        if($idProjeto == null){
            $this->Flash->success('Código de projeto inválido!');
            $this->redirect(array('controller' => 'Projetos', 'action' => 'index'));
            return;
        }

    	$projetosArquivos = $this->ProjetosArquivo->find('all')->where(['codigoprojeto' => $idProjeto, 'ativo' => true])->order(['Criacao' => 'DESC']);
        $projeto = TableRegistry::get('Projetos')->find('all')->where(['codigo' => $idProjeto])->first();

        $this->set('projetosArquivo', $projetosArquivos);
        $this->set('projeto', $projeto);
    }

    // cria um novo ou edita
    public function edit($idProjeto, $id = null)
    {
        $projetoArquivo = isset($id) ? $this->ProjetosArquivo->find()->where(['codigo' => $id, 'ativo' => true])->first() : new ProjetoArquivo();
        $projeto = TableRegistry::get('Projetos')->find('all')->where(['codigo' => $idProjeto, 'ativo' => true])->first();

        if ($this->request->is(['post', 'put'])) {
            $this->ProjetosArquivo->patchEntity($projetoArquivo, $this->request->data);

            $arquivo = $this->request->data['ProjetosArquivo']['Arquivo'];

            $possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if(isset($arquivo)){
                $projetoArquivo->Arquivo = $arquivo['name'];
                $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $arquivo['name']);
            }else{
                $projetoArquivo->clean('Arquivo');
            }

            // se der erro ao mover o arquivo, retornar mensagem de erro
            if(!$boolArquivoOk && $possuiArquivo)
            {
                $this->Flash->error('Erro ao salvar o arquivo!');

            }else{
                $projetoArquivo->CodigoProjeto = $projeto->Codigo;

                if($this->ProjetosArquivo->save($projetoArquivo)){
                    $this->Flash->success('Arquivo salvo com sucesso!');
                    $this->redirect(array('action' => 'index', $projeto->Codigo));
                }else
                {
                    $this->Flash->error('Erro ao salvar arquivo!');
                }
            }
        }

        $projetoArquivo->CodigoProjeto = $projeto->Codigo;
        $this->set('projetoArquivo', $projetoArquivo);
        $this->set('projeto', $projeto);
    }

    // desabilita um usuário no banco
    public function delete($id = null)
    {
        $publicacaoCategoria = null;
        if(isset($id)){
            $publicacaoCategoria = $this->PublicacoesCategoria->find()->where(['codigo' => $id])->first();
            if($publicacaoCategoria != null){
                $this->PublicacoesCategoria->delete($publicacaoCategoria);
                $this->Flash->success('Categoria excluída com sucesso.');
            }else{
                $this->Flash->error('Categoria não encontrada.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
    }
}
?>
