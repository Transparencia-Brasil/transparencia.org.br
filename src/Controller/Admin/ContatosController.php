<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Contato;

class ContatosController extends AppController
{
	
	public function initialize()
	{
		parent::initialize();
		$this->layout = 'admin';
		$this->loadComponent('Flash');
	}

	public function index($id = null)
	{
		$contatos = $this->Contatos->find('all')->order(['Criacao' => 'DESC']);
		$this->set('contatos', $contatos);
	}

	public function answered($id = null)
	{
		if(isset($id)){
			$contato = isset($id) ? $this->Contatos->find('all')->where(['codigo' => $id])->first() : null;

			if($contato == null){
				$this->Flash->error('Mensagem não encontrada.');
			}else{
				$contato->Respondido = 1;
				if($this->Contatos->save($contato))
					$this->Flash->success('Mensagem alterada com sucesso');
				else
					$this->Flash->success('Erro ao atualizar mensagem.');
			}
		}
		$this->redirect(array('action' => 'index'));
	}

	public function delete($id)
	{
		$contato = isset($id) ? $this->Contatos->find('all')->where(['codigo' => $id])->first() : null;

		$resultado = $this->Contatos->delete($contato);

		if($resultado)
			$this->Flash->success('Mensagem excluída com sucesso');
		else
			$this->Flash->success('Não foi possível excluir a mensagem. Entre em contato com o adminstrador.');

		$this->redirect(array('action' => 'index'));
	}

	public function edit($id){

		$contato = isset($id) ? $this->Contatos->find('all')->where(['codigo' => $id])->first() : null;

		$this->set('contato', $contato);
	}

}

?>