<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\QuemSomos;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class QuemSomosController extends AppController
{


	public $PASTA_UPLOAD = WWW_ROOT . 'uploads/quemsomos/';

	public function initialize(){
        parent::initialize();
				$this->layout = 'admin';
				$this->loadComponent('Flash');
		        $this->loadComponent('UData');
    }

	public function index($id = null)
    {
			$quemsomos = $this->QuemSomos->find('all')->where(['QuemSomos.Ativo' => true])->contain(['QuemSomosArea'])->order(['QuemSomos.Ordem' => 'ASC']);
			$this->set('quemsomos', $quemsomos);
    }


  public function order() {
        if ($this->request->is(['post', 'put'])) {
            $ordem = $this->request->data['order'];
            if (!empty($ordem)) {
                $ordem_array = explode(',', $ordem);
                $count_ordem_array = count($ordem_array);
                if ($count_ordem_array > 0) {
                    for($i=0;$count_ordem_array>$i;$i++) {
                        $quemsomostemp = new QuemSomos();
                        $quemsomostemp->Codigo = (int) $ordem_array[$i];
                        $quemsomostemp->Ordem = $i;
                        $this->QuemSomos->save($quemsomostemp);
                        $this->Flash->success('Ordem de Quem somos salva com sucesso!');

                    }
                }
            }
        } else {
            $this->Flash->error('Erro ao ordenar o quem somos!');
        }
        $this->redirect(array('controller' => 'QuemSomos', 'action' => 'index'));
  }

  public function edit($id = null)
	{
    $quemsomos = isset($id) ? $this->QuemSomos->find('all')->where(['codigo' => $id])->first() : new QuemSomos();
		$areas = TableRegistry::get('QuemSomosArea')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

    if ($this->request->is(['post', 'put'])) {
      $this->QuemSomos->patchEntity($quemsomos, $this->request->data);

			$arquivo = $this->request->data['QuemSomos']['Imagem'];
			$possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
			$boolArquivoOk = false;

			if($possuiArquivo){
					$quemsomos->Imagem = $arquivo['name'];
					$boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $arquivo['name']);
			}else{
          $quemsomos->unsetProperty('Imagem');
			}


      if ($quemsomos->errors()) {
        $this->Flash->error('Erro ao salvar. Verifique os campos obrigatórios.');
      } else {

        if ($this->QuemSomos->save($quemsomos)) {
          $this->Flash->success('Registro salvo com sucesso!');
          $this->redirect(array('action' => 'index'));
        } else {
          $this->Flash->error('Erro ao salvar o registro!');
        }
      }
    }
    $this->set('quem_somos', $quemsomos);
		$this->set('areas', $areas);

  }

  public function delete($id) {
    $quemsomos = null;
    if (isset($id)) {
      $quemsomos = $this->QuemSomos->find()->where(['Codigo' => $id, 'Ativo' => true])->first();
      if($quemsomos != null) {
        $quemsomos->Ativo = false;
        if ($this->QuemSomos->save($quemsomos)) {
          $this->Flash->success('Registro excluído com sucesso.');
        } else {
          $this->Flash->error('Erro ao excluir o registro.');
        }
      } else {
        $this->Flash->error('Registro não encontrado.');
      }
    } else {
      $this->Flash->error('Id inválido');
    }

    $this->redirect(array('action' => 'index'));
  }
}

?>
