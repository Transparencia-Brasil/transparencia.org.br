<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class Associado extends Entity{

	protected function _setCPF($cpf)
	{
		return preg_replace('/[^\d]+/', '', $cpf);
	}

	protected function _setTelefoneDDD($telefone)
	{
		return preg_replace('/[^\d]+/', '', $telefone);
	}

	protected function _setTelefone($telefone)
	{
		return preg_replace('/[^\d]+/', '', $telefone);
	}

	protected function _setCelularDDD($celular)
	{
		return preg_replace('/[^\d]+/', '', $celular);
	}

	protected function _setCelular($celular)
	{
		return preg_replace('/[^\d]+/', '', $celular);
	}
}

?>