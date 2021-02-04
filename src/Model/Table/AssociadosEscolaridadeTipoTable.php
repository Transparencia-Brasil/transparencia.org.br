<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AssociadosEscolaridadeTipoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('associados_escolaridade_tipo');
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