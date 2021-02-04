<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjetosArquivoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('projetos_arquivo');
        $this->primaryKey('Codigo');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'CodigoProjeto', 
            'propertyName' => 'Projetos']);
        
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
        $validator->notEmpty('Nome')->notEmpty('CodigoProjeto');
        return $validator;
    }
}
?>