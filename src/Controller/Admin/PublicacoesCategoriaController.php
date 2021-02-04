<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Entity\PublicacaoCategoria;

class PublicacoesCategoriaController extends AppController {

    public $helpers = ['Ativo'];

	public function initialize()
	{
        parent::initialize();
		$this->layout = 'admin';
        $this->loadComponent('Flash');
	}
	
	public function index()
    {
    	$publicacoes = $this->PublicacoesCategoria->find('all')->order(['Criacao' => 'DESC']);
        $this->set('publicacoes', $publicacoes);
    }

    // cria um novo ou edita 
    public function edit($id = null)
    {
        $publicacaoCategoria = isset($id) ? $this->PublicacoesCategoria->find()->where(['codigo' => $id])->first() : new PublicacaoCategoria();
        
        if ($this->request->is(['post', 'put'])) {
            $this->PublicacoesCategoria->patchEntity($publicacaoCategoria, $this->request->data);

            if($this->PublicacoesCategoria->save($publicacaoCategoria)){
                $this->Flash->success('Categoria salva com sucesso!');
                $this->redirect(array('action' => 'index'));
            }else
            {
                $this->Flash->error('Erro ao salvar usuário!');
            }
        }
        $this->set('publicacao', $publicacaoCategoria);
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