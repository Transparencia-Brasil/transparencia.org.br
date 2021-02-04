<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class AssociadoDoacaoTipo extends Entity{

	public static function RetornaValorDoacao($codigoValorDoacao){
		
		if($codigoValorDoacao > 6 || $codigoValorDoacao < 1)
			return -1;

		$dados = [1 => "30", 2 => "50", 3 => "100", 4 => "324", 5 => "500"];

		return $dados[$codigoValorDoacao];
	}

	// verifica se o código do valor da transação é válido
	public static function ValorDoacaoValido($codigoDoacao){
		if($codigoDoacao > 0 && $codigoDoacao < 7)
			return true;

		return false;
	}
}

?>