<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class QuemSomosAreaTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('quem_somos_area');
        $this->primaryKey('Codigo');
    }

    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Nome');
        return $validator;
    }
}
?>
