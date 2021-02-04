<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class AssociadosComoConheceuTipoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('associados_como_conheceu');
        $this->primaryKey('Codigo');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
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