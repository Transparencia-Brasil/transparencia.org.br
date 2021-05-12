<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class DoacoesController extends AppController
{

    public function initialize(){
        parent::initialize();

        $this->set('showDonationBox', false);
        $exibeDoacao = true;
        $this->set('slug_pai', "apoie");
        
    }

    public function index() {

    }

    public function confirmacao() {

    }

}
?>