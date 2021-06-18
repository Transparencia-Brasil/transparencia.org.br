<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\AuditoriaContabilidade;
use App\Model\Entity\AuditoriaContabilidadeArquivo;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Core\App;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

class AuditoriasContabilidadeController extends AppController
{

    public $PASTA_UPLOAD = WWW_ROOT . 'uploads/auditoriascontabilidade/';
    public $PASTA_UPLOAD_RELATIVA = 'uploads/auditoriascontabilidade/';

	public function initialize()
	{
        parent::initialize();
        $this->layout = 'admin';
		$this->loadComponent('Flash');
        $this->loadComponent('UData');
        $this->loadComponent('UString');
	}

	public function index($id = null)
	{

        $financiamentos = $this->AuditoriasContabilidade->find('all', [
            'conditions' => ['AuditoriasContabilidade.ativo' => 1],
            'contain' => ['AuditoriasContabilidadeArquivos'],
            'order' => ['AuditoriasContabilidade.Codigo' => 'DESC']
        ]);
    
		$this->set('financiamentos', $financiamentos);
    }

    public function delete_file() {
        $file = new File($this->PASTA_UPLOAD . DS . $this->request->query['file'], false, 0777);
        $file->delete(); // I am deleting this file
        $file->close(); // Be sure to close the file when you're done
        $path = $this->PASTA_UPLOAD_RELATIVA . $this->request->query['file'];

        if (isset($this->request->query['id']) && !empty($this->request->query['id'])) {
            $financiamentoArquivos = TableRegistry::get('FinanciamentosArquivos');
            $arquivo = $financiamentoArquivos->get($this->request->query['id']);
            $financiamentoArquivos->delete($arquivo);

            return $this->redirect('/admin/AuditoriasContabilidade/edit/'.$arquivo->CodigoAuditoriaContabilidade);
        }
        echo '{"'.$path.'":true}';
        $this->autoRender = false;
    }

    public function upload_file() {
        $arquivos = $this->request->data['files'][0];
        $possuiArquivo = strlen($arquivos['name']) == 0 ? false : true;
        $boolArquivoOk = false;
        $temErro = false;
        $retMensagem = "";
        
        if($possuiArquivo){
            $dir = new Folder($this->PASTA_UPLOAD);
            $file = $dir->find($arquivos['name']);
            if (count($file) <= 0) {
                if ($arquivos['size'] >= 20971520) {
                    $retMensagem = 'Erro ao salvar. O Tamanho do Arquivo é superior há 20MB. (' . 
                        $this->UString->BytesParaHumano($arquivos['size'])  . ')';
                    $temErro = true;
                } 
                else {
                    $boolArquivoOk = move_uploaded_file($arquivos['tmp_name'], $this->PASTA_UPLOAD . $arquivos['name']);
                    $temErro = false;
                }                
            }  else { 
                $temErro = true;
                $retMensagem = "Nome do arquivo repetido.";
            }
        }else{
            $financiamento->unsetProperty('files');
        }
        $url = BASE_URL . $this->PASTA_UPLOAD_RELATIVA . $arquivos['name'];
        $name = $arquivos['name'];
        $type = $arquivos['type'];
        $size = $arquivos['size'];
        $deleteURL = "delete_file";
        
        if (!$temErro)
            echo '{"files":[{"url":"'.$url.'","name":"'.$name.'","type":"'.$type.'","size":'.$size.',"deleteUrl":"'.$deleteURL.'","deleteType":"DELETE"}]}';
         else 
            echo '{"files":[{"url":"","name":"ERRO ' .  $retMensagem . '","type":"ERRO","size":"","deleteUrl":"'.$deleteURL.'","deleteType":"DELETE"}]}';

        $this->autoRender = false;
    }

	public function edit($id = null)
	{
        
        $financiamento = isset($id) ? $this->AuditoriasContabilidade->find('all')->contain(['AuditoriasContabilidadeArquivos'])->where(['codigo' => $id])->first() : new AuditoriaContabilidade();
        $financiamentosArquivos = TableRegistry::get('AuditoriasContabilidadeArquivos')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Arquivo']);

        $file_path = BASE_URL . $this->PASTA_UPLOAD_RELATIVA;

		if ($this->request->is(['post', 'put'])) {
            $this->AuditoriasContabilidade->patchEntity($financiamento, $this->request->data);

            $arquivos = $this->request->data['arquivo_nome'];
            $arquivo_tipos = $this->request->data['arquivo_tipo'];
            $possuiArquivo= count($arquivos) == 0 ? false : true;

            $financiamento->Inicio = $this->UData->ConverterMySQL($financiamento->Inicio);

            if($financiamento->errors()) {
                $this->Flash->success('Erro ao salvar o Auditoria e contabilidade. Verifique os campos obrigatórios.');
            } else {
                if($financiamento_new = $this->AuditoriasContabilidade->save($financiamento)){
                    if ($possuiArquivo) {
                        foreach ($arquivos as $key => $value) {
                            $financiamentoArquivos = TableRegistry::get("AuditoriasContabilidadeArquivos");
                            $financiamentoArquivo = $financiamentoArquivos->newEntity();
                            $financiamentoArquivo->CodigoAuditoriaContabilidade = $financiamento_new->Codigo;
                            $financiamentoArquivo->Arquivo = $value;
                            $financiamentoArquivos->save($financiamentoArquivo);
                        }
                    }
                    $this->Flash->success('Auditoria e contbilidade salvo com sucesso!');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error('Erro ao salvar o Auditoria e contbilidade!');
                }
            }
        }

        // if(isset($id))   
        // {
        //     $banner->Termino = !is_null($banner->Termino) ? $this->UData->ConverterDataBrasil($banner->Termino) : null;
        // }

        $this->set('financiamento', $financiamento);
        $this->set('file_path', $file_path);
        //$this->set('financiamentosArquivos', $financiamentosArquivos);
	}

	public function delete($id)
	{
		$financiamento = null;
        if(isset($id)){
            $financiamento = $this->AuditoriasContabilidade->find()->where(['codigo' => $id, 'ativo' => true])->first();
            if($financiamento != null){
                $financiamento->Ativo = false;
                $this->AuditoriasContabilidade->save($financiamento);
                $this->Flash->success('Auditoria e contbilidade excluído com sucesso.');
            }else{
                $this->Flash->error('Auditoria e contbilidade não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}
}

?>
