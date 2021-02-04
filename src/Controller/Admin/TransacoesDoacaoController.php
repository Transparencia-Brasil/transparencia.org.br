<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\TransacaoDoacao;

class TransacoesDoacaoController extends AppController
{
	
	public function initialize()
	{
		$this->layout = 'admin';
		$this->loadComponent('Flash');
		$this->loadComponent('UData');
		$this->loadComponent('UNumero');
	}

	public function index($id = null)
	{
		$transacoes = $this->TransacoesDoacao->find('all')
						->order(['TransacoesDoacao.Criacao' => 'DESC'])
						->contain(['TransacoesStatus', 'TransacoesUsuarioDado', 'TransacoesUsuarioDado.Associados']);

		$this->set('transacoes', $transacoes);
	}

	public function edit($id = null)
	{
		$transacao = isset($id) ? $this->TransacoesDoacao
									->find('all')
									->where(['TransacoesDoacao.Codigo' => $id])
									->contain(['TransacoesStatus', 'TransacoesUsuarioDado', 'TransacoesUsuarioDado.Associados', 'TransacoesStatusHistorico'])
									->first() : null;
		$statusTransacao = TableRegistry::get('TransacoesStatus')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

		if ($this->request->is(['post', 'put'])) {

			$erro = "";
            if($transacao == null){
            	$this->Flash->error("Transação não encontrada");
            	$this->redirect(array('action' => 'index'));
            }else{
	            $valorDoadoReal = $this->request->data['TransacoesDoacao']['ValorDoado'];
	            $dataDoacao = $this->request->data['TransacoesDoacao']['DataPagamento'];

	            $transacao->ValorDoado = $this->UNumero->ConverterDoubleMySql($valorDoadoReal);
	            $transacao->DataPagamento = $this->UData->ConverterMySQL($dataDoacao);

	            if($transacao->errors())
		            $this->Flash->success('Erro ao salvar a transação. Verifique os campos obrigatórios.');
		        else{
					if($this->TransacoesDoacao->save($transacao)){
		                $this->Flash->success('Transação salva com sucesso!');
		                $this->redirect(array('action' => 'index'));
		            }else
		            {
		                $this->Flash->error('Erro ao salvar transação!');
		            }
		        }
	    	}
    	}
    	$this->set('statusTransacao', $statusTransacao);
		$this->set('transacao', $transacao);
	}

	public function delete($id)
	{
		$midiaTipo = null;
        if(isset($id)){
            $transacao = $this->TransacoesDoacao->find()->where(['codigo' => $id])->first();
            if($midiaTipo != null){
                $this->TransacoesDoacao->delete($transacao);
                $this->Flash->success('Transação excluída com sucesso.');
            }else{
                $this->Flash->error('Transação não encontrada.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}

}

?>