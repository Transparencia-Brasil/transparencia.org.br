<?php
namespace App\Controller;

use Model\Entity\Projeto;
use Cake\ORM\TableRegistry;

class ProjetosController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');        
        $this->set('slug_pai', "projetos");

        $this->loadComponent['Auth'];
    }

	public function index()
    {
    	$tabela = TableRegistry::get('Projetos');
        $projetosAtivos      = $tabela->find()->where(['ativo' => true,'Desativado' => 1])->order(['Ordem' => 'ASC']);
        $projetosDesativados = $tabela->find()->where(['ativo' => true, 'Desativado' => 0])->order(['Ordem' => 'ASC']);

        $this->set('projetosAtivos', $projetosAtivos);
        $this->set('projetosDesativados', $projetosDesativados);


        // $projetos = [];
        // $ano = -1;
        // // separa anos para drop-down
        // $year = $tabela->find()->func()->year(['Data' => 'literal']);
        // $query = $tabela->find()->select(['anoData' => $year])->distinct(['anoData'])->where(['ativo' => true]);
        // $anos = $query->find('list', ['keyField' => 'anoData', 'valueField' => 'anoData'])->order(['Data' => 'Desc']);
        // $ano = !isset($this->request->data['ano']) ? 0 : $this->request->data['ano'];

        // if ($this->request->is(['post']) && $ano > 0) {
        //     // faz filtro por ano
        // 	if($ano != null){
        // 		$projetos = $tabela->find('all')->contain(['ProjetosArquivo'])->where(['ativo' => true, 'year(Data)' => $ano]);
        //         $projetos = $projetos->order(['Data' => 'Desc']);
        // 	}
        // }else{
        //     $projetos = $tabela->find('all')->contain(['ProjetosArquivo'])->where(['ativo' => true]);
        // }
        // $this->set('ano', $ano);
        // $this->set('anos', $anos);
    	
    }


    public function taDePe(){
        ini_set("allow_url_fopen", 1);
        $json = file_get_contents('dados/faq-tadepe.json');
        $obj = json_decode($json);
        $this->set('ta_de_pe', $obj);
        $this->render('projeto_ta_de_pe');
    }

    public function transparenciaAlgoritmica(){
        ini_set("allow_url_fopen", 1);
        $this->render('projeto_transparencia_algoritmica');
    }
    public function tdpPrivacy(){
        ini_set("allow_url_fopen", 1);
        $this->render('politica_de_privacidade');
    }
    public function eduPrivacy(){
        ini_set("allow_url_fopen", 1);
        $this->render('politica_de_privacidade_edu');
    }
    public function obratransparente(){
        ini_set("allow_url_fopen", 1);
        $json = file_get_contents('dados/faq-obra_transparente-projeto.json');
        $obj = json_decode($json);
        $this->set('obra_transparente_projeto', $obj);
        $json = file_get_contents('dados/faq-obra_transparente-parceiros.json');
        $obj = json_decode($json);
        $this->set('obra_transparente_parceiros', $obj);
        $this->render('projeto_obra_transparente');
    }
}

?>
