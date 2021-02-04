<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FinanciamentosTable extends Table
{
	public function initialize(array $config)
    {
        $this->hasMany('FinanciamentosArquivos', [
            'foreignKey' => 'CodigoFinanciamento', 
            'propertyName' => 'FinanciamentosArquivos']);

        $this->table('financiamentos');
        $this->primaryKey('Codigo');
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('FonteDeFinanciamento')
                   ->notEmpty('Valor')
                   ->notEmpty('Periodo')
                   ->notEmpty('Tipo')
                   ->notEmpty('TipoLink');

        return $validator;
    }
}
?>