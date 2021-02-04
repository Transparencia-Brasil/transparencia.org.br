<?php 

namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Table;

class ContatosTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('contatos');
        $this->primaryKey('Codigo');
    }

    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Nome')->notEmpty('CodigoAssunto')->notEmpty('Mensagem');
        return $validator;
    }
}
?>