<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjetosTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('projetos');
        $this->primaryKey('Codigo');

        $this->hasMany('ProjetosArquivo',['foreignKey' => 'CodigoProjeto', 
            'conditions' => ["ProjetosArquivo.Ativo" => true],'propertyName' => 'Arquivos' 
            ]);
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
        $validator->notEmpty('Nome')->notEmpty('Descricao');
        return $validator;
    }
}
?>