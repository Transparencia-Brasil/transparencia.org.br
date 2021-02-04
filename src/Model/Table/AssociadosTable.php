<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AssociadoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('associados');
        $this->primaryKey('Codigo');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'Alteracao' => 'always'
                ]
            ]
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Nome')
                  ->notEmpty('CPF')
                  ->notEmpty('Celular')
                  ->notEmpty('CelularDDD')
                  ->notEmpty('Cidade')
                  ->notEmpty('UF');
        return $validator;
    }
}
?>