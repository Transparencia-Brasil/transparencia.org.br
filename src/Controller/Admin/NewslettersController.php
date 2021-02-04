<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Newsletter;
use Cake\I18n\Time;

class NewslettersController extends AppController
{
	
	public function initialize()
	{
		$this->layout = 'admin';
		$this->loadComponent('Flash');
	}

	public function index($id = null)
	{
		$newsletters = $this->Newsletters->find('all')->order(['Criacao' => 'DESC']);

		$this->set('newsletters', $newsletters);
	}

	public function edit($id = null)
	{
		$newsletter = isset($id) ? $this->Newsletters->find('all')->where(['codigo' => $id])->first() : new Newsletter();
		if ($this->request->is(['post', 'put'])) {
            $this->Newsletters->patchEntity($newsletter, $this->request->data);

			if($newsletter->errors())
	            $this->Flash->error('Erro ao salvar usuário de newsletter. Verifique os campos obrigatórios.');
	        else{
	        	//die(debug($newsletter));
				if($this->Newsletters->save($newsletter)){
	                $this->Flash->success('Usuário salvo com sucesso!');
	                $this->redirect(array('action' => 'index'));
	            }else
	            {
	                $this->Flash->error('Erro ao salvar usuário!');
	            }
	        }
    	}
		$this->set('newsletter', $newsletter);
	}

	public function delete($id)
	{
		$usuario_newsletter = null;
        if(isset($id)){
			$usuario_newsletter = $this->Newsletters->find('all')->where(['codigo' => $id])->first();
            if($usuario_newsletter != null){
                $this->Newsletters->delete($usuario_newsletter);
                $this->Flash->success('Usuário de newsletter excluído com sucesso.');
            }else{
                $this->Flash->error('Usuário não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}

}
?>