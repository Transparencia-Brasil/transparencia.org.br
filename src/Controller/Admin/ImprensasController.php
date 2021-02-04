<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Imprensa;
use Cake\ORM\TableRegistry;

class ImprensasController extends AppController
{
    public $PASTA_UPLOAD = WWW_ROOT . 'img/imprensa/';

	public function initialize()
	{
		$this->layout = 'admin';
		$this->loadComponent('Flash');
        $this->loadComponent('UString');
        $this->loadComponent('UData');
	}

	public function index($id = null)
	{
		$imprensas = $this->Imprensas->find('all')->where(['ativo' => true])->contain('ImprensasCategoria')->order(['Imprensas.Criacao' => 'DESC']);

		$this->set('imprensas', $imprensas);
	}

	public function edit($id = null)
	{
		$imprensa = isset($id) ? $this->Imprensas->find('all')->where(['codigo' => $id, 'ativo' => true])->first() : new Imprensa();

		if ($this->request->is(['post', 'put'])) {
            
            $this->Imprensas->patchEntity($imprensa, $this->request->data);
  
            $arquivo = $this->request->data['Imprensas']['Imagem'];

            $possuiArquivo = $arquivo == null || strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if($possuiArquivo){
                $imprensa->Imagem = $arquivo['name'];
                $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $arquivo['name']);
            }else{
                $imprensa->unsetProperty('Imagem');
            }
            // se der erro ao mover o arquivo, retornar mensagem de erro
            if(!$boolArquivoOk && $possuiArquivo)
            {
                $this->Flash->error('Erro ao salvar imagem!');
            }else{

                $imprensa->DataPublicacao = $this->UData->ConverterMySQL($imprensa->DataPublicacao);
                if($imprensa->errors())
                    $this->Flash->error('Erro ao salvar banner. Verifique os campos obrigatórios.<br/>' . debug($imprensa->errors()));
                else{
                    if($this->Imprensas->save($imprensa)){

                        $this->Flash->success('Clipping salvo com sucesso!');
                        $this->redirect(array('action' => 'index'));
                    }else
                    {
                        $this->Flash->error('Erro ao salvar mídia!');
                    }
                }
            }
        }
        if($imprensa->DataPublicacao)
            $imprensa->DataPublicacao = $this->UData->ConverterDataBrasil($imprensa->DataPublicacao);

        $categorias = TableRegistry::get('ImprensasCategoria')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

		$this->set('imprensa', $imprensa);
		$this->set('categorias', $categorias);
	}

	public function delete($id)
	{
		if(isset($id)){
            $imprensa = $this->Imprensas->find('all')->where(['codigo' => $id, 'ativo' => true])->first();
            if($imprensa != null){
                $imprensa->Ativo = false;
                $this->Imprensas->save($imprensa);
                $this->Flash->success('Clipping excluído com sucesso.');
            }else{
                $this->Flash->error('Clipping não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}

}

?>