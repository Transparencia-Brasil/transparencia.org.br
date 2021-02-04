<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FinanciamentosArquivosTable extends Table
{
	public function initialize(array $config)
    {
        $this->belongsTo('Financiamentos', [
            'foreignKey' => 'CodigoFinanciamento', 
            'propertyName' => 'Financiamentos']);
            
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Arquivo')
                   ->notEmpty('CodigoFinanciamento')
                   ->notEmpty('Tipo');

        return $validator;
    }
}
?>