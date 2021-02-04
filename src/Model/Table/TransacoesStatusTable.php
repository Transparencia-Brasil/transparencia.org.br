<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransacoesStatusTable extends Table
{
	
	public function initialize(array $config)
    {
        $this->table('transacoes_status');
        $this->primaryKey('Codigo');
        $this->entityClass('App\Model\Entity\TransacaoStatus');
    }

	public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Nome');
        return $validator;
    }
}
?>