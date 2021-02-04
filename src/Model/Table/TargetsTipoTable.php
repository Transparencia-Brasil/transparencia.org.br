<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TargetsTipoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('targets_tipo');
        $this->primaryKey('codigo');
        $this->addBehavior('Timestamp', [
            'events' => [
                'TargetsTipo.beforeSave' => [
                    'Criacao' => 'new',
                    'Alteracao' => 'always'
                ]
            ]
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Nome');
        return $validator;
    }
}
?>