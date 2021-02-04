<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

class HomeController extends AppController
{
	public function initialize(){
        parent::initialize();
        $this->set('slug_pai', "home");

        $this->loadComponent("UString");
        $this->loadComponent("UData");
    }

	public function index()
    {
        $dataAtual = Time::now();
        $dataAtual->timezone = 'America/Sao_Paulo';
        $dataAtual = $dataAtual->i18nFormat('YYYY-MM-dd HH:mm:ss');
    	// carregar banners e projetos
    	$connection = ConnectionManager::get('default');
        $banners = $connection
            ->execute('SELECT * FROM banners where Ativo = 1 and ((Inicio <= current_timestamp OR Inicio = null) OR (Termino >= current_timestamp OR Termino = null)) ORDER BY ordem ASC, criacao DESC')
            ->fetchAll('assoc');

        //die(debug($banners));
    	$projetos = TableRegistry::get('Projetos')->find('all')->where(['ativo' => true]);

    	$this->set('banners', $banners);
    	$this->set('projetos', $projetos);
    }
}

?>
