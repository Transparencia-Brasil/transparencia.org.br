<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MidiasTable extends Table
{

	public function initialize(array $config)
    {
        $this->belongsTo('MidiasTipo', [
            'foreignKey' => 'CodigoMidiaTipo', 
            'propertyName' => 'MidiasTipo']);

        $this->table('midias');
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
        $validator->notEmpty('Nome')->notEmpty('CodigoMidiaTipo');
        return $validator;
    }
}
?>