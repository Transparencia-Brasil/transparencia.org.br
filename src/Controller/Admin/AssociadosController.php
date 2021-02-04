<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Associado;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class AssociadosController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->layout = 'admin';
		$this->loadComponent('Flash');
		$this->loadComponent('UNumero');
		$this->loadComponent('UData');
		$this->loadComponent('UString');
	}

	public function index()
	{
		$associados = $this->Associados->find('all')->where(['ativo' => true])->order(['Criacao' => 'DESC']);
		
		$this->set('associados', $associados);
	}

	public function edit($id = null)
	{
		$associado = isset($id) ? $this->Associados->find('all')->where(['ativo' => true, 'codigo' => $id])->first() : new Associado();

		if($associado == null && $id != null)
		{
			$this->Flash->error('Associado não encontrado');
			$this->redirect(array('action' => 'index'));
			return;
		}

		if ($this->request->is(['post', 'put'])) {

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

			$associado->AceiteNovidades = $this->request->data["Associados"]["AceiteNovidades"] == 1 ? 1 : 0;
			$associado->AceiteLembreteDoacao = $this->request->data["Associados"]["AceiteLembreteDoacao"] == 1 ? 1 : 0;
			$associado->ExibeLista = $this->request->data["Associados"]["ExibeLista"] == 1 ? 1 : 0;

			//die(debug($associado));
			// não salvar a data de cadastro
			$associado->unsetProperty('DataCadastro');
			
			if($associado->errors())
				$this->Flash->success('Erro ao salvar associado. Verifique os campos obrigatórios.');
			else{
	            if($this->Associados->save($associado)){
	                $this->Flash->success('Associado salvo com sucesso!');
	                $this->redirect(array('action' => 'index'));
	            }else
	            {
	                $this->Flash->error('Erro ao salvar associado!');
	            }
        	}
        }

        $associado->DataCadastro = $this->UData->ConverterDataBrasil($associado->DataCadastro, true);

        $estados = $this->UString->SelectEstados();
        $tipoDoacao = TableRegistry::get('AssociadosDoacaoTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);
				$comoConheceu = TableRegistry::get('AssociadosComoConheceuTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

		$this->set('estados', $estados);
		$this->set('comoConheceu', $comoConheceu);
		$this->set('tipoDoacao', $tipoDoacao);
		$this->set('associado', $associado);
	}

	public function delete($id)
	{
		$associado = isset($id) ? $this->Associados->find('all')->where(['ativo' => true, 'codigo' => $id])->first() : null;

		if($associado != null)
		{
			$associado->Ativo = 0;
			if($this->Associados->save($associado))
				$this->Flash->sucess('Associado excluído com sucesso');
			else
				$this->Flash->error('Erro ao excluir associado');
		}
		else{
			$this->Flash->error('Associado não encontrado');	
		}

		$this->redirect(array('action' => 'index'));
	}
}

?>