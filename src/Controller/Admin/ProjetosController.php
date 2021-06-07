<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use App\Model\Entity;
use App\Model\Entity\Projeto;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class ProjetosController extends AppController {

    public $helpers = ['Ativo'];
    public $PASTA_UPLOAD = WWW_ROOT . 'uploads/projetos/';

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
        $projetos = $this->Projetos->find('all')->where(['Desativado' => 1,'ativo' => true])->order(['Ordem' => 'ASC']);
        $this->set('projetos', $projetos);

        $projetosDesativados = $this->Projetos->find('all')->where(['Desativado' => 0,'ativo' => true])->order(['Ordem' => 'ASC']);
        $this->set('projetosDesativados', $projetosDesativados);
    }

    public function order() {
        if ($this->request->is(['post', 'put'])) {
                $ordem = $this->request->data['order'];
                if (!empty($ordem)) {
                        $ordem_array = explode(',', $ordem);
                        $count_ordem_array = count($ordem_array);
                        if ($count_ordem_array > 0) {
                                for($i=0;$count_ordem_array>$i;$i++) {
                                        $projetostemp = new Projeto();
                                        $projetostemp->Codigo = (int) $ordem_array[$i];
                                        $projetostemp->Ordem = $i;
                                        $this->Projetos->save($projetostemp);
                                        $this->Flash->success('Ordem salva com sucesso!');

                                }
                        }
                }
        } else {
                $this->Flash->error('Erro ao ordenar o quem somos!');
        }
        $this->redirect(array('controller' => 'Projetos', 'action' => 'index'));
}

    // cria um novo ou edita
    public function edit($id = null)
    {
        $projeto = isset($id) ? $this->Projetos->find()->where(['codigo' => $id, 'ativo' => true])->first() : new Projeto();
        
        $temErro = false;
        $retMensagem = "";

        if ($this->request->is(['post', 'put'])) {

            $this->Projetos->patchEntity($projeto, $this->request->data);

            $arquivoLogo = $this->request->data['Projetos']['Imagem_logo'];
            $possuiArquivoLogo = strlen($arquivoLogo['name']) == 0 ? false : true;
            $boolArquivoLogoOk = false;

            if($possuiArquivoLogo){
                if ($arquivoLogo['size'] >= 2097152) {
                    $retMensagem = 'Erro ao salvar. O Tamanho do Logo é superior há 2MB. (' . $this->UString->BytesParaHumano($arquivoLogo['size'])  . ')';
                    $temErro = true;
                } else {
                    $projeto->Imagem_logo = "logo_".$arquivoLogo['name'];
                    $boolArquivoLogoOk = move_uploaded_file($arquivoLogo['tmp_name'], $this->PASTA_UPLOAD . "logo_".$arquivoLogo['name']);
                }
            }else{
                $projeto->unsetProperty('Imagem_logo');
            }

            $arquivo = $this->request->data['Projetos']['Imagem'];
            $possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if($possuiArquivo){
                if ($arquivo['size'] >= 2097152) {
                    $retMensagem = 'Erro ao salvar. O Tamanho da Imagem de Fundo é superior há 2MB. (' . $this->UString->BytesParaHumano($arquivo['size'])  . ')';
                    $temErro = true;
                } else {
                    $projeto->Imagem = $arquivo['name'];
                    $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $arquivo['name']);
                }
            }else{
                $projeto->unsetProperty('Imagem');
            }

            if (!$temErro) {
                $projeto->Data = $this->UData->ConverterMySQL($projeto->Data);
                // se der erro ao mover o arquivo, retornar mensagem de erro
                if ($projeto->errors()) {
                    $retMensagem = 'Erro ao salvar. Verifique os campos obrigatórios.';
                    $temErro = true;
                } else {
                    if ($this->Projetos->save($projeto)) {
                        $retMensagem = 'Projeto salvo com sucesso!';
                        $temErro = false;
                    } else {
                        $retMensagem = 'Erro ao salvar o projeto!';
                        $temErro = true;
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

        if(isset($id) && $projeto != null)
        {
            $projeto->Data = $this->UData->ConverterDataBrasil($projeto->Data);
        }

        $this->set('projeto', $projeto);
    }

    // desabilita um usuário no banco
    public function delete($id = null)
    {
        $projeto = null;
        if(isset($id)){
            $projeto = $this->Projetos->find()->where(['codigo' => $id, 'ativo' => true])->first();
            if($projeto != null){
                $projeto->Ativo = false;
                $this->Projetos->save($projeto);
                $this->Flash->success('Projeto excluído com sucesso.');
            }else{
                $this->Flash->error('Projeto não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
    }
}
?>
