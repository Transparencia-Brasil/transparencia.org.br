<?php 

namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Table;

class LogsErroTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('logs_erro');
        $this->primaryKey('Codigo');
    }

    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Mensagem');
        return $validator;
    }
}
?>