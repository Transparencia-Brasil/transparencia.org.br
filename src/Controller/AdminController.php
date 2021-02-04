<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class AdminController extends AppController {
	
    public function index()
    {
    	$this->layout = 'admin_login';
    }
   
}
?>