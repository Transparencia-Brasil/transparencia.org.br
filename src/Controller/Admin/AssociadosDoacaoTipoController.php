<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\AssociadoDoacaoTipo;

class AssociadosDoacaoTipoController extends AppController
{
	
	public function initialize()
	{
		parent::initialize();
		$this->layout = 'admin';
		$this->loadComponent('Flash');
	}

	public function index()
	{
		$associadosDoacaoTipo = $this->AssociadosDoacaoTipo->find('all');
		$this->set('associadosDoacaoTipo', $associadosDoacaoTipo);
	}

	public function edit($id = null)
	{
		$associadoDoacaoTipo = isset($id) ? $this->AssociadosDoacaoTipo->find('all')->where(['codigo' => $id])->first() : new AssociadoDoacaoTipo();

		if ($this->request->is(['post', 'put'])) {
            $this->AssociadosDoacaoTipo->patchEntity($associadoDoacaoTipo, $this->request->data);
			
			if($associadoDoacaoTipo->errors())
				$this->Flash->error('Erro ao salvar associado. Verifique os campos obrigatórios.');	
			else{
	            if($this->AssociadosDoacaoTipo->save($associadoDoacaoTipo)){

	                $this->Flash->success('Tipo salvo com sucesso!');
	                $this->redirect(array('action' => 'index'));
	            }else
	            {
	                $this->Flash->error('Erro ao salvar tipo de doação!');
	            }
        	}
        }

		$this->set('associadoDoacaoTipo', $associadoDoacaoTipo);
	}

	public function delete($id)
	{
		$associadoDoacaoTipo = null;
        if(isset($id)){
            $associadoDoacaoTipo = $this->AssociadosDoacaoTipo->find()->where(['codigo' => $id])->first();
            if($associadoDoacaoTipo != null){
                $this->AssociadosDoacaoTipo->delete($associadoDoacaoTipo);
                $this->Flash->success('Tipo excluído com sucesso.');
            }else{
                $this->Flash->error('Tipo não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}

}

?>