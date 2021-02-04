<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Midia;

class MidiasController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        
        $this->set('slug_pai', "midia");
        $this->loadComponent['Flash'];
        $this->loadComponent['Auth'];
    }

	public function index()
    {
    	$midias_conn = TableRegistry::get("Midias");

    	$midias_videocast = $midias_conn->find('all')->where(["ativo" => true, "CodigoMidiaTipo" => 1]);
    	$midias_podcast = $midias_conn->find('all')->where(["ativo" => true, "CodigoMidiaTipo" => 2]);

    	$this->set('videocast', $midias_videocast);
    	$this->set('podcast', $midias_podcast);
    }
}

?>