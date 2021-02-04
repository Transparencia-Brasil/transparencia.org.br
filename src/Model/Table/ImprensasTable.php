<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ImprensasTable extends Table
{

    public function initialize(array $config)
    {

        $this->belongsTo('ImprensasCategoria', [
            'foreignKey' => 'CodigoImprensaCategoria', 
            'propertyName' => 'ImprensasCategoria']);

        $this->table('imprensas');
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
        $validator->notEmpty('CodigoImprensaCategoria')->notEmpty('Nome')
            ->notEmpty('Link')
            ->add('Titulo', 
                ['length' => ['rule' => ['maxLength', 100]]])
            ->add('Resumo', 
                ['length' => ['rule' => ['maxLength', 220]]]);
        return $validator;
    }
}
?>