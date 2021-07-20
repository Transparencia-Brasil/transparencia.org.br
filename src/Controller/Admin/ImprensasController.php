<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Imprensa;
use Cake\ORM\TableRegistry;

class ImprensasController extends AppController
{
    public $PASTA_UPLOAD = WWW_ROOT . 'uploads/imprensa/';

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

        $temErro = false;
        $retMensagem = "";

		if ($this->request->is(['post', 'put'])) {
            
            $this->Imprensas->patchEntity($imprensa, $this->request->data);
  
            $arquivo = $this->request->data['Imprensas']['Imagem'];

            $possuiArquivo = $arquivo == null || strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if($possuiArquivo){
                $nomeArquivo =  $this->UString->ValidarNomeArquivo($arquivo['name']);
                if ($arquivo['size'] >= 2097152) {
                    $retMensagem = 'Erro ao salvar. O Tamanho da Imagem de Destaque é superior há 2MB. (' . $this->UString->BytesParaHumano($arquivo['size'])  . ')';
                    $temErro = true;
                } else {
                    $imprensa->Imagem =  $nomeArquivo;
                    $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD .  $nomeArquivo);
                }
            }else{
                $imprensa->unsetProperty('Imagem');
            }

            if (!$temErro) {
                // se der erro ao mover o arquivo, retornar mensagem de erro
                if (!$boolArquivoOk && $possuiArquivo) {
                    $retMensagem = 'Erro ao salvar imagem!';
                    $temErro = true;
                } else {
                    $imprensa->DataPublicacao = $this->UData->ConverterMySQL($imprensa->DataPublicacao);
                    if ($imprensa->errors()) {
                        $retMensagem = 'Erro ao salvar banner. Verifique os campos obrigatórios.<br/>' . debug($imprensa->errors());
                        $temErro = true;
                    } else {
                        if ($this->Imprensas->save($imprensa)) {
                            $retMensagem = 'Clipping salvo com sucesso!';                            
                            $temErro = false;
                        } else {
                            $retMensagem = 'Erro ao salvar mídia!';
                            $temErro = true;
                        }
                    }
                }
            }

            if ($temErro) {
                $this->Flash->error($retMensagem);
            } else {
                $this->Flash->success($retMensagem);                
                $this->redirect(array('action' => 'index'));
            }
        }
        if($imprensa->DataPublicacao && !$temErro)
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