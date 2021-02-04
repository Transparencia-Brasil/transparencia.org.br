<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\MidiaTipo;

class MidiasTipoController extends AppController
{
	
	public function initialize()
	{
		$this->layout = 'admin';
		$this->loadComponent('Flash');
	}

	public function index($id = null)
	{
		$midiastipo = $this->MidiasTipo->find('all')->where(['ativo' => true])->order(['Criacao' => 'DESC']);

		$this->set('midiastipo', $midiastipo);
	}

	public function edit($id = null)
	{
		$midiatipo = isset($id) ? $this->MidiasTipo->find('all')->where(['codigo' => $id])->first() : new MidiaTipo();

		if ($this->request->is(['post', 'put'])) {

            $this->Midias->patchEntity($midiaTipo, $this->request->data);
			if($midiaTipo->errors())
	            $this->Flash->success('Erro ao salvar tipo de mídia. Verifique os campos obrigatórios.');
	        else{
				if($this->Midias->save($midiaTipo)){
	                $this->Flash->success('Tipo salvo com sucesso!');
	                $this->redirect(array('action' => 'index'));
	            }else
	            {
	                $this->Flash->error('Erro ao salvar tipo de mídia!');
	            }
	        }
    	}
		$this->set('midiatipo', $midiatipo);
	}

	public function delete($id)
	{
		$midiaTipo = null;
        if(isset($id)){
            $midiaTipo = $this->MidiasTipo->find()->where(['codigo' => $id])->first();
            if($midiaTipo != null){
                $this->MidiasTipo->delete($midiaTipo);
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