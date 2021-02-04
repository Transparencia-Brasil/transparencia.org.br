<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Midia;
use Cake\ORM\TableRegistry;

class MidiasController extends AppController
{
	
	public $PASTA_UPLOAD = WWW_ROOT . 'downloads/midias/';

	public function initialize()
	{
		$this->layout = 'admin';
		$this->loadComponent('Flash');
	}

	public function index($id = null)
	{
		$midias = $this->Midias->find('all')->where(['ativo' => true])->contain('MidiasTipo')->order(['Midias.Criacao' => 'DESC']);

		$this->set('midias', $midias);
	}

	public function edit($id = null)
	{
		$midia = isset($id) ? $this->Midias->find('all')->where(['codigo' => $id, 'ativo' => true])->first() : new Midia();

		if ($this->request->is(['post', 'put'])) {
            
            $this->Midias->patchEntity($midia, $this->request->data);

            $arquivo = $this->request->data['Midias']['Arquivo'];
            $possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if($possuiArquivo){
                $midia->Arquivo = $arquivo['name'];
                $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $arquivo['name']);
            }else{
                $midia->unsetProperty('Arquivo');
            }

            // se der erro ao mover o arquivo, retornar mensagem de erro
            if(!$boolArquivoOk && $possuiArquivo)
            {
                $this->Flash->error('Erro ao salvar mídia!');
            }else{
            	if($midia->errors())
                    $this->Flash->success('Erro ao salvar banner. Verifique os campos obrigatórios.');
                else{
                    if($this->Midias->save($midia)){

                        $this->Flash->success('Mídia salva com sucesso!');
                        $this->redirect(array('action' => 'index'));
                    }else
                    {
                        $this->Flash->error('Erro ao salvar mídia!');
                    }
                }
            }
        }
        $tipos = TableRegistry::get('MidiasTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

		$this->set('midia', $midia);
		$this->set('tipos', $tipos);
	}

	public function delete($id)
	{
		if(isset($id)){
            $midia = $this->Midias->find('all')->where(['codigo' => $id, 'ativo' => true])->first();
            if($midia != null){
                $midia->Ativo = false;
                $this->Midias->save($midia);
                $this->Flash->success('Mídia excluída com sucesso.');
            }else{
                $this->Flash->error('Mídia não encontrada.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}

}

?>