<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Newsletter;

class NewsletterController extends AppController
{
	
	public function initialize()
	{
		$this->layout = 'admin';
	}

	public function index($id = null)
	{
		$newsletters = $this->Newsletter->find('all');

		$this->set('newsletters', $newsletters);
	}

	public function edit($id = null)
	{
		$newsletter = isset($id) ? $this->Newsletter->find('all')->where(['codigo' => $id])->first() : new Newsletter();

		$this->set('newsletter', $newsletter);
	}

	public function delete($id)
	{

	}

}
?>