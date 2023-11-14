<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class ApoieController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->set('slug_pai', "apoie");
    }

    public function index() {
        $this->set('showDonationBox', false);
        $this->set('slug', "apoie");
    }

}
?>