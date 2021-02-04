<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Blog;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class BlogsController extends AppController
{

    public $PASTA_UPLOAD = WWW_ROOT . 'img/blog/';

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
		$posts = $this->Blogs->find('all')->where(['ativo' => true])->order(['Criacao' => 'DESC']);
		$this->set('posts', $posts);
	}

	public function edit($id = null)
	{
		$blog = isset($id) ? $this->Blogs->find('all')->where(['codigo' => $id, 'ativo' => true])->first() : new Blog();

		if ($this->request->is(['post', 'put'])) {
            
            $this->Blogs->patchEntity($blog, $this->request->data);
			
            $blog->Publicacao = $this->UData->ConverterMySQL($blog->Publicacao);
        	$blog->Visivel = $this->request->data["Blogs"]["Visivel"] == 1;
            $blog->Slug = $this->UString->GerarSlug($blog->Slug);

            $arquivo = $this->request->data['Blogs']['ImagemResumo'];
            
            $possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if($possuiArquivo){
                $blog->ImagemResumo = $arquivo['name'];
                $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD . $arquivo['name']);
            }else{
                $blog->unsetProperty('ImagemResumo');
            }

            // se der erro ao mover o arquivo, retornar mensagem de erro
            if(!$boolArquivoOk && $possuiArquivo)
            {
                $this->Flash->error('Erro ao salvar imagem de resumo!');
            }else{
                if($blog->errors())
                    $this->Flash->success('Erro ao salvar post. Verifique os campos obrigatórios.');
                else{
                    if($this->Blogs->save($blog)){

                        $this->Flash->success('Post salvo com sucesso!');
                        $this->redirect(array('action' => 'index'));
                    }else
                    {
                        $this->Flash->error('Erro ao salvar post!');
                    }
                }
            }
        }

        if(isset($id))
            $blog->Publicacao = $this->UData->ConverterDataBrasil($blog->Publicacao);

        $categorias = TableRegistry::get('BlogsCategoria')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);
		$this->set('post', $blog);
        $this->set('categorias', $categorias);
	}

	public function delete($id)
	{
		$blog = null;
        if(isset($id)){
            $blog = $this->Blogs->find()->where(['codigo' => $id, 'ativo' => true])->first();
            if($blog != null){
                $blog->Ativo = false;
                $this->Blogs->save($blog);
                $this->Flash->success('Post excluído com sucesso.');
            }else{
                $this->Flash->error('Post não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
	}
}

?>