<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class QuemSomosTable extends Table
{
	public function initialize(array $config)
    {

      $this->belongsTo('QuemSomosArea', [
          'foreignKey' => 'CodigoQuemSomosArea',
          'propertyName' => 'QuemSomosArea']);

        $this->table('quem_somos');
        $this->primaryKey('Codigo');

    }

    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('CodigoQuemSomosArea');
				$validator->notEmpty('Nome');
				$validator->notEmpty('Descricao');

        return $validator;
    }
}
?>
