<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Imprensa;
use Cake\I18n\Time;

class ImprensaController extends AppController
{
	
	public function initialize()
    {
        parent::initialize();
        
        $this->set('slug_pai', "imprensa");
        $this->loadComponent['Flash'];
        $this->loadComponent['Auth'];
    }

	public function index()
    {
    	$dadosImprensa = TableRegistry::get('Imprensas');

        $itens = $dadosImprensa->find('all', ['order' => ['Imprensas.DataPublicacao' => 'DESC']])->where(['ativo' => 1])->contain(['ImprensasCategoria']);
        
    	$this->set('itens', $itens);
    } 


}

?>