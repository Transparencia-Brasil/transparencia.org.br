<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class HomeController extends AppController{
	
	public function index()
	{
		$this->layout = 'admin';

		$ultimos_usuarios = TableRegistry::get('Associados')->find('all')->where(['ativo' => true])->order(['Criacao' => 'DESC'])->limit(10);
		$ultimos_contatos = TableRegistry::get('Contatos')->find('all')->where(['respondido' => false])->order(['Criacao' => 'DESC'])->limit(10);

		$this->set('ultimos_usuarios', $ultimos_usuarios);
		$this->set('ultimos_contatos', $ultimos_contatos);
	}
}
?>