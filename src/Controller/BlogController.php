<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Blog;

class BlogController extends AppController
{

    public $helpers = ['BlogBusca'];

	public function initialize(){
        parent::initialize();

        $this->loadComponent("UString");
        $this->loadComponent("UNumero");
        $this->loadComponent('Flash');
        $this->set('slug_pai', "blog");
        $this->set('anos', BlogController::filtrarAnos());
    }

	public function index()
    {
    	$posts = TableRegistry::get('Blogs')->find('all')->where(['ativo' =>true, 'visivel' => true])->order(['Publicacao' => "DESC"]);
    	$this->set('posts', $posts);
    }

    public function post($slug){
        $slug = $this->UString->AntiXSS($slug);

    	$post = TableRegistry::get('Blogs')->find('all')->where(['ativo' => true, "slug" => $slug, 'visivel' => true])->first();

        if($post != null)
            $this->set('slug', $post->Slug);
        
    	$this->set('post', $post);
    }

    public function busca(){
        
        $posts = null;
        // buscando variáveis
        $termo = $this->request->data["busca"];
        $ano = $this->request->data["ano"];
        // validando termos
        $termo = $this->UString->AntiXSS($termo);
        $ano = $this->UNumero->ValidarNumero($ano);
        $ano = $ano == 0 ? -1 : $ano;

        // verifica se algo foi postado
        if($this->request->is(['post', 'put'])){
            if(strlen($termo) > 0){
                $posts = TableRegistry::get('Blogs')
                                ->find('all')
                                ->where(['titulo like' => '%' . $termo . '%'])
                                ->orWhere(['resumo like' => '%' . $termo . '%'])
                                ->orWhere(['html like' => '%' . $termo . '%'])
                                ->orWhere(['PalavrasChave like' => '%' . $termo . '%'])
                                ->andWhere(['ativo' => true, 'visivel' => true]);
            }else if($ano >= 0){
                $posts = TableRegistry::get('Blogs')
                                ->find('all')
                                ->where(['ativo' => true, 'visivel' => true, 'Year(Publicacao)' => $ano]);
            }
        }

        $posts = $posts->order(['Publicacao' => "DESC"]);
        // retorno dos valores
        $this->set('buscaVazia', (strlen($termo) == 0 && $ano < 0) ? true : false);
        $this->set('termo', $termo);
        $this->set('ano', $ano);
        $this->set('posts', $posts);  
    }

    public static function filtrarAnos()
    {
        $blog = TableRegistry::get('Blogs');

        $year = $blog->find()->func()->year(['Publicacao' => 'literal']);
        $anos = $blog->find()
                ->where(['ativo' => true, 'visivel' => true])
                ->select(['ano' => $year])
                ->distinct(['ano'])
                ->order(['ano' => 'DESC']);

        return $anos;
    }
}

?>