<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BlogsTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('blogs');
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
                ->notEmpty('Titulo')
                ->notEmpty('Resumo')
                ->notEmpty('Html')
                ->notEmpty('Slug')
                ->notEmpty('Publicacao');

        return $validator;
    }
}
?>