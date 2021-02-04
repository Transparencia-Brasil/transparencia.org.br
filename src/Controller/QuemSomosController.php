<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\QuemSomos;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Model\Entity\RelatorioAtividade;
use App\Model\Entity\RelatorioAtividadeArquivo;
use App\Model\Entity\AuditoriaContabilidade;
use App\Model\Entity\AuditoriaContabilidadeArquivo;

class QuemSomosController extends AppController
{

/** CÓDIGO A TESTAR !! */

	public $PASTA_UPLOAD = WWW_ROOT . 'img/quemsomos';

	public function initialize(){
        parent::initialize();

        $this->set('slug_pai', "quem-somos");
        $this->loadComponent('RequestHandler');
    }

	public function index()
    {
            $quemsomos = $this->QuemSomos->find('all')->where(['QuemSomos.Ativo' => true])->contain(['QuemSomosArea'])->order(['QuemSomos.Ordem' => 'ASC']);

            $financiamentos = TableRegistry::get('Financiamentos')->find('all', [
                    'conditions' => ['Financiamentos.ativo' => 1],
                    'contain' => ['FinanciamentosArquivos'],
                    'order' => ['Financiamentos.Codigo' => 'DESC']
                ]);


            $auditorias = TableRegistry::get('AuditoriasContabilidade')->find('all', [
                'conditions' => ['AuditoriasContabilidade.ativo' => 1],
                'contain' => ['AuditoriasContabilidadeArquivos'],
                'order' => ['AuditoriasContabilidade.Codigo' => 'DESC']
            ]);

            $relatorios = TableRegistry::get('RelatoriosAtividades')->find('all', [
                'conditions' => ['RelatoriosAtividades.ativo' => 1],
                'contain' => ['RelatoriosAtividadesArquivos'],
                'order' => ['RelatoriosAtividades.Codigo' => 'DESC']
            ]);
            
            $this->set('relatorios', $relatorios);
            $this->set('auditorias', $auditorias);
            $this->set('financiamentos', $financiamentos);
			$this->set('quem_somos', $quemsomos);
    }

}

?>
